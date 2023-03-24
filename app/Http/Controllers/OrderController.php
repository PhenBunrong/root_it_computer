<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Item;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = new Order();

        $orders = $orders->latest()->get();
        
        return view('backEnd.order.index', compact('orders'));
    }

    public function vieworder($order_id)
    {
        if(Order::where('id',$order_id)->exists())
        {
            $orders = Order::find($order_id);
            return view('backEnd.order.view', compact('orders'));
        }
        else
        {
            return redirect()->back()->with('success','No Order Found');
        }
    }

    public function invoice($order_id)
    {
        if(Order::where('id',$order_id)->exists())
        {
            $orders = Order::find($order_id);
            /* return view('backEnd.order.invoice', compact('orders')); */

            $data = [
                'orders' =>  $orders,
            ];
            $pdf = PDF::loadView('backEnd.order.invoice', $data);
    
            return $pdf->download('root_it_support.pdf');
        }
        else
        {
            return redirect()->back()->with('success','No Order Found');
        }
    }

    public function proceedOrder($order_id)
    {
        if(Order::where('id',$order_id)->exists())
        {
            $orders = Order::find($order_id);
            return view('backEnd.order.proceed', compact('orders'));

        }
        else
        {
            return redirect()->back()->with('success','No Order Found');
        }
    }

    public function trackingStatus(Request $request, $order_id){
        $orders = Order::find($order_id);
        if($orders->order_status != "2")
        {
            $orders->tracking_msg =$request->input('tracking_msg');
            $orders->update();
            return redirect()->back()->with('success','Tracking Status Update');
        }
        else
        {
            return redirect()->back()->with('success','Order is Cancelled');
        }
    }

    public function cancelOrder(Request $request, $order_id){
        $orders = Order::find($order_id);
        if($orders->tracking_msg != NULL)
        {
            $orders->cancel_reason =$request->input('cancel_reason');
            $orders->tracking_msg = "Cancelled when ".$orders->tracking_msg;
            $orders->order_status = "2"; //2 = Cancelled
            $orders->update();
            return redirect()->back()->with('success','Order Cancelled');
        }
        else
        {
            return redirect()->back()->with('success','update your Tracking Status');
        }
    }

    public function completeOrder(Request $request, $order_id){
        $orders = Order::find($order_id);
        if($orders->tracking_msg != NULL)
        {
           
            if($orders->order_status != "2")  //2 = Cancelled
            {
               
                $orders->tracking_msg = "Cancelled when ".$orders->tracking_msg;
                if($orders->payment_status == "0"){
                    $orders->payment_status = $request->input('cash_received') == TRUE ? '1':'0';
                }
                $orders->order_status = "1"; //1 = Cancelled
                $orders->update();
                return redirect()->back()->with('success','Order Completed!');
            }
            else
            {
                return redirect()->back()->with('success','your Order is Cancelled!');
            }
        }
        else
        {
            return redirect()->back()->with('success','Update your Tracking Status');
        }
    }


/* =====================  Report  ======================== */

    public function report(){

        $orders = Order_Item::orderBy('id','asc')->latest()->get();
        return view('backEnd.report.index', compact('orders'));
    }

    /* public function report()
    {
        $orders = Order::with('users')->orderBy('id','asc')->get();
        return view('backEnd.report.index', compact('orders'));
    } */

    public function viewReport($order_id)
    {
        if(Order::where('id',$order_id)->exists())
        {
            $orders = Order::find($order_id);
            return view('backEnd.report.invoice', compact('orders'));
        }
        else
        {
            return redirect()->back()->with('success','No Order Found');
        }
    }

    


    public function printReport($order_id)
    {
        if(Order::where('id',$order_id)->exists())
        {
            $orders = Order::find($order_id);
            return view('backEnd.report.printorder', compact('orders'));
        }
        else
        {
            return redirect()->back()->with('success','No Order Found');
        }
    }

    public function searchReport(Request $request){
        
        $orders = Order_Item::where('created_at','>=',$request->from)->where('created_at','<=',$request->to)->get();
        
        return view('backEnd.report.index', compact('orders'));
    }

/*     public function searchFilter(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $data = DB::table('order__items')
                            ->whereBetween('created_at', array($request->form_date, $request->to_date))
                            ->latest()->get();
            }
            else{
                $data = DB::table('order__items')->latest()->get();
            }
            return datatables()->of($data)->make(true);
        }
        $orders = Order_Item::orderBy('id','asc')->latest()->get();
        return view('backEnd.report.index', compact('orders'));
    } */

/*     public function reportSearch(Request $request)
    {
        if(isset($request['from_date']) && isset($request['to_date']))
        {
            $from_date = $request['from_date'];
            $to_date = $request['to_date'];

            $orders = DB::table('order__items')
                            ->whereBetween('created_at', array($request->form_date, $request->to_date))
                            ->latest()->get();

            return view('backEnd.report.indextest', compact('orders'));
        }
        else {
            $orders = Order_Item::orderBy('id','asc')->latest()->get();
            return view('backEnd.report.indextest', compact('orders'));
        }
    } */
}