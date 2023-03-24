@extends('layouts.master')

@section('content')
<style>
	.main-body {
			padding: 15px;
		}
	.box {
		position: relative;
		display: flex;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 0 solid transparent;
		border-radius: .25rem;
		margin-bottom: 1.5rem;
		box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
	}
	input[type=file] {
    display: block;
}

button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

	.me-2 {
		margin-right: .5rem!important;
	}
	.box-body {
		-ms-flex: 1 1 auto;
		flex: 1 1 auto;
		min-height: 1px;
		padding: 3rem;
	}
</style>

<section class="content-header">
  <h1>
  <i class="fas fa-user"></i> &nbsp;User Profile
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User Profile</li>
  </ol>
</section>


<div class="main-body">
	<!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
	<div class="row">
	<form action="{{ url('admin/profileUpdate/'.$profile->id)}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="col-lg-4">
			<div class="box">
				<div class="box-body">
					<div class="d-flex flex-column align-items-center text-center">
							<img src="{{asset('uploads/avatars')}}/{{ auth()->user()->avatar}}" class="img-circle" alt="User Image" width="150">
						<div class="mt-3">
							<h3 style="text-transform: capitalize">{{ $profile->role_as}}</h3>
                            <h4>{{ $profile->getUserName()}}</h4>
							<input type="file" name="avatar">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="box">
				<div class="box-body">
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">First Name</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="first_name" type="text" name="first_name" placeholder="first name"  value="{{ $profile->name }}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">Last Name</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="last_name" type="text" name="last_name" placeholder="last name"  value="{{ $profile->lname }}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">Phone Number</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="phone" type="text" name="phone" placeholder="phone"  value="{{ $profile->phone }}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">City Name</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="city" type="text" name="city" placeholder="city name"  value="{{ $profile->city }}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">Address1</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="address1" type="text" name="address1" placeholder="address1"  value="{{ $profile->address1 }}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">Address2</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="address2" type="text" name="address2" placeholder="address2"  value="{{ $profile->address2 }}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">State Name</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="state" type="text" name="state" placeholder="state name"  value="{{ $profile->state }}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">Postcode / ZIP:</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="pincode" type="text" name="pincode" placeholder="pincode" value="{{ $profile->pincode }}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">Country</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<select name="country" class="form-control">
										<option value="{{ $profile->country }}" selected="selected">Select country</option>
										<option value="United States">United States</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="UK">UK</option>
										<option value="India">India</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Ucrane">Ucrane</option>
										<option value="Canada">Canada</option>
										<option value="Dubai">Dubai</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h5 class="mb-0">Email</h5>
								</div>
								<div class="col-sm-9 text-secondary">
									<input id="email" type="text" name="email" placeholder="email"  value="{{ $profile->email }}" class="form-control">
								</div>
							</div>
						</div>

						<hr class="mb-4">
						<div class="row">
							<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
						</div>
						
				</div>
			</div>
		</div>
	
	</form>
	</div>
</div>
@endsection

