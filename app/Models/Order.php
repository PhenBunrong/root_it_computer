<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'tracking_no',
        'tracking_msg',
        'payment_mode',
        'payment_id',
        'payment_status',
        'order_status',
        'cancel_reason',
        'notify',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orderitems()
    {
        return $this->hasMany(Order_Item::class, 'order_id', 'id');
    }













 /*    public function orderFields() {
        // order can order many product from product table
        return $this->belongsToMany(Products::class)->withPivot('qty','total');
    }

    public static function createOrder() {
        $user=Auth::user();
        $order=$user->orders()->create(['total'=>Cookie::total(),'status'=>'pending']);
        $cartItems=Cookie::content();

        foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, [
                'qty'=>$cartItem->qty,
                'tax'=>Cookie::tax(),
                'total'=>$cartItem->qty*$cartItem->price
            ]);
        }
    } */
}
