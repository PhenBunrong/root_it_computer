@extends('frontEnd.frontEnd')

@section('content')
@include('frontEnd.part.modal')
<div class="breadcrumb_cus">
    <div class="container">
    <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
			<?php $brand_name= App\Models\Brand::where('id',$id_)->get() ?>
			@foreach($brand_name as $item)
                <?php $brands_count = App\Models\Product::brandCount($item->id); ?>
                <li><a href="{{url('showAllbrand')}}" title="Brand">Brand</a></li>
				<li><a href="{{url('showBrand/'.$item->id)}}" title="{{$item->name}}">{{$item->name}} ({{$brands_count}})</a></li>
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
        <div class="row">
        @forelse($brand_product as $row)
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
                                    <a  href="{{url('productsDetail/'.$row->id)}}">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div><!-- end col -->
            @empty
            <div class="content">
                <p align="center">Didn't find what you were looking for?</p>
                <div class="search-button">
                    <a href="/">Find Other Products <i class="fa fa-search"></i></a>
                </div><!-- end search-button -->
            </div>
        @endforelse
        </div><!-- end row -->

        <div style="clear:both;padding-top:20px;text-align:center;">
            <div class="pagination">{{$brand_product->render()}}</div>
        </div>

    </div><!-- end container -->
</div><!-- end content_wrapper -->
@endsection
