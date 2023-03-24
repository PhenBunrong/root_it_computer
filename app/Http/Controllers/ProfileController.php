<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $user_id = Auth::user()->id;
        $profile = DB::table('users')->limit(1)->get();

        return view('frontEnd.profile.index', compact('profile'));
    }

    public function updateAccount(Request $request) {
        $this -> validate($request, [
            'name' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $user_id = Auth::user()->id;
        DB::table('users')->where('id',$user_id)->update($request->except('_token'));
        return back()->with('msg', 'Your address has been update');
    }

    public function orders(){
        $user_id = Auth::user()->id;
        $orders = DB::table('order__items')
            ->leftJoin('products', 'products.id', '=' , 'order__items.product_id')
            ->leftJoin('orders', 'orders.id', '=', 'order__items.order_id')
            ->where('orders.user_id', '=', $user_id)->paginate(20);

        return view('frontEnd.profile.orders', compact('orders'));
    }

    public function address() {
         $user_id = Auth::user()->id;
         $address = DB::table('users')->limit(1)->get();

         return view('frontEnd.profile.address', compact('address'));   
    }


    public function updateAddress(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);
        $user_id = Auth::user()->id;
        DB::table('users')->where('id',$user_id)->update($request->except('_token'));
        return back()->with('msg', 'Your address has been update');
    }

    public function password() {
        return view('frontEnd.profile.updatePassword');
    }

    public function updatePassword(Request $request) {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;

        if(!Hash::check($oldPassword, Auth::user()->password)) {
            return back()->with('msg', 'The specified password does not match to database password');
        }else{
            $request->user()->fill(['password'=>Hash::make($newPassword)])->save(); //update password to user table
            return back()->with('msg', 'Password has been updated');
        }
    }
}
