<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class FrontEndController extends Controller
{
    
    // public $search;
    // public $product_cat;
    // public $product_cat_id;

    // public function mount(){
    //     $this->product_cat = 'All Category';
    //     $this->fill(request()->only('search','product_cat', 'product_cat_id'));
    // }

    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    public function shop(Request $request){

        if(isset($request->brand)){
            
            $brand = $request->brand; //brand
            
            $products = DB::table('products')
                ->where('status','1')
                ->whereIN('brand_id', explode( ',', $brand ))
                ->paginate(40);
            
            /* dd($products); */
            response()->json($products);
            return view('frontEnd.product.shop', compact('products'));
        }
        else {

            $products = Webpage::with('product')->where('status','1')->paginate(5);

            return view('frontEnd.product.selectProduct', compact('products'));
        }
        
    }


    public function index(Request $request)
    {
        if ($request->ajax() && isset($request->start)){

           $start = $request->start; // min price value
           $end = $request->end; //max price value

           $products = DB::table('products')
                        ->where('status','1')
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

   /*  public function showCat($id=null){
        $cat = $request->cat_id;

        $proCateogry = DB::table('products')
        ->join('categories','categories.id','products.category_id')
        ->where('products.category_id', $id)
        ->get();

        return view('front.category_pro', compact(['proCateogry']));
    } */

    public function showBrand($id) {
        $brand_product = Product::where('status','1')->where('brand_id',$id)->orderBy('id','desc')->latest()->paginate(40);
        $id_= $id;

        /* return $brand_product; */
        return view('frontEnd.productBrand', compact('brand_product','id_'));
    }

    public function showCategory($id) {
        $categoy_product = Product::with('Brand')->where('status','1')->where('category_id',$id)->orderBy('id','desc')->latest()->paginate(40);
        $id_= $id;

        /* return $brand_product; */
        return view('frontEnd.list_Category', compact('categoy_product','id_'));
    }

    public function showbyBrand($id) {
        $showbyBrand = Product::where('brand_id',$id)->where('status','1')->get();
        $id_= $id;

        /* return $brand_product; */
        return view('frontEnd.BrandbyCate', compact('showbyBrand','id_'));
    }

    public function showAllCategory(){

        $category_list = Category::all();

        return view('frontEnd.list_all_category', compact('category_list'));
    }

    public function showAllbrands(){

        $brands_list = Brand::all();

        return view('frontEnd.list_all_product', compact('brands_list'));
    }

    public function showPromotion(){

        $promotion_list = Promotion::all();

        return view('frontEnd.promotion.index', compact('promotion_list'));
        
    }

    public function showCareers(){
        return view('frontEnd.careers.index');
    }


/*     public function brandCheck(Request $request, $id){
        $product_check = Brand::where('id', $id)->get();
        $brand_id = $product_check->id;

        if(Request::get('filterbrand')){
            $checked = $_GET['filterbrand'];

            $brand_filter = Brand::whereIn('name',$checked)->get();
            $brandId = [];

            foreach($brand_filter as $brands_id_list){
                array_push($brandId, $brands_id_list->id);
            }

            $products = Product::whereIn('brand_id', $checked)->where('status','0')->get();
        }else{
            $products = Product::whereIn('brand_id', $brand_id)->where('status','0')->get();
        }
        
        return view('frontEnd.product.collection_product', compact('products'));
    } */

    
/* ===============================
    Details Prodcuts
 ==========================    */


    public function detailPro($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Product::with('attributes')->where('id', $id)->first();
        
        $dataImage = ImageAttribute::where('product_id', $id)->get();

        $dataProduct = Product::where('id', $id)->get();


        $relatedProducts = Product::where('id','!=',$id)->where(['category_id'=>$data->category_id])->take(9)->get();

        $id_= $id;

        return view('frontEnd.productDetail', compact(['data', 'dataImage', 'relatedProducts', 'id_', 'dataProduct']));
    }

    public function viewDetailProd(Request $request){
        
        $id = $request->product_id;

        $data = Product::with('attributes')->where('id', $id)->first();
        
        $dataImage = ImageAttribute::where('product_id', $id)->get();

        $dataProduct = Product::where('id', $id)->get();


        return view('frontEnd.product.viewDetail', compact(['data', 'dataImage', 'dataProduct']));
    }
/* ============== showPromotion ==================== */

    public function detailPromotion($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Promotion::with('attributes')->where('id', $id)->first();
        
        $dataImage = ImagePromotion::where('product_id', $id)->get();

        $dataProduct = Promotion::where('id', $id)->get();


        $relatedProducts = Promotion::where('id','!=',$id)->where(['category_id'=>$data->category_id])->take(9)->get();

        $id_= $id;

        return view('frontEnd.promotion.productPromotionDetail', compact(['data', 'dataImage', 'relatedProducts', 'id_', 'dataProduct']));
    }
    


/* ===============================
     Popup Details Prodcuts
 ==========================    */

    public function popUpDetailPro($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Product::with('attributes')->where('id', $id)->first();
        
        $dataImage = ImageAttribute::where('product_id', $id)->get();

        $dataProduct = Product::where('id', $id)->get();

        $id_= $id;

        return view('frontEnd.popupdetails', compact(['data', 'dataImage', 'id_', 'dataProduct']));
    }


    public function addtocartIndex(Request $request) {

        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart']);
                }
            }
        }
        else
        {
            $products = Product::find($prod_id);
            $prod_name = $products->name;
            $prod_image = $products->image;
            $priceval = $products->spl_price;
            $pro_brand = $products->getBrandName();
            $pro_category = $products->getCategoryName();

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image,
                    'item_brand' => $pro_brand,
                    'item_category' => $pro_category
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }
    }

}
