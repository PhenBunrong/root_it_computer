<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('frontEnd.index');
}); */

Route::get('/','FrontEndController@index');

Route::get('shop','FrontEndController@shop');

Auth::routes(['verify' => true]);

/* Route::get('/', 'HomeController@index')->name('home'); */
/* Route::get('/', 'FrontEndController@index'); */

Route::get('/cart','CartController@index')->name('cart');
Route::post('add-to-cart','CartController@addtocart');
Route::get('/load-cart-data','CartController@cartloadbyajax');
Route::post('update-to-cart','CartController@updatetocart');
Route::delete('delete-from-cart','CartController@deletefromcart');
Route::get('clear-cart','CartController@clearcart');

Route::get('/showBrand/{id}','FrontEndController@showBrand');
Route::get('/showCategory/{id}','FrontEndController@showCategory');
Route::get('/showbyBrand/{id}','FrontEndController@showbyBrand');

Route::get('/showCareers','FrontEndController@showCareers');

Route::get('/showAllCategory','FrontEndController@showAllCategory');
Route::get('/showAllbrand','FrontEndController@showAllbrands');
Route::get('/showPromotion','FrontEndController@showPromotion');
Route::get('/productsDetail/{id}','FrontEndController@detailPro');
Route::get('/productsPromotionDetail/{id}','FrontEndController@detailPromotion');
Route::get('/popUpDetail/{id}','FrontEndController@popUpDetailPro');


Route::get('/viewDetailProd','FrontEndController@viewDetailProd');

Route::post('addItem','FrontEndController@addtocartIndex');

Route::get('/showAllEvents','EventsController@showAllEvents');
Route::get('/eventsDetail/{id}','EventsController@detailEvents');

Route::get('/thank-you','CheckController@thankyou');

Route::get('/showAllSolutions','SolutionDataController@showAllSolutions');
Route::get('/solutionsDetail/{id}','SolutionDataController@detailSolution');

Route::get('/showAllService','ServiceDataController@showAllService');
Route::get('/serviceDetail/{id}','ServiceDataController@detailService');

Route::get('/about-us','AboutUsController@index');
Route::get('/contact-us','ContactUsController@index');
Route::post('page/contact','ContactUsController@contact');

Route::get('/search/{id}','SearchController@getCategory');
Route::get('/getDateSearch','SearchController@getProduct')->name('search');

Auth::routes();

Route::group(['middleware' => ['auth','isSubscriber']], function () {

    Route::get('/home', 'FrontEndController@index')->name('home');
    Route::get('checkout','CheckController@index');
    Route::post('place-order','CheckController@storeOrder');

    Route::post('place-orders','CheckController@placeOrders');
    Route::match(['get','post'],'/stripe','CheckController@stripe');

    
    Route::match(['get','post'],'/paypal','CheckController@paypal');
    Route::match(['get','post'],'paypal-success','CheckController@checkoutSuccess')->name('paypal.success');
    Route::match(['get','post'],'paypal-cancel','CheckController@checkoutCancel')->name('paypal.cancel');

    Route::get('user/wishlist','WishlistController@index');
    Route::post('add-wishlist','WishlistController@storeWishlist');
    Route::post('remove-from-wishlist','WishlistController@removeWishlist');
    Route::get('/load-wishlist-data','WishlistController@wishlistloadbyajax');

    Route::post('confirm-razorpay-payment','CheckController@checkamount');

    Route::post('check-coupon-code','CheckController@checkcoupon');

    
    Route::get('/profile','ProfileController@index');
    Route::post('/updateAccount','ProfileController@updateAccount');
    Route::get('/orders','ProfileController@orders');
    Route::get('/address','ProfileController@address');
    Route::post('/updateAddress','ProfileController@updateAddress');
    Route::get('/password','ProfileController@password');
    Route::put('/updatePassword','ProfileController@updatePassword');
});


Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    /* Route::get('/dashboard', function() {
        return view('layouts.master');
    }); */
    Route::get('/dashboard','HomeController@dashboad')->name('dashboad');
    Route::get('/view-users-chart','HomeController@userChart');

    
    Route::get('/profile-user/{id}','RegisterUserController@profile')->name('profile.index');
    Route::get('/profileEdte-user/{id}','RegisterUserController@profileEdite')->name('profile.edit');
    Route::put('/profileUpdate/{id}','RegisterUserController@profileUpdate');


    Route::get('/register-user','RegisterUserController@index');
    Route::get('/role-edit/{id}','RegisterUserController@edit');
    Route::put('/role-update/{id}','RegisterUserController@update');
    Route::delete('/role-destroy/{id}','RegisterUserController@destroy');

    Route::resource('/subCategory', 'subCategoryController');

    Route::resource('/product', 'ProductController');

    Route::post('/update-product-status', 'ProductController@updateStatus');
    Route::post('/update-webpage-status', 'WebpageController@updateStatus');
    Route::post('/update-slideshow-status', 'BannerController@updateStatus');
    Route::post('/update-category-status', 'CategoryController@updateStatus');
    Route::post('/update-brand-status', 'BrandController@updateStatus');
    Route::post('/update-event-status', 'EventsController@updateStatus');
    Route::post('/update-service-status', 'ServiceDataController@updateStatus');
    Route::post('/update-solution-status', 'SolutionDataController@updateStatus');
    Route::post('/update-subCategory-status', 'subCategoryController@updateStatus');
    Route::post('/update-promotion-status', 'PromotionController@updateStatus');
    Route::post('/update-user-isban', 'RegisterUserController@updateBan');
    /* Route::post('/changeStatus', 'ProductController@changeStatus'); */
    

    Route::get('/search/{id}','ProductController@getCategory');

    Route::resource('/promotion', 'PromotionController');

    Route::resource('/webpage', 'WebpageController');

    Route::resource('/events', 'EventsController');
    Route::match(['get','post'],'eventsImageAtrr/{id}', 'EventsController@ViewAttributes');
    Route::delete('/deleteEventsImageAtrr/{id}', 'EventsController@deleteAttributeImage');

    Route::match(['get','post'],'add_attributes/{id}', 'ProductController@addAttributes');
    Route::match(['get','post'],'edit_Attribute/{id}', 'ProductController@editAttributes');
    Route::delete('/deleteAttribute/{id}', 'ProductController@deleteAttribute');

    Route::match(['get','post'],'view_attributes/{id}', 'ProductController@ViewAttributes');
    Route::delete('/deleteAttributeImage/{id}', 'ProductController@deleteAttributeImage');


    Route::match(['get','post'],'promotion_attributes/{id}', 'PromotionController@addAttributes');
    Route::match(['get','post'],'edit_pro_Attribute/{id}', 'PromotionController@editAttributes');
    Route::delete('/deletePromotionAttribute/{id}', 'PromotionController@deleteAttribute');

    Route::match(['get','post'],'promotion_image/{id}', 'PromotionController@ViewAttributes');
    Route::delete('/deletePromotionImage/{id}', 'PromotionController@deleteAttributeImage');


    Route::resource('/category', 'CategoryController');
    Route::resource('/brand', 'BrandController');
    Route::resource('/cms', 'CMSController');
    Route::post('/update-cms-status', 'CMSController@updateStatus');

    Route::resource('/service', 'ServiceDataController');
    Route::match(['get','post'],'serviceImageAtrr/{id}', 'ServiceDataController@ViewAttributes');
    Route::delete('/deleteServiceImageAtrr/{id}', 'ServiceDataController@deleteAttributeImage');


    Route::resource('/solution', 'SolutionDataController');
    Route::match(['get','post'],'solutionImageAtrr/{id}', 'SolutionDataController@ViewAttributes');
    Route::delete('/deleteSolutionImageAtrr/{id}', 'SolutionDataController@deleteAttributeImage');

    Route::get('order','OrderController@index')->name('order.index');
    Route::get('order-view/{order_id}','OrderController@vieworder');
    Route::get('order-proceed/{order_id}','OrderController@proceedOrder');
    Route::get('generate-invoice/{order_id}','OrderController@invoice');
    
    Route::get('report','OrderController@report')->name('report.index');
    Route::get('viewReport/{order_id}','OrderController@viewReport');
    Route::get('printReport/{order_id}','OrderController@printReport');
    Route::get('searchFilter','OrderController@searchFilter')->name('searchFilter.index');

    Route::put('order/update-tracking-status/{order_id}','OrderController@trackingStatus');
    Route::put('order/cancel-order/{order_id}','OrderController@cancelOrder');
    Route::put('order/complete-order/{order_id}','OrderController@completeOrder');

    Route::resource('/banner', 'BannerController');

    
    Route::get('activity','RegisterUserController@activity');
    Route::delete('destroyActivity/{id}','RegisterUserController@destroyActivity')->name('activity.destroy');
    
    Route::get('/updateRole','RegisterUserController@updateRole');

    Route::post('searchReport','OrderController@searchReport');

    Route::get('/customer','RegisterUserController@customerindex')->name('customer.index');

    Route::get('/userCreate','RegisterUserController@userCreate')->name('user.userCreate');
    Route::post('/userStore','RegisterUserController@userStore')->name('user.userStore');
    // Sale Search 
    Route::get('searchData','SearchController@index')->name('search.reports');
    Route::post('checkData','SearchController@reportSearch')->name('check.reports');

    Route::resource('coupon', 'CouponController');
    
    
    Route::resource('settings', 'SettingController');


  /*   Route::get('/showAttr/{id}','SolutionDataController@showAttr');
    Route::get('/attrImage/{id}','SolutionDataController@attrImage'); */
    

/*     Route::match(['get','post'],'add_attributes/{id}', 'ServiceDataController@addAttributes');
    Route::match(['get','post'],'edit_Attribute/{id}', 'ServiceDataController@editAttributes');
    Route::delete('/deleteAttribute/{id}', 'ServiceDataController@deleteAttribute'); */

});


Route::group(['middleware' => ['auth','isVendor']], function () {
    Route::get('/vendor-dashboard', function() {
        return view('vendor.dashboard');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
