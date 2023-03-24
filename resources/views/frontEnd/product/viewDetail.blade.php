<script src="{{asset('public/js/jquery.min.js')}}"></script>     
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/slider/amazingslider.js')}}"></script>
    <script src="{{asset('public/slider/initslider-1.js')}}"></script>
    <script src="{{asset('public/sliderphone/initslider-1.js')}}"></script>
    <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/js/modernizr.custom.js')}}"></script>
    <script src="{{asset('public/js/cbpHorizontalSlideOutMenu.min.js')}}"></script>
	<script src="{{asset('public/slideroffers/amazingslider.js')}}"></script>
	<script src="{{asset('public/slideroffers/initslider-1.js')}}"></script>
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/css/fontawesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/animate.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/nav.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/nav-desk.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/owl.theme.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/custom.css')}}" />

  <br>  
<div class="product_data">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div id="amazingslider-offer" style="display:block;position:relative;margin-top:0px;margin-bottom:120px;">
                
                    <ul class="amazingslider-slides">
                        @foreach($dataImage as $id=>$attImage)
                            <li class="{{$id==0 ? 'active' : ''}}"><img src="{{asset('uploads/products/'.$attImage->image)}}" alt="{{($attImage->name)}}"/></li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
                    <ul class="amazingslider-thumbnails">
                        @foreach($dataImage as $id=>$attImage)
                            <li class="{{$id==0 ? 'active' : ''}}"><img src="{{asset('uploads/products/'.$attImage->image)}}" alt="{{($attImage->name)}}"/></li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
            
            </div><!-- end amazingslider-offer -->
        </div><!-- end col -->
        <div class="col-md-6 col-sm-6">
            <div class="pro_overview">
                <h4>{{$data->name}}</h4>
                <div class="pro_price" style="text-align: left;">
                    <strike>$ {{$data->price}}</strike> <span>$ {{$data->spl_price}}</span>
                </div><!-- end pro_price -->
                <div class="line"></div>
                
                <ul>
                    @foreach($data->attributes as $row)
                    <li>
                        <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">{{$row->pro_info}}<br />
                        </span></span>
                    </li>
                    @endforeach
                </ul>
                
                <div style="padding-top: 10px; padding-bottom: 15px;">
                    <span class='st_sharethis_large' displayText='ShareThis'></span>
                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_googleplus_large' displayText='Google +'></span>
                    <span class='st_email_large' displayText='Email'></span>
                </div><!-- end share -->
                <div class="col-md-4 md-3">
                    <input type="hidden" class="product_id" value="{{$data->id}}">
                    <input type="number" min="1" value="1" max="10" class="qty-input form-control">
                </div>
                <div class="col-md-4 mycards md-3">
                    <button class="add-to-cart-btn  payment_btn btn-block" name="place_order_btn">
                        <i class="fa fa-cart-plus"></i>&nbsp; Add Cart
                    </button>
                </div>
                <div class="col-md-4 mycards md-3">
                    @guest
                        <button href="{{url('/login')}}" name="place_order_btn" class=" btn-block payment_btn">
                            <i class="fas fa-heart"></i>&nbsp; Wishlist
                        </button>
                    @else
                        <button class="add-to-wishlist-btn  btn-block payment_btn" name="place_order_btn">
                            <i class="fas fa-heart" ></i>&nbsp; Wishlist
                        </button>
                    @endguest
                </div>

            </div><!-- end pro_overview -->
        </div><!-- end col -->
    </div><!-- end row -->
    <br>
    
    <div class="row">
            <div class="col-md-12">
                <div class="mycards">
                    <a href="{{url('productsDetail/'.$data->id)}}" name="place_order_btn" class="btn btn-block payment_btn">More Details</a>
                </div>
            </div>
        </div>
</div>


<script>
    // View Detail Product

    $(document).ready(function () {
        $('.view_btn').click(function (e){
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            /* alert(product_id); */

            $.ajax({
                type: "GET",
                url: "/viewDetailProd",
                data: {
                    'checking_viewbtn': true,
                    'product_id': product_id,
                },
                success: function (response) {
                /*    console.log(response); */
                    $('.productDetail').html(response);
                    $('#viewProduct').modal('show');
                },
            });

        });
    });


    // wishlist

    $(document).ready(function () {

        wishlistload();

        $('.add-to-wishlist-btn').click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product_data').find('.product_id').val();

            // alert(product_id);

            $.ajax({
                method: "POST",
                url: "/add-wishlist",
                data: {
                    'product_id': product_id,
                },
                success: function (response) {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                },
            });

            $.ajax({
                url: '/load-wishlist-data',
                method: "GET",
                success: function (response) {
                    $('.wishlist-item-count').html('');
                    var parsed = jQuery.parseJSON(response)
                    var value = parsed; //Single Data Viewing
                    $('.wishlist-item-count').append($('<span class="countWishlist">'+ value['totalwishlist'] +'</span>'));
                }
            });

        });

    });

    //Count Wishlist
    function wishlistload()
    {
        $.ajax({
            url: '/load-wishlist-data',
            method: "GET",
            success: function (response) {
                $('.wishlist-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.wishlist-item-count').append($('<span class="countWishlist">'+ value['totalwishlist'] +'</span>'));
            }
        });
    }


    // wishlist remove

    $(document).ready(function () {
        $('.wishlist-remove-btn').click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var Clickedthis = $(this);
            var wishlist_id = $(Clickedthis).closest('.cartpage').find('.wishlist_id').val();

            $.ajax({
                method: "POST",
                url: "/remove-from-wishlist",
                data: {
                    'wishlist_id': wishlist_id,
                },
                success: function (response) {
                    $(Clickedthis).closest('.cartpage').remove();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                },
            });
        });
    });




    // Count Cart
    $(document).ready(function () {
        cartload();

        //btn add input
        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

    });

    function cartload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load-cart-data',
            method: "GET",
            success: function (response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<span class="count">'+ value['totalcart'] +'</span>'));
            }
        });
    }


    // Add Cart
    $(document).ready(function () {
        $('.add-to-cart-btn').click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();
            /* alert(quantity); */
            $.ajax({
                url: "/add-to-cart",
                method: "POST",
                data: {
                    'quantity': quantity,
                    'product_id': product_id,
                },
                success: function (response) {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    cartload();
                },
            });
        });
    });



    // Update Cart Data
    $(document).ready(function () {

        $('.changeQuantity').click(function (e) {
            e.preventDefault();

            var thisClick = $(this);
            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity':quantity,
                'product_id':product_id,
            };

            $.ajax({
                url: '/update-to-cart',
                type: 'POST',
                data: data,
                success: function (response) {
                    // window.location.reload();
                    /* console.log(response.gtprice); */
                    thisClick.closest(".cartpage").find('.cart-grand-total-price').text(response.gtprice);
                    $('#totalajaxcall').load(location.href + ' .totalpricingload');
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });

    });

    // Delete Cart Data
    $(document).ready(function () {

        $('.delete_cart_data').click(function (e) {
            e.preventDefault();

            var thisDeletearea = $(this);
            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };

            // $(this).closest(".cartpage").remove();

            $.ajax({
                url: '/delete-from-cart',
                type: 'DELETE',
                data: data,
                success: function (response) {
                    /* window.location.reload(); */
                    thisDeletearea.closest(".cartpage").remove();
                    $('#totalajaxcall').load(location.href + ' .totalpricingload');
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });

    });


    // Clear Cart Data
    $(document).ready(function () {

        $('.clear_cart').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: '/clear-cart',
                type: 'GET',
                success: function (response) {
                    window.location.reload();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });

        });

    });


    // =============
    // PopUp
    // =============

    // wishlist

    $(document).ready(function () {

        $('.popup-btn').click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product_data').find('.product_id').val();

            alert(product_id);

            // $.ajax({
            //     method: "POST",
            //     url: "/add-wishlist",
            //     data: {
            //         'product_id': product_id,
            //     },
            //     success: function (response) {
            //         alertify.set('notifier','position','top-right');
            //         alertify.success(response.status);
            //     },
            // });

        });
    2
    });


</script>

<script>
	// Add Cart
	$(document).ready(function () {
		<?php $products=DB::table('products')->get(); ?>
		@foreach($products as $row)
		$('#addCart{{$row->id}}').click(function () {

			var product_id = $(this).closest('.product_data').find('#addCart{{$row->id}}').val();
			var quantity = $(this).closest('.product_data').find('.qty-input').val();
			/* alert(quantity); */
			$.ajax({
				url: "/addItem",
				method: "POST",
				data: {
					'quantity': quantity,
					'product_id': product_id,
				},
				success: function (response) {
					
					$('#addCart{{$row->id}}').hide();
					$('#successMsg{{$row->id}}').show();
					$('#successMsg{{$row->id}}').append('product has been added to cart');
					alertify.set('notifier','position','top-right');
					alertify.success(response.status);
					cartload();
				},
			});
		});
		@endforeach
	});


	// Add Cart
	$(document).ready(function () {
		<?php $products=DB::table('products')->get(); ?>
		@foreach($products as $row)
		$('#Cart{{$row->id}}').click(function () {

			var product_id = $(this).closest('.product_data').find('#Cart{{$row->id}}').val();
			var quantity = $(this).closest('.product_data').find('.qty-input').val();
			/* alert(quantity); */
			$.ajax({
				url: "/addItem",
				method: "POST",
				data: {
					'quantity': quantity,
					'product_id': product_id,
				},
				success: function (response) {
					
					$('#Cart{{$row->id}}').hide();
					$('#successMsge{{$row->id}}').show();
					$('#successMsge{{$row->id}}').append('product has been added to cart');
					alertify.set('notifier','position','top-right');
					alertify.success(response.status);
					cartload();
				},
			});
		});
		@endforeach
	});

	// Add Cart
	$(document).ready(function () {
		<?php $products=DB::table('products')->get(); ?>
		@foreach($products as $row)
		$('#CartTo{{$row->id}}').click(function () {

			var product_id = $(this).closest('.product_data').find('#CartTo{{$row->id}}').val();
			var quantity = $(this).closest('.product_data').find('.qty-input').val();
			/* alert(quantity); */
			$.ajax({
				url: "/addItem",
				method: "POST",
				data: {
					'quantity': quantity,
					'product_id': product_id,
				},
				success: function (response) {
					
					$('#CartTo{{$row->id}}').hide();
					$('#successMsge{{$row->id}}').show();
					$('#successMsges{{$row->id}}').append('product has been added to cart');
					alertify.set('notifier','position','top-right');
					alertify.success(response.status);
					cartload();
				},
			});
		});
		@endforeach
	});
</script>