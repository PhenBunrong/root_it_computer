@extends('frontEnd.frontEnd')

@section('content')

<a class="trigger_popup_fricc">Click here to show the popup</a>

<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">&times;</div>
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
								<strike>$ {{$data->price}}</strike> <span>$ {{$data->spl_price}}</span>
							</div><!-- end pro_price -->
							<div class="line"></div>
							<ul>
							
									<span style="font-size:14px;">
										<span style="font-family:arial, helvetica, sans-serif;">{!! $data->description !!}</span>
									</span>
								
							</ul>
							<div style="padding-top: 10px; padding-bottom: 15px;">
								<span class='st_sharethis_large' displayText='ShareThis'></span>
								<span class='st_facebook_large' displayText='Facebook'></span>
								<span class='st_twitter_large' displayText='Tweet'></span>
								<span class='st_linkedin_large' displayText='LinkedIn'></span>
								<span class='st_googleplus_large' displayText='Google +'></span>
								<span class='st_email_large' displayText='Email'></span>
							</div><!-- end share -->
							<div class="col-md-3">
								<input type="hidden" class="product_id" value="{{$data->id}}">
								<input type="number" min="1" value="1" max="10" class="qty-input form-control">
							</div>
							<div class="col-md-4 col-6">
								<button class="add-to-cart-btn btn btn-primary btn-block">
									<i class="fa fa-cart-plus"></i> Add to Cart
								</button>
							</div>
							<div class="col-md-4">
								@guest
									<button data-toggle="modal" data-target="#LoginModal" class="btn btn-danger">
										<i class="fas fa-heart"></i> Add to Wishlist
									</button>
								@else
									<button class="add-to-wishlist-btn btn btn-danger btn-block">
										<i class="fas fa-heart" ></i> Add to Wishlist
									</button>
								@endguest
							</div>

						</div><!-- end pro_overview -->
					</div><!-- end col -->
				</div><!-- end row -->
			</div>
		</div><!-- end content -->
    </div>
</div>

@endsection
