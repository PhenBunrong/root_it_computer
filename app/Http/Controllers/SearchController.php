<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\SubCategory;

class SearchController extends Controller
{
    public function index(){
        return view('backEnd.report.searchReport');
    }
    public function reportSearch(Request $request){

        if($request->date)
        {
            $date = date('d-m-Y',strtotime($request->date));
            $orders = DB::table('order__items')->where('created_at',$date)->get();
            $sum = DB::table('order__items')->where('created_at',$date)->sum('price');

            return view('backEnd.report.checkReportSale', compact('orders','sum','date'));
        }
        else if($request->month && $request->year)
        {
            $month = $request->month;
            $year = $request->year;
            $orders = DB::table('order__items')->where('created_at',$month)->where('year',$year)->get();
            $sum = DB::table('order__items')->where('created_at',$month)->where('year',$year)->sum('price');

            return view('backEnd.report.checkReportSale', compact('orders','sum','month','year'));
        }
        else
        {

        }
        
    }

    public function getCategory($id){
        $product = SubCategory::where('status','1')->where('category_id', $id)->pluck("name","id");
        return json_encode($product);
    }

 /*    public function getCategory($id){
        $getCategory = SubCategory::where('cetegory_id',$id)->pluck('name','id');
        return json_encode($getCategory);
    } */


    public function getProduct(Request $request){
        $search = $request->input('e_product');

        $data = Product::query()
            ->where('status','1')
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('category_id', 'LIKE', "%{$search}%")
            ->orWhere('brand_id', 'LIKE', "%{$search}%")
            ->latest()->paginate(40);

        return view('frontEnd.productCategory', compact('data'));
    }

    // public function index(Request $request){
    //     if($request()->ajax())
    //     {
    //         if($request->category)
    //         {
    //             $data = DB::table('products')
    //                     ->join('category_id', 'product.id', '=', 'category_id.product_id')
	// 			->select('products.id', 'products.name', 'products.price')
    //             ->where('category_id.product_id', $request->category);
    //         }
    //         else
    //         {
    //             $data = DB::table('products')
    //                     ->join('category_id', 'product.id', '=', 'category_id.product_id')
    //             ->select('products.id', 'products.name', 'products.price')
    //         }

    //         return datatable()->of($data)->make(true);
    //     }
    //     $category = DB::table('categories')
    //                 ->select("*");
    //                 ->get();
    //     return view('frontEnd.productCategory', compact('category'));
    // }
}
