$(document).ready(function () {

    $.ajaxSetup({
        header:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.apply_coupon_btn').click(function (e){
        e.preventDefault();

        var coupon_code = $('.coupon_code').val();

        if($.trim(coupon_code).length == 0){
            error_coupon = "Please enter valid Coupon";
            $('#error_coupon').text(error_coupon);
        }
        else{
            error_coupon = '';
            $('#error_coupon').text(error_coupon);
        }

        if(error_coupon != ''){
            return false;
        }

        $.ajax({
            method: "POST",
            url: "/check-coupon-code",
            data: {
                'coupon_code':coupon_code
            },
            success: function (response){
                if(response.error_status == 'error')
                {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    $('.coupon_code').val();
                }
                else
                {
                    var discount_price = response.discount_price;
                    var grand_total_price = response.grand_total_price;
                    $('.coupon_code').prop('readonly', true);
                    $('.discount_price').text(discount_price.toFixed(2));
                    $('.grand_total_price').text(grand_total_price.toFixed(2));
                }
            }
        });
    });


    $('.razorpay_pay_btn').click(function (e) {
        e.preventDefault();

        var data = {
            '_token' : $('input[name=_token]').val(),
            'first_name' : $('input[name=first_name]').val(),
            'last_name' : $('input[name=last_name]').val(),
            'phone' : $('input[name=phone]').val(),
            'city' : $('input[name=city]').val(),
            'state' : $('input[name=state]').val(),
            'country' : $('input[name=country]').val(),
            'pincode' : $('input[name=pincode]').val(),
        }

        $.ajax({
            type: "POST",
            url: "/confirm-razorpay-payment",
            data: data,
            success: function (response) {
                if(response.status_code == "no_data_in_cart")
                {
                    window.location.href = "/cart";
                }
                else 
                {
                    /* 
                        console.log(response.total_price); 
                        "amount": (response.total_price * 100),
                    */
                    var options = {
                        "key": "rzp_test_5AEIUNtEJxBPvS", // Enter the Key ID generated from the Dashboard
                        "amount": (1 * 100),
                        "name": "Root It Support",
                        "description": "Thank you for purchasing",
                        "image": "http://127.0.0.1:8000/public/image/root-logo11.png",
                        /* "order_id": "order_9A33XWu170gUtm", */ //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (razorpay_response){
                            /* alert(razorpay_response.razorpay_payment_id); */

                            $.ajax({
                                type: "POST",
                                url: '/place-order',
                                data: {
                                    '_token' : $('input[name=_token]').val(),
                                    'razorpay_payment_id': razorpay_response.razorpay_payment_id,
                                    'first_name': response.first_name,
                                    'last_name': response.last_name,
                                    'phone': response.phone,
                                    'city': response.city,
                                    'state': response.state,
                                    'country': response.country,
                                    'pincode': response.pincode,
                                    'place_order_razorpay': true,
                                },
                                success: function (msgsasa) {
                                    window.location.href = "/think-you";
                                }
                            });
                        },
                        "prefill": {
                            "name": response.first_name + response.last_name,
                            "email": response.phone,
                            "contact": response.email,
                        },
                        "theme": {
                            "color": "#528FF0"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                        rzp1.open();
                        e.preventDefault();
                }
            }
        });
    });


    function selectPaymentMethod(){
        alert('test');
    }
});