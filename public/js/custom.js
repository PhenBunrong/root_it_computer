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
            var parsed = jQuery.parseJSON(response);
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


// const popup = document.querySelector(".popup");
// const closePopup = document.querySelector(".popup__close");

// if (popup) {
//   closePopup.addEventListener("click", () => {
//     popup.classList.add("hide__popup");
//   });

//   window.addEventListener("load", () => {
//     setTimeout(() => {
//       popup.classList.remove("hide__popup");
//     }, 500);
//   });
// }



/// Popup /
// $(window).load(function () {
//     $(".trigger_popup_fricc").click(function(){
//        $('.hover_bkgr_fricc').show();
//     });
//     $('.hover_bkgr_fricc').click(function(){
//         $('.hover_bkgr_fricc').hide();
//     });
//     $('.popupCloseButton').click(function(){
//         $('.hover_bkgr_fricc').hide();
//     });
// });


// $(document).ready(function () {
//     if($('.wrap-search-form .wrap-list-cate').length > 0 ){
//         $('.wrap-search-form .wrap-list-cate').on('click', '.link-control', function (event){
//             event.preventDefault();
//             $(this).siblings('select').slideToggle();
//         });
//         $('.wrap-search-form .wrap-list-cate .slt_cus').on('click', 'option', function (event){
//             var _this = $(this),
//                 //_value = _this.text(),
//                 _value = _this.text(),
//                 _content = _this.text(),
//                 _title = _this.text(),
//             _content = _content.slice(0 ,12);
//             _this.parent().siblings('a').text(_content).attr('title',_title);
//             _this.parent().siblings('input[name="product_cat"]').val(_value);
//             _this.parent().siblings('input[name="product_cat_id"]').val(_this.data("id"));
//             _this.parent().slideUp();
//         });
//     }
// });


// $(document).ready(function () {

//     fetch_data();

//     function fetch_data(category = '')
//     {
//         $('.slt_cus').DataTable({
//             processing: true,
//             severSide: true,
//             ajax: {
//                 url:"/search",
//                 data: {category:category}
//             },
//             columns:[
//                 {
//                     data: 'id',
//                     name: 'id'
//                 },
//                 {
//                     data: 'name',
//                     name: 'name'
//                 },
//                 {
//                     data: 'category_name',
//                     name: 'category_name',
//                     orderable: false
//                 },
//                 {
//                     data: 'price',
//                     name: 'price'
//                 },
//             ]
//         });

//         $('#category_filter').change(function(){
//             var category_id = $('#category_filter').val();

//             $('.slt_cus').DataTable().destroy();

//             fetch_data(category_id);
//         });
//     }
// });