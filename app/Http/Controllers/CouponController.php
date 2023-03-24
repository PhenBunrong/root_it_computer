<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupons;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function index(){
        $product = Product::where('status','1')->get();
        $coupon = Coupons::all();
        return view('backEnd.coupon.index', compact('product','coupon'));
    }

    public function store(Request $request){
        $coupon = new Coupons();
        $coupon->offer_name = $request->input('offer_name');
        $coupon->product_id = $request->input('product_id');
        $coupon->coupon_code = '';
        $coupon->coupon_limit = $request->input('coupon_limit');
        $coupon->coupon_type = $request->input('coupon_type');
        $coupon->coupon_price = $request->input('coupon_price');
        $coupon->start_datetime = $request->input('start_datetime');
        $coupon->end_datetime = $request->input('end_datetime');

        $coupon->status = $request->input('status') == true ? '1':'0';
        $coupon->visibility_status = $request->input('visibility_status')== true ? '1':'0';
        $coupon->save();

        $coupon->coupon_code = 'ECO-' . Carbon::now()->year . Carbon::now()->month . $coupon->id . Carbon::now()->day;

        $coupon->save();

        return redirect()->back()->with('success', 'Coupon Code Added Successfully');
        
    }


    public function edit($id){
        $coupon = Coupons::find($id);
        $product = Product::where('status','1')->get();
        return view('backEnd.coupon.edit', compact('product','coupon'));
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupons::find($id);
        $coupon->offer_name = $request->input('offer_name');
        $coupon->product_id = $request->input('product_id');
        $coupon->coupon_limit = $request->input('coupon_limit');
        $coupon->coupon_type = $request->input('coupon_type');
        $coupon->coupon_price = $request->input('coupon_price');
        $coupon->start_datetime = $request->input('start_datetime');
        $coupon->end_datetime = $request->input('end_datetime');

        $coupon->status = $request->input('status') == true ? '1':'0';
        $coupon->visibility_status = $request->input('visibility_status')== true ? '1':'0';

        $coupon->update();

        return redirect()->route('coupon.index')->with('success', 'Coupon Code Updated Successfully');
    }

    public function destroy(Coupons $coupon)
    {
        $coupon->delete();
        
        return redirect()->back()->with('error', 'Coupon Code Deleted Successfully');
    }
}
