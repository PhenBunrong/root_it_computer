<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;
use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Address;
use App\Models\Coupons;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Product;
use App\Mail\PlaceorderMaillabel;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\ExpressCheckout;

class CheckController extends Controller
{
    public function index()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        return view('frontEnd.checkout.check')->with('cart_data',$cart_data);
    }

/* ----------------------update_user----------------------- */

    private function update_user($user_id, $request)
    {
        $user = User::find($user_id);

        $user->name = $request->input('first_name');
        $user->lname = $request->input('last_name');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');

        $user->pincode = $request->input('pincode');
        /* $user->payment_type = $request->input('payment_type'); */
        return $user->save();
    }

/* ----------------------insert_orderitem----------------------- */

    private function insert_orderitem($last_order_id)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $item_in_cart = $cart_data;

        $total="0";

        foreach($item_in_cart as $itemdata)
        {
            $products = Product::find($itemdata['item_id']);
            $price_value = $products->spl_price;
            /* $total = $total + ($itemdata["item_quantity"] * $price_value); */
            $tax_amt = $products->tax_amt;
           /*  $generator = Helper::IDGenerator(new Order_Item,'rec_id',5,'KHS'); */
            
            Order_Item::create([
                /* 'rec_id' =>$generator, */
                'order_id'=>$last_order_id,
                'product_id'=>$itemdata['item_id'],
                'price'=> $price_value,
                'tax_amt'=> $tax_amt,
                'qty'=>$itemdata['item_quantity'],
            ]);
        }
    }

/* ---------------------- Send Mail ----------------------- */

    private function placeorderMaillabel($request , $trackingno)
    {
        $order_data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'pincode'=> $request->input('pincode'),
            'email'=> $request->input('email'),
            'trackingno' => $trackingno,
        ];

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $items_in_cart = json_decode($cookie_data, true);

        $to_customer_email = [
            $request->input('email'),'phearong666@gmail.com' /* Auth::user()->email; */
        ];
        Mail::to($to_customer_email)->send(new PlaceorderMaillabel($order_data, $items_in_cart));
    }

    
 /* ---------------------- storeOrder1 ----------------------- */ 
 
    // public function storeOrder(Request $request)
    // {
    //     /*
    //         Payment status = 
    //         0 = Nothing Paid
    //         1 = Cash Paid
    //         2 = Razorpay payment succussfull
    //         3 = Razorpay payment failed
    //         4 = pay, stripe.
    //     */
        
    //     if(isset($_POST['place_order_btn']))
    //     {
    //         // User Data Update
    //         $user_id = Auth::id();
    //         /* $user = User::find($user_id); */
    //         $this->update_user($user_id, $request);

    //         //Placing Order
    //         $trackno = rand(1111,9999);
    //         $order = new Order;
    //         $order->user_id = $user_id;
    //         $order->tracking_no = 'rootcart'.$trackno;
    //         $order->payment_mode = "Cash on Delivery";
    //         $order->payment_status = "0";
    //         $order->order_status = "0";
    //         $order->notity = "0";
    //         $order->save();
    //         $trackingno = $order->tracking_no;

    //         $last_order_id = $order->id;

    //         //Ordered  - Cart Items
    //         $this->insert_orderitem($last_order_id);

    //         // Send Mail
    //         $this->placeorderMaillabel($request, $trackingno);

    //         Cookie::queue(Cookie::forget('shopping_cart'));
    //         return redirect('/thank-you')->with('status','Order has been placed Successfully');
   
    //     }

    //     if(isset($_POST['place_order_razorpay']))
    //     {
    //         // User Data Update
    //         $user_id = Auth::id();
    //         /* $user = User::find($user_id); */
    //         $this->update_user($user_id, $request);


    //         //Placing Order
    //         $trackno = rand(1111,9999);
    //         $order = new Order;
    //         $order->user_id = $user_id;
    //         $order->tracking_no = 'rootcart'.$trackno;
    //         $order->payment_mode = "Payment by Razorpay";
    //         $order->payment_id = $request->input('razorpay_payment_id');
    //         $order->payment_status = "2";
    //         $order->order_status = "0";
    //         $order->notity = "0";
    //         /* $order->status = "pending"; */
    //         $order->save();
    //         $trackingno = $order->tracking_no;

    //         $last_order_id = $order->id;

    //         //Ordered  - Cart Items
    //         $this->insert_orderitem($last_order_id);

    //         // Send Mail
    //         $this->placeorderMaillabel($request, $trackingno);

    //         Cookie::queue(Cookie::forget('shopping_cart'));
    //         return redirect('/thank-you')->with('status','Order has been placed Successfully');
    //     }

    //     if(isset($_POST['stipe_payment_btn']))
    //     {
    //         // User Data Update
    //         $user_id = Auth::id();
    //         /* $user = User::find($user_id); */
    //         $this->update_user($user_id, $request);

    //         $cookie_data = stripslashes(Cookie::get('shopping_cart'));
    //         $cart_data = json_decode($cookie_data, true);
    //         $item_in_cart = $cart_data;

    //         $total="0";
    //         foreach($item_in_cart as $itemdata)
    //         {
    //             $products = Product::find($itemdata['item_id']);
    //             $price_value = $products->spl_price;
    //             $total = $total + ($itemdata["item_quantity"] * $price_value);
    //         }

    //         $stripetoken = $request->input('stripeToken');
    //         $STRIPE_SECRET = "sk_test_51IcCfaG9uEnhLHqd4Mvl9AVJOg6ptVa81RBOUMvWhcBgRkZSH255dS7iVcoiJ5bPHrA44rj4D3oeZkrBt5IvaiBd00LDBGBXjD";
    //         Stripe::setApiKey($STRIPE_SECRET);
    //         \Stripe\Charge::create([
    //             'amount' => 1 * 100,
    //             'currency' => 'usd',
    //             'description' => "Thank you for purchasing with Root IT Support",
    //             'source' => $stripetoken,
    //             'shipping' => [
    //                 'name' => Auth::user()->getUserName(),
    //                 'phone' => Auth::user()->phone,
    //                 'address' => [
    //                     'line1' => Auth::user()->address1,
    //                     'line2' => Auth::user()->address2,
    //                     'postal_code' => Auth::user()->pincode,
    //                     'city' => Auth::user()->city,
    //                     'state' => Auth::user()->state,
    //                     'country' => Auth::user()->country,
    //                 ],
    //             ],
    //         ]);

    //         //Placing Order
    //         $trackno = rand(1111,9999);
    //         $order = new Order;
    //         $order->user_id = $user_id;
    //         $order->tracking_no = 'rootcart'.$trackno;
    //         $order->payment_mode = "Payment by Stripe";
    //         $order->payment_id = $stripetoken;
    //         $order->payment_status = "2";
    //         $order->order_status = "0";
    //         $order->notity = "0";
    //         /* $order->status = "pending"; */
    //         $order->save();
    //         $trackingno = $order->tracking_no;

    //         $last_order_id = $order->id;

    //         //Ordered  - Cart Items
    //         $this->insert_orderitem($last_order_id);

    //         // Send Mail
    //         $this->placeorderMaillabel($request, $trackingno);

    //         Cookie::queue(Cookie::forget('shopping_cart'));
    //         return redirect('/thank-you')->with('status','Order has been placed Successfully');
    //     }
    // }


 /* ---------------------- checkcoupon ----------------------- */ 

    public function checkcoupon(Request $request)
    {
        $couponcode = $request->input('coupon_code');
        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data = $request->all();


        if(Coupons::where('coupon_code',$couponcode)->exists())
        {
            $coupon = Coupons::where('coupon_code', $couponcode)->first();
            if($coupon->start_datetime <= Carbon::today()->format('Y-m-d') && Carbon::today()->format('Y-m-d') <= $coupon->end_datetime)
            {
                $totalprice = "0";
                $cookie_data = stripslashes(Cookie::get('shopping_cart'));
                $cart_data = json_decode($cookie_data, true);
                foreach($cart_data as $itemdata)
                {
                    $products = Product::find($itemdata['item_id']);
                    $prod_price = $products->spl_price;

                    //$prod_price_with_tax = ($prod_price * $products->tax_amt)/100; //Tax, Vat, GST

                    $totalprice = $totalprice + ($itemdata["item_quantity"] * $prod_price);
                }

                // Coupon Type (Checking Percentage Or Amount)
                if($coupon->coupon_type == "1") //1=Percentage
                {
                    $discount_price = ($totalprice / 100) * $coupon->coupon_price;
                }
                elseif($coupon->coupon_type == "2") //2=Amount
                {
                    $discount_price = $coupon->coupon_price;
                }

                $grand_total = $totalprice - $discount_price;
                
                return response()->json(['discount_price' => $discount_price,'grand_total_price' => $grand_total ]);
                
                Session::put('CouponDiscount',$discount_price);
                Session::put('CouponAmount',$grand_total);
                Session::put('CouponCode',$couponcode['coupon_code']);
                
            }
            else
            {
                return response()->json([
                    'status' => 'Coupon Code has been Expired.',
                    'error_status'=>'error',
                ]);
            }
        }
        else
        {
            return response()->json([
                'status' => 'Coupon Code dose not exists',
                'error_status'=>'error',
            ]);
        }

    }

 /* ---------------------- checkcoupon ----------------------- */ 

    /* ---------------------- storeOrder2 ----------------------- */ 

    public function placeOrders(Request $request)
    {
        Session::forget('CouponDiscount');
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data = $request->all();
        
        if($request->isMethod('post')){
            // User Data Update
            $user_id = Auth::id();
            /* $user = User::find($user_id); */
            $this->update_user($user_id, $request);


            if(empty(Session::get('CouponCode'))){
                $coupon_code = 'Not Used';
            }else{
                $counpon_code = Session::get('CouponCode');
            }
            if(empty(Session::get('CouponAmount'))){
                $coupon_amount = '0';
            }else{
                $coupon_amount = Session::get('CouponAmount');
            }
            //Placing Order
            $trackno = rand(1111,9999);
            $order = new Order;
            $order->user_id = $user_id;
            $order->tracking_no = 'rootcart'.$trackno;
            $order->payment_mode = $data['payment_mode'];
            $order->payment_status = "0";
            $order->counpon_code = $coupon_code;
            $order->counpon_amount =  $coupon_amount;
            $order->order_status = "0";
            $order->grand_total = $data['grand_total'];
            $order->notity = "0";
            $order->save();
            $trackingno = $order->tracking_no;

            $last_order_id = $order->id;

            //Ordered  - Cart Items
            $this->insert_orderitem($last_order_id);

            // Send Mail
            $this->placeorderMaillabel($request, $trackingno);

            Cookie::queue(Cookie::forget('shopping_cart'));

        }

        Session::put('order_id',$last_order_id);
        Session::put('grand_total',$data['grand_total']);
        
       // echo "<pre>";print_r($data);die;

        if($data['payment_mode']=="Cash On Delivery")
        {
            return redirect('/thank-you')->with('status','Order has been placed Successfully');
        }
        else if($data['payment_mode']=="Stripe")
        {
            return redirect('/stripe');
        }
        else{
            
            $invoiceId = uniqid();
            
            $data = $this->checkoutData($invoiceId);

            $provider = new ExpressCheckout;   
            $response = $provider->setExpressCheckout($data);

            // This will redirect user to PayPal
            return redirect($response['paypal_link']);
            
            //echo "<pre>";print_r($data);die;
            }
    }

    protected function checkoutData($invoiceId){

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        //echo "<pre>";print_r($cart_data);die;

        //$Order_Item = $request->all();

        $data = [];
        $data['items'] = [];
        
        // foreach($cart_data as $cart){
        //     $itemDetail = [
        //         'name' =>  $cart['item_name'],
        //         'price' =>  $cart['item_price'],
        //         'desc'  => 'Thank you for purchasing with Root IT Support',
        //         'qty' =>  $cart['item_quantity'],
        //     ];
        //     $data['items'][]=$itemDetail;
        // }
        

        $data['invoice_id'] = $invoiceId;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('paypal.success');
        $data['cancel_url'] = route('paypal.cancel');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;

        return $data;
    }

    public function stripe(Request $request)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $item_in_cart = $cart_data;
        
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            // Set your secret key. Remember to switch to your live secret key in production!
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey('sk_test_51KKm4JFZMrlwEAmOFuCrXNKF4bwb94W7LwkomLugxSpFoVzIgtUt8MSKxJ5h17n6AWRPidt1q4oiJDDoSf6imUMU00UjcKlJXy');

            $token = $_POST['stripeToken'];
            $charge = \Stripe\charge::Create([
                
              'amount' => $request->input('total_amount')*100,
              'currency' => 'usd',
              'description' => $request->input('name'), 
              'source' => $token,
            ]);
        //dd($charge);
            return redirect()->back()->with('status','Your Payment Successfully Done!');
        }
        return view('frontEnd.checkout.stripe');
    }

    public function checkoutSuccess(Request $request)
    {
        $provider = new ExpressCheckout;

        $token = $request->get('token');
        $prayerId = $request->get('prayerID');
        
        $invoiceId = $response['INVNUM']??uniqid();
            
        $data = $this->checkoutData($invoiceId);

        $response = $provider->getExpressCheckoutDetails($token);

        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){
            
            //Perform transaction on Paypal
            $response = $provider->doExpressCheckoutPayment($data, $token, $prayerId);
            // $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
        }
        return "Payment successfull";
    }
    
    public function checkoutCancel(){
        return "payment failed";
    }


    

    public function paypals(Request $request)
    {

        $Order_Item = Order_Item::find('order_id');
        $data = $Order_Item;

        $cartItems = array_map( function($item){
            return [
                'name' => $item['product_id'],
                'price' => $item['price'],
                'qty' => $item['qty'],
            ];
        }, $data->getContent()->toarray());

        $checkoutData =[
            'items' => $cartItems,
            'return_url' => route('paypal.success'),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => "Order description",
            'total' => $Order_Item->getTotal(),
        ];
        
        echo "<pre>";print_r($data);die;
        $provider = new ExpressCheckout;   

        $response = $provider->setExpressCheckout($checkoutData);

        // This will redirect user to PayPal
        return redirect($response['paypal_link']);
     

    }

    public function paypalsw(Request $request)
    {
        $Order_Item = $request->all();

        $data = [];
        $data['items'] = [];
        
        foreach($Order_Item as $key->$cart){
            $itemDetail = [
                'name' => $cart->product_id,
                'price' =>  $cart->price,
                'desc'  => 'Thank you for purchasing with Root IT Support',
                'qty' =>  $cart->qty,
            ];
            $data['items'][]=$itemDetail;
        }
        

        $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/cart');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;
        
        echo "<pre>";print_r($data);die;

        $provider = new ExpressCheckout;   
        $response = $provider->setExpressCheckout($data);

        // This will redirect user to PayPal
        return redirect($response['paypal_link']);
    

    }
/* ------------------------------checkamount------------------------------------- */

    public function checkamount(Request $request){
        if(Cookie::get('shopping_cart')){
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $item_in_cart = $cart_data;

            $total="0";
            foreach($item_in_cart as $itemdata)
            {
                $products = Product::find($itemdata['item_id']);
                $price_value = $products->spl_price;
                $total = $total + ($itemdata["item_quantity"] * $price_value);
            }

            return response()->json([
                'first_name'  => $request->first_name,
                'last_name'  => $request->last_name,
                'phone' => $request->phone,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'pincode' => $request->pincode,
                'email' => Auth::user()->email,
                'total_price' =>$total
            ]);
        }
        else
        {
            return response()->json([
                'status_code' => 'no_data_in_cart',
                'status' => 'Your Cart is empty',
            ]);

        }
    }

/*     --------------------------thankyou--------------------------------- */

    public function thankyou() 
    {
        return view('frontend.thank-you');
    }









  /*   public function addressOrder(Request $request) 
    {
        if(isset($_POST['place_order_btn']))
        {
            
            $this->validate($request, [
                'first_name'=>'required',
                'last_name'=>'required',
                'phone_no'=>'required|min:5|max:35',
                'pincode'=>'required|numeric',
                'city'=>'required|min:5|max:25',
                'state'=>'required|min:5|max:35',
                'country'=>'required'
            ]);

            $request['user_id']=Auth::user()->id;
            Address::create($request->all());

        $trackno = rand(1111,9999);
            $order = new Order;
            $order->user_id = $request;
            $order->status = "pending";
            $order->save();
   
            $order = new Order;
            $last_order_id = $order->id;

            //Ordered - Cart Items
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $item_in_cart = $cart_data;

            foreach($item_in_cart as $itemdata)
            {
                $products = Product::find($itemdata['item_id']);
                $price_value = $products->spl_price;
                Order_Item::create([
                    'order_id' => $last_order_id,
                    'product_id' => $itemdata['item_id'],
                    'price' => $price_value,
                    'tax_amt' => '',
                    'qty' => $itemdata['item_quantity'],
                ]);
            }
            return ('yes');
        }
    } */
}
