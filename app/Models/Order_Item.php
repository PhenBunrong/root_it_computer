<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Order;

class Order_Item extends Model
{
    protected $fillable = [   
        'order_id',
        'product_id',
        'price',
        'tax_amt',
        'qty', 
    ];

    public function users()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function getUserName(){
        if ($this->users){
            return $this->users->name;
        }
    }


    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function getProductName(){
        if ($this->products){
            return $this->products->name;
        }
    }

}
