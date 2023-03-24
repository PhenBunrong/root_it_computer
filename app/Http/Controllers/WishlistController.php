<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlists;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlists::where('user_id', Auth::id())->get();
        return view('frontEnd.wishlist.index', compact('wishlist'));
    }

    public function storeWishlist(Request $request)
    {
        $product_id =$request->product_id;

        if( Wishlists::where('user_id',Auth::id())->where('product_id', $product_id)->exists() )
        {
            return response()->json(['status'=>'Product is already Added to Wishlist']);
        }
        else
        {
            $wishlist = new Wishlists();
            $wishlist->user_id = Auth::id();
            $wishlist->product_id = $product_id;
            $wishlist->save();

            return response()->json(['status'=>'Product is Added to Wishlist']);

        }
    }

    public function removeWishlist(Request $request){
        $wishlist_id = $request->wishlist_id;
        if(Wishlists::where('user_id',Auth::id())->where('id', $wishlist_id)->exists() )
        {
            $wishlist = Wishlists::where('user_id',Auth::id())->where('id',$wishlist_id)->first();
            $wishlist->delete();
            return response()->json(['status'=>'Item Removed from Wishlist']);
        }
        else
        {
            return response()->json(['status'=>'No Items Found is Wishlist']);
        }
    }

    public function wishlistloadbyajax()
    {
        if(Wishlists::where('user_id', Auth::id())->get() )
        {
            $wishlist = Wishlists::where('user_id', Auth::id())->get();
            $totalwishlist = count($wishlist);

            echo json_encode(array('totalwishlist' => $totalwishlist)); die;
            return;
        }
        else
        {
            $totalwishlist = "0";
            echo json_encode(array('totalwishlist' => $totalwishlist)); die;
            return;
        }
    }
}
