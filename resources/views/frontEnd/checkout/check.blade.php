@extends('frontEnd.frontEnd')

@section('content')
<style>
    .modal-dialog{
        max-width: 400px !important;
    }
 </style>
<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
            <li><a href="{{route('cart')}}" title="Product Brand">Checkout</a></li>
        </ol>
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->
<!-- class="require-validation" -->

<div class="content_wrapper">
    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-8 mb-3">
                <div class="list-group-item">
                    <h4 class="mb-3">Billing address</h4>
                        <form action="{{ url('place-orders')}}" method="POST"  id="payment-form" name="payment-form">
                        @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">First name</label>
                                    <input id="first_name" type="text" name="first_name" placeholder="first name"  value="{{ Auth::user()->name }}" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="last_name">Last name</label>
                                    <input id="last_name" type="text" name="last_name" placeholder="last name"  value="{{ Auth::user()->lname }}" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input id="phone" type="text" name="phone" placeholder="phone"  value="{{ Auth::user()->phone }}" class="form-control">
                                </div>
                
                                <div class="col-md-12 mb-3">
                                    <label for="country">Select Country</label>
                                    <select name="country" class="form-control">
                                        <option value="Cambodia">Cambodia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="address1">Address1</label>
                                    <input id="address1" type="text" name="address1" placeholder="address1"  value="{{ Auth::user()->address1 }}" class="form-control">
                                    <div class="invalid-feedback">
                                        <span style="color:red">{{ $errors->first('address1') }}</span>
                                    </div>
                                </div>
                
                                <div class="col-md-12 mb-3">
                                    <label for="address2">Address2</label>
                                    <input id="address2" type="text" name="address2" placeholder="address2"  value="{{ Auth::user()->address2 }}" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <input id="state" type="text" name="state" placeholder="state name"  value="{{ Auth::user()->state }}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="city">Town / City</label>
                                    <input id="city" type="text" name="city" placeholder="city name"  value="{{ Auth::user()->city }}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pincode">Postcode / ZIP:</label>
                                    <input id="pincode" type="text" name="pincode" placeholder="pincode" value="{{ Auth::user()->pincode }}" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" name="email" placeholder="email"  value="{{ Auth::user()->email }}" class="form-control">
                                </div>
                            </div>

                            <hr class="mb-4">
                            <div class="row" style="margin:5px;">
                                <div class="col-md-12 mb-3">
                                    <div class="summary summary-checkout">
                                        <div class="summary-item paymant-method">
                                            <h4 class="title-box">Payment Method</h4>
                                            <hr>
                                            <p class="summary-info"><span class="title">Check / Money Order</span></p>
                                            <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                                            <hr>
                                                <div class="row" >
                                                    <div class="col-md-3 mb-3">
                                                        <label for="" class="payment_mode">
                                                            <input type="radio" name="payment_mode" class="cod"  id="payment_mode-bank" value="Cash On Delivery">
                                                            <span>Cash On Delivery</span>
                                                        <!--  <span class="payment-desc">Order Now Pay on Delivery</span> -->
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="" class="payment_mode">
                                                            <input type="radio" name="payment_mode" class="stripe" id="payment_mode-stripe" value="Stripe">
                                                            <span>Debit / Credit Card</span>
                                                        <!--  <span class="payment-desc">There are many variations</span> -->
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="" class="payment_mode">
                                                            <input type="radio" name="payment_mode" class="paypal" id="payment_mode-paypal" value="Paypal">
                                                            <span>Paypal</span>
                                                        <!--    <span class="payment-desc">There are many variations</span> -->
                                                        </label>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                                                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class=" btn-block payment_btn" onclick="return selectPaymentMethod()" type="submit">PLACE YOUR ORDER</button>
                                </div>
                            </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="list-group-item">
                    <div class="box-body">
                        Coupon Code
                        <div class="input-group" style="display:flex;">
                            <input type="text" name="coupon" class="form-control coupon_code" placeholder="Enter Coupon Code">
                            <div class="input-group-append">
                                <a class="btn btn-success apply_coupon_btn">Apply</a>
                            </div>
                        </div>
                        <small id="error_coupon" class="text-danger"></small>
                    </div>
                </div>
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="basket-item-count" id="cart__total">
							<span class="count">0</span>
					</span>
                </h4>
                @if(isset($cart_data))
                    @if(Cookie::get('shopping_cart'))
                        @php $total="0" @endphp
                        @php $totalItem="0" @endphp
                        <ul class="list-group mb-3">
                            @foreach ($cart_data as $data)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $data['item_name'] }}</h6>
                                    <small class="text-muted">Qty : {{ $data['item_quantity'] }}</small>
                                </div>
                                <span class="text-muted" style="color:red">${{ number_format($data['item_price'],2) }}</span>
                            </li>
                                        @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                                    
                                        @php $totalItem = $totalItem + ($data["item_quantity"]) @endphp

                                       
                            @endforeach
                            
                            <li class="list-group-item d-flex justify-content-between text-right">
                                <span>Sub Total (USD) : </span>
                                <strong>${{ number_format($total ,2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between text-right">
                                <span>Discount : </span>
                                <strong  class="discount_price">0.00</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between text-right">
                                <span>Grand Total : </span>
                                <strong  class="grand_total_price">${{ number_format($total, 2) }}</strong>
                            </li>
                        </ul>
                        <input type="hidden" value="{{$total}}" name="grand_total">
                @endif
                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Your cart is currently empty.</h4>
                                <a href="/" class="btn btn-primary">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        
        </form>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="{{asset('js/checkout.js')}}"></script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="{{asset('js/checkout-stripe.js')}}"></script>

    <script>
        function selectPaymentMethod(){
            if($('.cod').is(':checked'))
            {
                //alert('cod');
            }
            else if($('.stripe').is(':checked'))
            {
                //alert('stripe');
            }
            else if($('.paypal').is(':checked'))
            {
                //alert('paypal');
            }
            else{
                alert('Please Select Payment Method');
                return false;
            }
        }
    </script>
@endsection

<?php
    Session::forget('CouponDiscount');
    Session::forget('CouponAmount');
    Session::forget('CouponCode');
?>