@extends('frontEnd.frontEnd')

@section('content')

<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
			<?php $brand_name= App\Models\Solution::where('id',$id_)->get() ?>
			@foreach($brand_name as $item)
				<li><a href="{{url('showAllSolutions')}}" title="Solutions">Solutions</a></li>    
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

        <div class="row">
            <div class="col-md-6">
                <div id="amazingslider-offer" style="display:block;position:relative;margin-top:0px;margin-bottom:120px;">
                    <ul class="amazingslider-slides">
                        @foreach($imageSolution as $id=>$attImage)
                            <li class="{{$id==0 ? 'active' : ''}}"><img src="{{asset('uploads/products/'.$attImage->image)}}" alt="{{($attImage->name)}}"/></li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
                    <ul class="amazingslider-thumbnails">
                        @foreach($imageSolution as $id=>$attImage)
                            <li class="{{$id==0 ? 'active' : ''}}"><img src="{{asset('uploads/products/'.$attImage->image)}}" alt="{{($attImage->name)}}"/></li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
                </div><!-- end amazingslider-offer -->
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="pro_overview">
                    <h1>{{($solutionData->name)}}</h1>
                    <p><i style="margin-right: 6px;" class="fa fa-calendar"></i>{{($solutionData->created_at->format('d/m/Y'))}}</p>
                <div class="line"></div>
                <ul>
                    <span style="font-family:arial, helvetica, sans-serif;">{!! $solutionData->description !!}</span>
                </ul>
                <div style="padding-top: 10px; padding-bottom: 15px;">
                    <span class='st_sharethis_large' displayText='ShareThis'></span>
                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_googleplus_large' displayText='Google +'></span>
                    <span class='st_email_large' displayText='Email'></span>
                </div><!-- end share -->

                </div><!-- end pro_overview -->
            </div><!-- end col -->
        </div><!-- end row -->

        <h2 class="h2-cus">View Other Events</h2>

        <div class="row mgr-top-20">
            @foreach($relatedSolution as $row)
                <div class="col-md-4 col-sm-4">
                    <div class="event_box">
                        <a href="{{url('solutionsDetail/'.$row->id)}}" title="{{($row->name)}}">
                            <img src="{{asset('uploads/solution/'.$row->image)}}" alt="{{($row->name)}}" class="img-responsive" />
                        </a>
                        <div class="event_title">
                            <h3><a href="{{url('solutionsDetail/'.$row->id)}}" title="{{($row->name)}}">{{($row->name)}}<i class="fa fa-calendar-o" aria-hidden="true"></i></a></h3>
                        </div><!-- end event_title -->
                    </div><!-- end event_box -->
                </div><!-- end col -->
            @endforeach
        </div><!-- end row -->

        </div><!-- end content -->
    </div><!-- end container -->
</div><!-- end content_wrapper -->

@endsection

