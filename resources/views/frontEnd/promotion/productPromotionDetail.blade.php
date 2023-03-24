@extends('frontEnd.frontEnd')

@section('content')
<style type="text/css">
	.ellipis{
		width: 150px;
	}
	.breadcrumb_cus {
		width: 100%;
		height: auto;
		background: #033772;
		text-align: center;
	}
</style>

<div class="breadcrumb_cus">
    <div class="container">
			<?php $brand_name= App\Models\Product::where('id',$id_)->get() ?>
			@foreach($brand_name as $item)
				<h2>{{$item->name}}</h2>
			@endforeach
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
			<?php $brand_name= App\Models\Product::where('id',$id_)->get() ?>
			@foreach($brand_name as $item)
				<li><a href="{{url('showPromotion')}}" title="Promotion">Promotion</a></li>
				<li class="active">{{$item->name}}</li>
			@endforeach
        </ol>	
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->


<div class="container">
    <div class="search_widget_sub">
		<form name="search" action="{{ route('search') }}" method="GET">
			<div class="row wrap-search-form">
				<div class="col-md-10 col-sm-9">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="row">
								<div class="xs-pdd sm-pdd wrap-list-cate">

									<select name="e_category" class="form-control slt_cus">
											<option value="0">All Categories</option>
										<?php $proCateogry =DB::table('categories')->get(); ?>
										@foreach($proCateogry as $item)
											<option value="{{$item->id}}">{{ucwords($item->name)}}</option>
										@endforeach
									</select>
								</div><!-- end xs-pdd -->
								<!-- <div class="xs-pdd sm-pdd wrap-list-cate">

									<select name="product"​ id="product" class="form-control slt_cus">
											<option >All Categories</option>
									</select>
								</div> end xs-pdd -->
							</div><!-- end row -->
						</div><!-- end col -->
						<div class="col-md-8 col-sm-8">
							<div class="row">
								<div class="xs-pdd">
									<input type="text" class="form-control txt_cus" name="e_product" placeholder="Search Your Key Products ..." required />
								</div><!-- end xs-pdd -->
							</div><!-- end row -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end col -->

				<div class="col-md-2 col-sm-3">
					<button type="submit" class="form-control btn_search" id="btnsearch" name="btnsearch">Search Now <i style="margin-left: 5px;" class="fa fa-search"></i></button>
				</div><!-- end col -->
			</div><!-- end row -->
		</form>
    </div><!-- end search_widget_sub -->
</div><!-- end container -->

<div class="content_wrapper">
	<div class="container">
		<div class="content">
        	<div class="product_data">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div id="amazingslider-offer" style="display:block;position:relative;margin-top:0px;margin-bottom:120px;">
							
								<ul class="amazingslider-slides">
									@foreach($dataImage as $id=>$attImage)
										<li class="{{$id==0 ? 'active' : ''}}"><img src="{{asset('uploads/promotion/'.$attImage->image)}}" alt="{{($attImage->name)}}"/></li>
									@endforeach
								</ul>
								<div class="clear"></div>
								<ul class="amazingslider-thumbnails">
									@foreach($dataImage as $id=>$attImage)
										<li class="{{$id==0 ? 'active' : ''}}"><img src="{{asset('uploads/promotion/'.$attImage->image)}}" alt="{{($attImage->name)}}"/></li>
									@endforeach
								</ul>
								<div class="clear"></div>
						
						</div><!-- end amazingslider-offer -->
					</div><!-- end col -->
					<div class="col-md-6 col-sm-6">
						<div class="pro_overview">
							<h1>{{$data->name}}</h1>
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
							<div class="col-md-4">
								<input type="hidden" class="product_id" value="{{$data->id}}">
								<input type="number" min="1" value="1" max="10" class="qty-input form-control">
							</div>
							<div class="col-md-4 mycards">
								<button class="add-to-cart-btn btn payment_btn btn-block" name="place_order_btn">
									<i class="fa fa-cart-plus"></i>&nbsp; Add Cart
								</button>
							</div>
							<div class="col-md-4 mycards">
								@guest
									<button href="{{url('/login')}}" name="place_order_btn" class="btn btn-block payment_btn">
										<i class="fas fa-heart"></i>&nbsp; Wishlist
									</button>
								@else
									<button class="add-to-wishlist-btn btn btn-block payment_btn" name="place_order_btn">
										<i class="fas fa-heart" ></i>&nbsp; Wishlist
									</button>
								@endguest
							</div>

						</div><!-- end pro_overview -->
					</div><!-- end col -->
				</div><!-- end row -->
			</div>
		</div><!-- end content -->

	<div class="row">
		<div class="col-md-8 col-sm-7">

			<h2 class="h2-cus">Specification</h2>

			<div class="pro_detail">
				<ul>
					<span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">{!! $data->description !!}<br />
				</ul>
			</div><!-- end pro_detail -->

			<h2 class="h2-cus">Related Products</h2>

	
			<div class="row">
				@foreach($relatedProducts->chunk(3) as $chunk)
				@foreach($chunk as $item)
				<div class="col-md-4 col-sm-6">
					<div class="pro_box">
						<div class="pro_img">
							<a href="{{url('productsPromotionDetail/'.$item->id)}}" title="{{$item->name}}">
								<img src="{{asset('uploads/promotion/'.$item->image)}}" alt="{{$item->name}}" class="img-responsive" />
							</a>
							</div><!-- end pro_img -->
							<div class="pro_title">
								<h3 class="ellipis"><a href="{{url('productsPromotionDetail/'.$item->id)}}" title="{{$item->name}}">{{$item->name}}</a></h3>
							</div><!-- end pro_title -->
						<div class="pro_price">
							<strike>$ {{$item->price}}</strike> <span>$ {{$item->spl_price}}</span>
						</div><!-- end pro_price -->
					</div><!-- end pro_box -->
				</div><!-- end col -->
				@endforeach
			@endforeach
			</div><!-- end row -->
		</div><!-- end col -->
		<div class="col-md-4 col-sm-5">

			<h2 class="h2-cus">New Products Added</h2>
			<?php $products=DB::table('products')->latest()->paginate(12); ?>
				@foreach($products as $row)
				<div class="new_pro_box">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<div class="new_pro_img">
							<a href="{{url('productsDetail/'.$row->id)}}" title="{{$row->name}}">
								<img src="{{asset('uploads/product/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
								</a>
							</div><!-- end new_pro_img -->
						</div><!-- end col -->
						<div class="col-md-8 col-sm-8 col-xs-8">
							<div class="new_pro_title">
								<h3><a href="{{url('productsDetail/'.$row->id)}}" title="{{$row->name}}">{{$row->name}}</a></h3>
							</div><!-- end new_pro_title -->
							<div class="new_pro_price">
								<strike>$ {{$row->price}}</strike> <span>$ {{$row->spl_price}}</span>
							</div><!-- end new_pro_price -->
						</div><!-- end col -->
					
					</div><!-- end row -->
				</div><!-- end new_pro_box -->
				@endforeach
		</div><!-- end col -->
	</div><!-- end row -->

	</div><!-- end container -->
</div><!-- end content_wrapper -->

@endsection
