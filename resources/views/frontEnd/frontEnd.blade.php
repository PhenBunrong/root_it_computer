
<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="google-site-verification" content="XRHeheYN2UCdVgISMHfJ06GbecxPnAEeOBUQpxgUW-M" />

	
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="robots" content="index, follow" />
	<title>@yield('name') | Phnom Penh, Cambodia</title>
	<meta name="keywords" content="@yield('name')">
	<meta name="description" content="@yield('title')">
	
	<link rel="shortcut icon" href="{{asset('favicon.ico')}}">
	<link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/css/fontawesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/animate.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/nav.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/nav-desk.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/owl.theme.css')}}"> 
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/custom.css')}}" />
	<!-- <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}" /> -->
	

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!--alertifyjs  CSS -->
	<link rel="stylesheet" href="{{asset('css/alertify.min.css')}}"/>

	
	<script src="https://kit.fontawesome.com/23412c6a8d.js"></script>

</head>
<body class="demo-1">
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
	</script>

<div class="header_top">
	<div class="container-fluid">
		<div class="tel_top">
			<ul>
				<li><a href="tel:017925629"><i class="fa fa-phone-square"></i><span>+855 17 925 629</span></a></li>
				<li class="hidden-xs"><a><i class="fa fa-clock-o"></i><span>8:00 AM - 5:00 PM</span></a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div><!-- end container -->
</div><!-- end header_top cbp-hsmenubg -->

  @include('frontEnd.part.navbar')

  @yield('content')

<footer class="footer_wrapper">
<div class="container">
<div class="row">
<div class="col-md-3 col-sm-6 sm_cus">

<h2>COMPANY</h2>
<ul>
<li><a href="{{url('about-us/')}}" title="About Us">About Us</a></li>
<li><a href="{{url('showAllbrand')}}" title="Hot Deal">Product Brands</a></li>
<li><a href="{{url('showPromotion')}}" title="Hot Deal">Promotions</a></li>
<li><a href="{{url('showAllService')}}" title="Services">Services</a></li>
<li><a href="{{url('showAllSolutions')}}" title="Solutions">Solutions</a></li>
<li><a href="{{url('showAllEvents')}}" title="Project Portfolio">Project Portfolio</a></li>
<li><a href="{{url('showCareers')}}" title="Careers">Careers</a></li>
<li><a href="{{url('contact-us/')}}" title="Contact Us">Contact Us</a></li>
</ul>

</div><!-- end col -->

<div class="col-md-3 col-sm-6 sm_cus">
	<h2>OUR SERVICES</h2>
	<ul>
		<?php $brands=DB::table('services')->where('status','1')->latest()->paginate(5); ?>
		@foreach($brands as $row)
			<li><a href="{{url('serviceDetail/'.$row->id)}}" title="">{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</a></li>
		@endforeach
		<?php $brands=DB::table('solutions')->where('status','1')->latest()->paginate(4); ?>
		@foreach($brands as $row)
			<li><a href="{{url('solutionsDetail/'.$row->id)}}" title="">{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</a></li>
		@endforeach
	</ul>
</div><!-- end col -->

<div class="col-md-3 col-sm-6 sm_cus">
	<h2>PRODUCTS</h2>
	<ul>
		<?php $Cateogry =DB::table('categories')->where('status','1')->paginate(7); ?>
        @foreach($Cateogry as $item)
			<li><a href="{{url('showCategory/'.$item->id)}}" title="{{$item->name}}">{{$item->name}}</a></li>
		@endforeach
			<li><a href="{{url('showAllCategory')}}" title="All Categories">All Categories</a></li>
	</ul>
</div><!-- end col -->

<div class="col-md-3 col-sm-6 sm_cus">
<h2>FIND US ON</h2>

<div class="social">

<ul>
<li><a href="https://www.facebook.com/rootitsupport" title="ROOT IT Support - Join us on facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="https://twitter.com/rootitsupport" title="ROOT IT Support - Follow us on Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
<li><a href="https://www.instagram.com/rootitsupport" title="ROOT IT Support - Follow us on Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
<li><a href="https://www.linkedin.com/company/root-it-support" title="ROOT IT Support - Join us on Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
</ul>
<div class="clear"></div>
</div><!-- end social -->

<div class="facbook_likepage">
	<div class="fb-like" data-href="https://www.facebook.com/rootitsupport/" data-width="200" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
</div><!-- end facebook_likepage -->

</div><!-- end col -->

</div><!-- end row -->
</div><!-- end container -->




<div class="copyright">
	<p>© 2008 - 2020 ROOT IT Support. All Rights Reserved.</p>
</div>

</footer>

<!-- 	<script src="{{asset('public/js/jquery-1.12.4.js')}}"></script> 
    <script src="{{asset('public/js/jquery.min.js')}}"></script>      -->
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/slider/amazingslider.js')}}"></script>
    <script src="{{asset('public/slider/initslider-1.js')}}"></script>
    <script src="{{asset('public/sliderphone/initslider-1.js')}}"></script>
    <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/js/modernizr.custom.js')}}"></script>
    <script src="{{asset('public/js/cbpHorizontalSlideOutMenu.min.js')}}"></script>
	<script src="{{asset('js/custom.js')}}"></script>
    <script>
        var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
    </script>
    <script type="text/javascript">
        document.documentElement.style.overflowX = 'hidden';
    </script>
    <script type="text/javascript">
		$(document).ready(function(){
			
			var owl = $("#owl-demo");
		
			owl.owlCarousel({
			autoPlay : 6000,
			pagination : false,
			items : 2, //10 items above 1000px browser width
			itemsDesktop : [1000,2], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,2], // betweem 900px and 601px
			itemsTablet: [700,1], //2 items between 600 and 0
			});
			
			// Custom Navigation Events
			$(".next-cus").click(function(){
			owl.trigger('owl.next');
			})
			
			$(".prev-cus").click(function(){
			owl.trigger('owl.prev');
			})
			
			if ($(window).width()>768) {
				
				$('li.dropdown').hover(function() {
				$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
				}, function() {
				$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
				});
			}

		});
			
		$(window).scroll(function() {
			
				var scroll = $(this).scrollTop();
				if(scroll >= 50){
					$('.header_wrapper').css("position","fixed");
					$('.header_wrapper').css("top","0px");
					$('.header_wrapper').css("z-index",999);
					$('.logo_cus').css("top","0px");
					$('.header_wrapper').addClass('header_shadow');
					$('.header_wrapper').addClass('animated fadeInDown');
				}
				else if(scroll < 50){
					//$('.logo_cus').css("top","44px");
					$('.header_wrapper').css("position","relative");
					$('.header_wrapper').removeClass('header_shadow');
					$('.header_wrapper').removeClass('animated fadeInDown');
				}// end if

		});
			
	</script><!-- Global site tag (gtag.js) - Google Analytics -->
	<script src="{{asset('public/slideroffers/amazingslider.js')}}"></script>
	<script src="{{asset('public/slideroffers/initslider-1.js')}}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-40618972-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-40618972-2');
</script>

<script type="text/javascript" src="{{asset('public/js/scrolltop.js')}}"></script> 
<!-- <script type="text/javascript" src="{{asset('dist/js/jquery.dataTables.min.js')}}"></script>  -->

<!-- JavaScript  alertify -->
<script src="{{asset('js/alertify.min.js')}}"></script>

<script>
	@error('email')
		$('#LoginModal').modal('show');
	@enderror
	@if(session('status'))
		alertify.set('notifier','position','top-right');
		alertify.success("{{session('status')}}");
	@endif
</script>

@yield('script')
@yield('scripts')


</body>

<script>
	// Add Cart
	$(document).ready(function () {
		<?php $products=DB::table('products')->get(); ?>
		@foreach($products as $row)
		$('#addCart{{$row->id}}').click(function () {

			var product_id = $(this).closest('.product_data').find('#addCart{{$row->id}}').val();
			var quantity = $(this).closest('.product_data').find('.qty-input').val();
			/* alert(quantity); */
			$.ajax({
				url: "/addItem",
				method: "POST",
				data: {
					'quantity': quantity,
					'product_id': product_id,
				},
				success: function (response) {
					
					$('#addCart{{$row->id}}').hide();
					$('#successMsg{{$row->id}}').show();
					$('#successMsg{{$row->id}}').append('added to cart');
					alertify.set('notifier','position','top-right');
					alertify.success(response.status);
					cartload();
				},
			});
		});
		@endforeach
	});


	// Add Cart
	$(document).ready(function () {
		<?php $products=DB::table('products')->get(); ?>
		@foreach($products as $row)
		$('#Cart{{$row->id}}').click(function () {

			var product_id = $(this).closest('.product_data').find('#Cart{{$row->id}}').val();
			var quantity = $(this).closest('.product_data').find('.qty-input').val();
			/* alert(quantity); */
			$.ajax({
				url: "/addItem",
				method: "POST",
				data: {
					'quantity': quantity,
					'product_id': product_id,
				},
				success: function (response) {
					
					$('#Cart{{$row->id}}').hide();
					$('#successMsge{{$row->id}}').show();
					$('#successMsge{{$row->id}}').append('product has been added to cart');
					alertify.set('notifier','position','top-right');
					alertify.success(response.status);
					cartload();
				},
			});
		});
		@endforeach
	});

	// Add Cart
	$(document).ready(function () {
		<?php $products=DB::table('products')->get(); ?>
		@foreach($products as $row)
		$('#CartTo{{$row->id}}').click(function () {

			var product_id = $(this).closest('.product_data').find('#CartTo{{$row->id}}').val();
			var quantity = $(this).closest('.product_data').find('.qty-input').val();
			/* alert(quantity); */
			$.ajax({
				url: "/addItem",
				method: "POST",
				data: {
					'quantity': quantity,
					'product_id': product_id,
				},
				success: function (response) {
					
					$('#CartTo{{$row->id}}').hide();
					$('#successMsge{{$row->id}}').show();
					$('#successMsges{{$row->id}}').append('product has been added to cart');
					alertify.set('notifier','position','top-right');
					alertify.success(response.status);
					cartload();
				},
			});
		});
		@endforeach
	});
</script>


</html>
