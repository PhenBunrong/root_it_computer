@extends('frontEnd.frontEnd')

@section('content')

<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
            <li class="active">IT Services</li>
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
                @foreach($service as $row)
                    <div class="col-md-4 col-sm-4">
                        <div class="event_box">
                            <a href="{{url('serviceDetail/'.$row->id)}}" title="{{$row->name}}">
                                <img src="{{asset('uploads/service/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
                            </a>
                            <div class="event_title">
                                <h3><a href="{{url('serviceDetail/'.$row->id)}}" title="{{$row->name}}">{{$row->name}}<i class="fa fa-plus-square-o"></i></a></h3>
                            </div><!-- end event_title -->
                        </div><!-- end event_box -->
                    </div><!-- end item -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end content -->
    </div><!-- end container -->
</div><!-- end content_wrapper -->

@endsection


