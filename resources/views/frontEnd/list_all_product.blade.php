@extends('frontEnd.frontEnd')

@section('content')
<style>
	.event_box{
		margin-left: 0px;
		margin-right: 0px;
		-webkit-box-shadow: 0px 2px 10px 0px rgba(50, 50, 50, 0.3);
        -moz-box-shadow:    0px 2px 10px 0px rgba(50, 50, 50, 0.3);
    	box-shadow:         0px 2px 10px 0px rgba(50, 50, 50, 0.3);
	}
	.event_title{
		position: relative;
	}
	.event_title h3 a{
		font-size: 14px;
	}
    .breadcrumb_cus{
		text-align: left;
		padding-top: 10px;
		padding-bottom: 0px !important;
	}
	.breadcrumb{
		margin-bottom: 0px;
	}
</style>

<div class="breadcrumb_cus">
    <div class="container">
    <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
            <li class="active">All Product Brands</li>
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
            <div class="row">
                @foreach($brands_list as $row)
                <div class="col-md-3 col-sm-4">
                    <div class="event_box">
                        <a href="{{url('showBrand/'.$row->id)}}" title="{{$row->name}}">
                            <img src="{{asset('uploads/brand/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
                        </a>
                        <div class="event_title">
                            <?php $brands_count = App\Models\Product::brandCount($row->id); ?>
                            <h3>
                                <a href="{{url('showBrand/'.$row->id)}}" title="{{$row->name}}">{{$row->name}}
                                 ( @if(isset($brands_count))
                                        {{$brands_count}}
                                    @else
                                        0
                                    @endif )
                                <i class="fa fa-plus-circle"></i></a>
                            </h3>
                        </div><!-- end event_title -->
                    </div><!-- end event_box -->
                </div><!-- end item -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end content -->
    </div><!-- end container -->
</div><!-- end content_wrapper -->
@endsection
