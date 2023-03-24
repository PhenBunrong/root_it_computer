@extends('frontEnd.frontEnd')

@section('content')
<style>
         .myButton {
	box-shadow: 0px 1px 0px 0px #f0f7fa;
	background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
	background-color:#33bdef;
	border-radius:6px;
	border:1px solid #057fd0;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px -1px 0px #5b6178;
    }
    .myButton:hover {
        background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
        background-color:#019ad2;
    }
    .myButton:active {
        position:relative;
        top:1px;
    }
    .myButton2 {
	box-shadow: 0px 1px 0px 0px #fff6af;
	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
	background-color:#ffec64;
	border-radius:6px;
	border:1px solid #ffaa22;
	display:inline-block;
	cursor:pointer;
	color:#333333;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffee66;
    }
    .myButton2:hover {
        background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
        background-color:#ffab23;
    }
    .myButton2:active {
        position:relative;
        top:1px;
    }
    
    /** ADD YOUR AWESOME CODES HERE **/

    .StripeElement {
    box-sizing: border-box;

    height: 40px;

    padding: 10px 12px;

    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
    
    }

    .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
    border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
    }
</style>
<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
            <li><a href="" title="Product Brand">Thank You</a></li>
        </ol>
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->
<h1 align="center">Thanks For Purchasing With Us!</h1> <br>
<div class="content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-5 text-center">
                <div class="buttons clearfix">
                    <div align="center">
                        <h2>YOUR  ORDER HAS BEEN PLACED</h2>
                        <p>Your Order Number is {{Session::get('order_id')}} and total payable about is USD {{ number_format(Session::get('grand_total'), 2) }}</p>
                        <b>Please make payment by entering your credit or debit card</b>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="title-box">Payment Method</h4>
                <hr>
                <script src="https://js.stripe.com/v3/"></script>
                <form action="/stripe" method="post" id="payment-form"> {{csrf_field()}}
                        <div class="form-row">
                            <div class="mb-3">
                                <label> Your Name</label>
                                    <input type="text" name="name" placeholder="Enter Your Name" class="form-control">
                                
                            </div>
                            <div class="mb-3">
                                <label> Card Number</label>
                                <div id="card-element" class="form-control">

                                </div>
                                <div id="card-error" role="alert"></div>
                            </div>
                        </div>
                        <div>
                            <img src="../../dist/img/credit/visa.png" alt="Visa">
                            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                            <img src="../../dist/img/credit/american-express.png" alt="American Express">
                            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label> Total Amount To Be Paid :</label>
                                  USD {{ number_format(Session::get('grand_total'), 2) }}
                                <input  type="hidden" name="total_amount" value="{{Session::get('grand_total')}}"  placeholder="Pleace Enter Amount To Send" class="form-control">
                        </div>
                        <hr>
                        <button class="myButton2">Payment Now</button>
                </form>
            </div>
        </div>    
    </div>
</div>

    <script>
        // Create a Stripe client.
    var stripe = Stripe('pk_test_51KKm4JFZMrlwEAmO03J7aHINhwucOjA5SUkA7Sm50bfiMRVZWdrFKJ3mTKaAA7j3QdSM0wdczQrvMOr3yeXCqQNa007MD7Fx1g');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
        },
        invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
        displayError.textContent = event.error.message;
        } else {
        displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
    </script>
    
@endsection


<?php

Session::forget('order_id');
Session::forget('grand_total');

?>