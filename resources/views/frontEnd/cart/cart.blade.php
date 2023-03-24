<!-- Storage::url(..['item_image']) -->
@extends('frontEnd.frontEnd')

@section('content')
<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
            <li><a href="{{route('cart')}}" title="Product Brand">Cart</a></li>
        </ol>
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->


<div class="content_wrapper">
    <div class="container">
        <section class="section cart__area">
            <div class="container">
                <div class="responsive__cart-area">
                @if(isset($cart_data))
                            @if(Cookie::get('shopping_cart'))
                                @php $total="0" @endphp
                                @php $totalItem="0" @endphp
                                <form class="cart__form">
                                    <div class="cart__table table-responsive">
                                        <table width="100%" class="table">
                                            <thead>
                                                <tr>
                                                    <th>PRODUCT</th>
                                                    <th>NAME</th>
                                                    <th>UNIT PRICE</th>
                                                    <th>QUANTITY</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach ($cart_data as $data)
                                                <tr class="cartpage">
                                                    <td class="product__thumbnail">
                                                        <a href="{{url('productsDetail/'.$data['item_id'])}}">
                                                            <img src="{{asset('uploads/product/'.$data['item_image'])}}" alt="{{ $data['item_name'] }}" class="img-responsive" />
                                                        </a>
                                                    </td>
                                                    <td class="product__name">
                                                        <a href="{{url('productsDetail/'.$data['item_id'])}}">{{Illuminate\Support\Str::of($data['item_name'])->Limit(15)}}</a>
                                                        <br>
                                                        <small>{{Illuminate\Support\Str::of($data['item_category'])->Limit(10)}} / {{Illuminate\Support\Str::of($data['item_brand'])->Limit(10)}}</small>
                                                    </td>
                                                    <td class="product__price">
                                                        <div class="price">
                                                            <span class="new__price">${{ number_format($data['item_price']) }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="product__quantity">
                                                        <div class="input-counter">
                                                            <input type="hidden" class="product_id" value="{{ $data['item_id'] }}" >

                                                            <div class="quantity">
                                                                <span class="minus-btn decrement-btn changeQuantity" style="cursor: pointer">
                                                                    <i class="fas fa-minus"></i>
                                                                </span>
                                                                <input type="text" maxlength="2" value="{{ $data['item_quantity'] }}" value="1" max="10" class="qty-input counter-btn">
                                                                <span class="plus-btn increment-btn changeQuantity" style="cursor: pointer">
                                                                    <i class="fas fa-plus"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product__subtotal">
                                                        <div class="price">
                                                            <span class="new__price cart-grand-total-price">${{ number_format($data['item_quantity'] * $data['item_price']) }}</span>
                                                        </div>
                                                        <a class="remove__cart-item delete_cart_data">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                    @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                                    
                                                    @php $totalItem = $totalItem + ($data["item_quantity"]) @endphp
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="cart-btns">
                                        <div class="continue__shopping">
                                            <a href="/">Continue Shopping</a>
                                        </div>
                                        <div class="check__shipping">
                                            <a class="clear_cart product__name" style="cursor: pointer;">Clear Cart</a>
                                        </div>
                                    </div>

                                    <div class="cart__totals">
                                        <h3>Cart Totals</h3>
                                        <div id="totalajaxcall">
                                            <ul class="totalpricingload">
                                                <li>
                                                    Subtotal
                                                    <span class="new__price">${{ number_format($total ,2) }}</span>
                                                </li>
                                                <li>
                                                    Shipping
                                                    <span class="new__price">{{ number_format($totalItem) }} Order</span>
                                                </li>
                                                <li>
                                                    Total
                                                    <span class="new__price">${{ number_format($total ,2) }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        @if (Auth::user())
                                            <a href="{{ url('checkout') }}" >PROCCED TO CHECKOUT</a>
                                        @else
                                            <a href="{{url('/login')}}">PROCCED TO CHECKOUT</a>
                                            {{-- you add a pop modal for making a login --}}
                                        @endif
                                    </div>
                                </form>
                @endif
                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="search-button">
                                <h4>Your cart is currently empty.</h4>
                                <a href="/">Continue Shopping<i class="fa fa-search"></i></a>
                            </div><!-- end search-button -->
                        </div>
                    </div>
                @endif
                </div>
            </div>

        </section>
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->
@endsection
