@extends('frontEnd.frontEnd')

@section('content')
<style type="text/css">
	.event_box{
		margin-left: 0px;
		margin-right: 0px;
	}
	.breadcrumb_cus{
		text-align: left;
		padding-top: 10px;
		padding-bottom: 0px !important;
	}
	.breadcrumb{
		margin-bottom: 0px;
	}
    strong {
        color: #333;
    }
</style>

<div class="hidden-xs" id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin:0 auto;">
    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
        <ul class="amazingslider-slides" style="display:none;">
        </ul>
    </div>
</div>

<div class="visible-xs" id="amazingslider-wrapper-1">
    <div class="amazingslider-3">
        <ul class="amazingslider-slides" style="display:none;">
        </ul>
    </div>
</div>

</div><!-- end slideshow_wrapper -->
<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.html" title="ROOT IT Support">Home</a></li>       
            <li class="active">About Us</li>
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
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><strong>ROOT IT Support </strong>was established in 2008 as the Information Technology company with the aim to provide trusted, high quality, genuine products and the healthy with friendly IT support outsource also customer consultancy in Phnom Penh Cambodia.</span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><br />
            </span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">Our slogan is &ldquo;<strong>Your Healthy IT Environment</strong>&ldquo;. We focused on transparent IT Services for private customers and businesses in and around Phnom Penh for reasonable prices. We care about your personal needs and wishes.</span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><br />
            </span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">We are committed to providing computer genuine products &amp; IT support from small to medium businesses. If you need any help with your computer workstation, personal laptop or your office network hooked up, we are here for you always.</span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><br />
            </span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><strong>Vision</strong></span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">To provide trusted, high-quality IT outsourcing and consultancy services to customers while building up disadvantaged young people through high-level IT training in Cambodia.</span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><br />
            </span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><strong>Mission</strong></span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">We enhance our clients&rsquo; business by providing innovative and cost-effective technology solutions, specialist advice, and IT consulting so they can focus on things do best.</span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><br />
            </span></span></div>
        <div>
            <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;"><strong>Company OverView</strong></span></span></div>
        <ul>
            <li>
                <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">Dynamic and professional staff.</span></span></li>
            <li>
                <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">Quality and trustworthy services at good price.</span></span></li>
            <li>
                <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">We provide private standard rule installation.</span></span></li>
            <li>
                <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">Customer documents privacy.</span></span></li>
            <li>
                <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">We listening and understand what our client needs.</span></span></li>
            <li>
                <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">Give advisors the correct ways of using information systems.</span></span></li>
            <li>
                <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">Time punctuality and keep informed.</span></span></li>
            <li>
                <span style="font-size:14px;"><span style="font-family:arial, helvetica, sans-serif;">Educate young and motivated Cambodians.</span></span></li>
        </ul>
        <div class="row mgr-top-20 hidden">

        <div class="col-md-4 col-sm-4 mgr-top-20">
        <img src="userfiles/about-us-1.jpg" alt="About Us" class="img-responsive" />
        </div><!-- end col -->

        <div class="col-md-4 col-sm-4 mgr-top-20">
        <img src="userfiles/access_door_control(2).jpg" alt="About Us" class="img-responsive" />
        </div><!-- end col -->

        <div class="col-md-4 col-sm-4 mgr-top-20">
        <img src="userfiles/about-us-3.jpg" alt="About Us" class="img-responsive" />
        </div><!-- end col -->



        </div><!-- end row -->
        </div><!-- end content -->
            
            
        <h2 align="center">Our Services</h2>
            
        <div class="row">
            <?php $events=DB::table('events')->latest()->paginate(6); ?>
            @foreach($events as $row)
                <div class="col-md-4 col-sm-4">
                    <div class="event_box">
                        <a href="{{url('eventsDetail/'.$row->id)}}" title="{{$row->name}}">
                            <img src="{{asset('uploads/events/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
                        </a>
                        <div class="event_title">
                            <h3><a href="{{url('eventsDetail/'.$row->id)}}" title="{{$row->name}}">{{$row->name}}<i class="fa fa-calendar-o" aria-hidden="true"></i></a></h3>
                        </div><!-- end event_title -->
                    </div><!-- end event_box -->
                </div><!-- end item -->
            @endforeach
        </div><!-- end row -->
            
    </div><!-- end container -->
</div><!-- end content_wrapper -->


@endsection

