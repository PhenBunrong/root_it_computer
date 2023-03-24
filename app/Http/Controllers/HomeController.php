<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Item;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Webpage;
use App\Models\Promotion;
use App\Models\ImagePromotion;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Models\ProductAttribute;
use App\Models\ImageAttribute;
use App\Models\AttEventImage;
use App\Models\Events;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax() && isset($request->start)){

           $start = $request->start; // min price value
           $end = $request->end; //max price value

           $products = DB::table('products')
                        ->where('price', '>=', $start)
                        ->where('price' ,'<=', $end)
                        ->orderby('price','ASC')
                        ->paginate(40);

            response()->json($products);
            return view('frontEnd.product.shop', compact('products'));
        }
        else {

            $products = Webpage::with('product')->where('status','1')->paginate(5);
            return view('frontEnd.index', compact('products'));
        }
    }
    public function dashboad()
    {
        $current_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->month)->count();
        $last_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
        $last_to_last_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(2))->count();
        $last_to_3_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(3))->count();
        $last_to_4_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(4))->count();
        $last_to_5_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(5))->count();
        $last_to_6_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(6))->count();
        $last_to_7_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(7))->count();
        $last_to_8_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(8))->count();
        $last_to_9_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(9))->count();
        $last_to_10_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(10))->count();
        $last_to_11_month_orders = Order_Item::whereYear('created_at', Carbon::now()->year)
                                ->whereMonth('created_at', Carbon::now()->subMonth(11))->count();
       
        return view('backEnd.dashboard.index')->with(compact('current_month_orders',
        'last_month_orders','last_to_last_month_orders',
        'last_to_3_month_orders','last_to_4_month_orders','last_to_5_month_orders',
        'last_to_6_month_orders','last_to_7_month_orders','last_to_8_month_orders',
        'last_to_9_month_orders','last_to_10_month_orders','last_to_11_month_orders'));
    }
    
}
