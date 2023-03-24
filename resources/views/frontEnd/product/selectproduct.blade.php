@include('frontEnd.part.modal')
@if($products->isEmpty())
        <h3> Sorry, Products not Found!</h3>
@else   
    
    @foreach($products as $item)
    <?php $countP=0;?>
        <div class="product_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="product_inner">
                        <h2>{{$item->name}}</h2>
                        <div class="row">
                            <div class="pro_space">
                            <?php $product = App\Models\Product::productShow($item->product_id); ?>
                                @foreach($product as $row)
                                    <div class="col-md-3 col-sm-4">
                                        <div class="product product_data">
                                            <div class="pro_img">
                                                <img src="{{asset('uploads/product/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
                                            </div><!-- end pro_img -->
                                            <div class="product__footer">
                                                <div class="pro_title">
                                                    <h3 class="ellipis"><a href="{{url('productsDetail/'.$row->id)}}" title="{{$row->name}}">{{$row->name}}</a></h3>
                                                </div><!-- end pro_title -->
                                                <div class="pro_price">
                                                        <h4><strike>$ {{$row->price}}</strike> <span>$ {{$row->spl_price}}</span></h4>
                                                        <input type="hidden" class="product_id" value="{{$row->id}}">
                                                        <input type="hidden" min="1" value="1" max="10" class="qty-input forme-control">
                                                        <button type="button" class="product__btn" id="addCart{{$row->id}}" value="{{$row->id}}">Add To Cart</button>
                                                        <div id="successMsg{{$row->id}}" class="alert alert-success" style="display:none;"> </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="" class="view_btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                    <input type="hidden" class="product_id" value="$row->id">
                                                    @guest
                                                        <a href="{{url('/login')}}">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                    @else
                                                        <a class="add-to-wishlist-btn">
                                                            <i class="fas fa-heart" ></i>
                                                        </a>
                                                    @endguest
                                                    </li>
                                                    <li>
                                                        <a href="{{url('productsDetail/'.$row->id)}}">
                                                            <i class="fas fa-list"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                @endforeach
                            </div><!-- end pro_space -->
                        </div><!-- end row -->
                    </div><!-- end product_inner -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end product_wrapper -->
    <?php $countP++?>
    @endforeach

@endif

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