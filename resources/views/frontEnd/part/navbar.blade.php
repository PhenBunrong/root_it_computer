<header class="header_wrapper">
	<div class="container-fluid">
		<div class="row hidden-xs hidden-sm">
			<div class="logo_cus">
				<a href="/" title="ROOT IT Support">
					<img src="{{asset('public/image/root-logo11.png')}}" alt="ROOT IT Support" />
				</a>
			</div><!-- end logo_cus -->

			<div class="main hidden-xs hidden-sm">
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu">
							<li>
								<a href="#">Products</a>
								<ul class="cbp-hssubmenu">
									<li><a href="{{url('showAllbrand')}}" title="All Product"><h5>All Brands</h5></a></li>
									<?php $brands=DB::table('brands')->get(); ?>
									@foreach($brands as $row)
										<li><a href="{{url('showBrand/'.$row->id)}}" title=""><img src="{{asset('uploads/brand/'.$row->image)}}" alt="{{$row->name}}"/></a></li>
									@endforeach
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Services</a>
									<ul class="dropdown-menu">
									<?php $brands=DB::table('services')->get(); ?>
									@foreach($brands as $row)
										<li><a href="{{url('serviceDetail/'.$row->id)}}" title="">{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</a></li>
									@endforeach
									</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Solutions</a>
								<ul class="dropdown-menu">
									<?php $brands=DB::table('solutions')->get(); ?>
									@foreach($brands as $row)
										<li><a href="{{url('solutionsDetail/'.$row->id)}}" title="">{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</a></li>
									@endforeach
								</ul>
							</li>
							<li>
								<a href="{{url('showPromotion')}}">Promotions</a>
							</li>
							<li><a href="{{url('about-us/')}}" title="About Us">About Us</a></li>
							<li><a href="{{url('contact-us/')}}" title="Contact Us">Contact Us</a></li>
							<li style="text-align: left;">
								<div class="nav__icons">
									<a href="{{url('user/wishlist')}}" class="icon__item">
										<i class="fas fa-heart" style="font-size:2rem"></i>
										<span class="wishlist-item-count" id="cart__total">
										<span class="countWishlist">0</span>
										</span>
									</a>
								</div>
							</li>
							<li style="text-align: left;">
								<div class="nav__icons">
									<a href="{{route('cart')}}" class="icon__item">
										<i class="fa fa-shopping-cart" style="font-size:2rem"></i>
										<span class="basket-item-count" id="cart__total">
										<span class="count">0</span>
										</span>
									</a>
								</div>
							</li>
							
							<?php if(Auth::check()) { ?>
								<li class="dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="Dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Profile
									</a>
									<ul class="dropdown-menu">
										<li><a href="">{{Auth::user()->name}}</a></li>
										<li>
											<a href="{{ route('logout') }}"
												onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">
												{{ __('Logout') }}
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
												@csrf
											</form>
										</li>
										<li><a href="{{url('/profile')}}">Profile</a></li>
									</div>
								</li>
							<?php }else{ ?>
								<li class="dropdown">
									<i class="fas fa-user" style="font-size:2rem"></i>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="{{url('/login')}}" >Login</a></li>
										@if (Route::has('register'))
											<li class="nav-item">
												<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
											</li>
										@endif
									</ul>
								</li>
								
								
							<?php } ?>
						</ul>
					</div>
				</nav> 
			</div>
		</div><!-- end row  data-toggle="modal" data-target="#LoginModal"  {{url('/login')}}  id="Dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"-->

		<div class="row visible-xs visible-sm">
			<div class="col-xs-8">
				<div class="logo_cus">
					<a href="/" title="ROOT IT Support">
						<img src="{{asset('public/image/root-logo11.png')}}" alt="ROOT IT Support" />
					</a>
				</div><!-- end logo_cus -->
			</div><!-- end col -->
			<div class="col-xs-1">
				<div class="cart_cus">
					<a href="{{url('user/wishlist')}}" class="icon__item">
						<i class="fas fa-heart" style="font-size:2rem"></i>
						<span class="wishlist-item-count" id="cart__total">
							<span class="countWishlist">0</span>
						</span>
					</a>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="cart_cus">
					<a href="{{route('cart')}}" class="icon__item">
						<i class="fa fa-shopping-cart"></i>
						<span class="basket-item-count" id="cart__total">
							<span class="count">0</span>
						</span>
					</a>
				</div>
				<div class="navbar-header" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<button class="navbar-toggle collapsed" type="button" ><i class="fas fa-bars"></i></button>
				</div>
			</div><!-- end col -->
		</div><!-- end row -->

		<div class="nav-wrapper visible-xs visible-sm">
			<div class="navbar navbar-inverse" role="banner">
				<div class="navbar-header hidden-xs hidden-sm" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
			<div class="hidden-lg hidden-md"><span class="navbar-brand">MENU</span></div> 
		</div>

		<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Products</a>
					<ul class="dropdown-menu">
						<?php $brands=DB::table('brands')->get(); ?>
						@foreach($brands as $row)
							<li><a href="{{url('showBrand/'.$row->id)}}" title="">{{$row->name}}</a></li>
						@endforeach
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Services</a>
					<ul class="dropdown-menu">
							<?php $brands=DB::table('services')->get(); ?>
							@foreach($brands as $row)
								<li><a href="{{url('serviceDetail/'.$row->id)}}" title="">{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</a></li>
							@endforeach
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Solotions</a>
					<ul class="dropdown-menu">
							<?php $brands=DB::table('solutions')->get(); ?>
							@foreach($brands as $row)
								<li><a href="{{url('solutionsDetail/'.$row->id)}}" title="">{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</a></li>
							@endforeach
					</ul>
				</li>
				<li>
					<a href="{{url('showPromotion')}}">Promotions</a>
				</li>
				<li><a href="{{url('about-us/')}}" title="About Us">About Us</a></li>
				<li><a href="{{url('contact-us/')}}" title="Contact Us">Contact Us</a></li>
				<?php if(Auth::check()) { ?>
					<li class="dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="Dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Profile
						</a>
						<ul class="dropdown-menu">
							<li><a href="">{{Auth::user()->name}}</a></li>
							<li>
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</li>
							<li><a href="{{url('/profile')}}">Profile</a></li>
						</div>
					</li>
				<?php }else{ ?>
					<li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
					@endif
				<?php } ?>
			</ul>
		</nav>
	</div><!-- end container -->
</header>


<!-- Modal -->
<!-- <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-headere">
        <h3 class="modal-title" id="exampleModalLabel">Login</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="span">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  		<form method="POST" action="{{ route('login') }}">
				@csrf

				<div class="form-group">
					<label for="email">{{ __('E-Mail Address') }}</label>
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</div>

				<div class="form-group">
					<label for="password">{{ __('Password') }}</label>

						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</div>

				<div class="form-group row">
					<div class="col-md-6 offset-md-4">
						<div class="form-check">
							<input class=" " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

							<label class="form-check-label" for="remember">
								{{ __('Remember Me') }}
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-8 offset-md-4">
						<button type="submit" class="btn btn-primary">
							{{ __('Login') }}
						</button>

						@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
						@endif
					</div>
				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->