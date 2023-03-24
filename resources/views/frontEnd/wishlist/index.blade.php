@extends('frontEnd.frontEnd')

@section('content')
<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
            <li><a href="{{route('cart')}}" title="Product Brand">Wishlist</a></li>
        </ol>
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->

<div class="content_wrapper">
    <div class="container">
        <section class="section cart__area">
            <div class="container">
                <div class="responsive__cart-area">
                    <div class="cart__table table-responsive">
                        <table width="100%" class="table">
                            <thead>
                                <tr>
                                    <th width="15%">PRODUCT IMAGE</th>
                                    <th></th>
                                    <th>PRICE</th>
                                    <th>ADD TO CART</th>
                                    <th>VIIEW</th>
                                    <th>REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist as $row)
                                @if(isset($row->products))
                                    <tr class="cartpage product_data">
                                        <td class="product__thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="{{asset('uploads/product/'.$row->products->image)}}" alt="{{ $row->products->name }}" class="img-responsive" />
                                            </a>
                                        </td>
                                        <td class="product__name">{{Illuminate\Support\Str::of($row->products->name)->Limit(40)}}</td>
                                        <td class="product__price">
                                            ${{$row->products->price}}
                                        </td>
                                        <td>
                                            <input type="hidden" class="product_id" value="{{$row->products->id}}">
                                            <input type="hidden" min="1" value="1" max="10" class="qty-input forme-control">
                                            <button type="button" class="btn btn-primary btn-sm" id="addCart{{$row->products->id}}" value="{{$row->products->id}}">Add To Cart</button>
                                            <p id="successMsg{{$row->products->id}}" class="btn btn-success btn-sm" style="display:none;"> </p>
                                        </td>
                                        <td><a href="{{url('productsDetail/'.$row->products->id)}}" title="{{$row->products->name}}" class="btn btn-primary btn-sm">View</a></td>
                                        <td> 
                                            <input type="hidden" class="wishlist_id" value="{{$row->id}}">
                                            <a type="button" class="btn btn-danger btn-sm wishlist-remove-btn">Remove</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div class="cart-btns">
                            <div class="continue__shopping">
                                <a href="/">Continue Wishlist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->



@endsection
