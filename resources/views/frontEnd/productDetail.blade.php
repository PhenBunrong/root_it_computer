@extends('frontEnd.frontEnd')

@section('name')
	{{$data->name}}
@endsection

@section('title')
	{{$data->title}}
@endsection

@section('content')

<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
			<?php $brand_name= App\Models\Product::where('id',$id_)->get() ?>
			@foreach($brand_name as $item)
				<li><a href="{{url('showBrand/'.$item->brand_id)}}" title="{{$item->getBrandName()}}">{{$item->getBrandName()}}</a></li>
				<li><a href="#" title="{{$item->getCategoryName()}}">{{$item->getCategoryName()}}</a></li>    
				<li class="active">{{$item->name}}</li>
			@endforeach
        </ol>	
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->


<div class="container">
    <div class="search_widget_sub">
		@include('frontEnd.part.search')
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
							<h1>{{$data->name}}</h1>
							<div class="pro_price" style="text-align: left;">
								<strike>$ {{$data->price}}</strike> <span>$ {{$data->spl_price}}</span><br>
							</div><!-- end pro_price -->
							<div class="line"></div>
							
							<ul>
								<b>
									<li>
										<span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">Available : {{$data->qty}} In Stock<br />
										</span></span>
									</li>
								</b>
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
								<button class="add-to-cart-btn  payment_btn btn-block" name="place_order_btn">
									<i class="fa fa-cart-plus"></i>&nbsp; Add Cart
								</button>
							</div>
							<div class="col-md-4 mycards">
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
							<a href="{{url('productsDetail/'.$item->id)}}" title="{{$item->name}}">
								<img src="{{asset('uploads/product/'.$item->image)}}" alt="{{$item->name}}" class="img-responsive" />
							</a>
							</div><!-- end pro_img -->
							<div class="pro_title">
								<h3 class="ellipis"><a href="{{url('productsDetail/'.$item->id)}}" title="{{$item->name}}">{{$item->name}}</a></h3>
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
