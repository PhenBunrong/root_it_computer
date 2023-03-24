@extends('frontEnd.frontEnd')

@section('content')
<style type="text/css">
	.breadcrumb_cus {
		width: 100%;
		height: auto;
		background: #033772;
		text-align: center;
	}
</style>
<div class="breadcrumb_cus">
    <div class="container">
        <h2>Promotion</h2>
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
            <li class="active">Promotion</li>
        </ol>	
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->


<div class="container">
    <div class="search_widget_sub">
        <form name="search" action="{{ route('search') }}" method="GET">
            <div class="row wrap-search-form">
                <div class="col-md-10 col-sm-9">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
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
            @foreach($promotion_list as $row)
                <div class="row well">
                    <div class="col-md-6 col-sm-7">
                        <div class="hot_deal_inner">
                            <h2>{{$row->name}}</h2>
                            <p>{{$row->title}}</p>
                            <div class="hot_deal_button">
                                <a href="{{url('productsPromotionDetail/'.$row->id)}}" title="{{$row->name}}">See Detail <i class="fa fa-chevron-right"></i></a>
                            </div><!-- end hot_deal_button -->
                        </div><!-- end hot_deal_inner -->
                    </div><!-- end col -->
                    <div class="col-md-6 col-sm-5">
                        <img src="{{asset('uploads/promotion/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
                    </div><!-- end col -->
                </div><!-- end row -->
            @endforeach
        </div><!-- end content -->
    </div><!-- end container -->
</div><!-- end content_wrapper -->
@endsection
