@extends('layouts.master')


@section('title','Register User')
@section('Register' , 'active')


@section('content')
<br>
<section class="content-header">
  <h1>
  <i class="fa fa-users"></i>&nbsp;&nbsp; &nbsp;Register User
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboad')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Register User</li>
  </ol>
</section>

<section class="content" data-aos="fade-up" data-aos-duration="3000">
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register User</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-users"></i>&nbsp; &nbsp;Register User</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('user.userStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Fist Name</label>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Last Name</label>
                        <div class="form-group">
                            <input type="text" name="lname" class="form-control" required value="{{old('lname')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" required value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Role As</label>
                        <div class="form-group">
                            <select type="text" name="role_as" class="form-control" required id="role_as">
                                <option value="customer">Customer</option>
                                <option value="admin" {{ old('role_as') === 'admin' ? 'selected' : ''}} >Admin</option>
                                <option value="user" {{ old('role_as') === 'user' ? 'selected' : ''}}>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="" >Password</label>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" required  placeholder="Enter Password" />
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 ">
                        <label for="" >Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required  placeholder="Confirm Password" />
                    </div>
           
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Mobie Phone</label>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" required value="{{old('phone')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Country</label>
                        <div class="form-group">
                            <input type="text" name="country" class="form-control"  value="{{old('country')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Address 1</label>
                        <div class="form-group">
                            <input type="text" name="address1" class="form-control"  value="{{old('address1')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Address 2</label>
                        <div class="form-group">
                            <input type="text" name="address2" class="form-control"  value="{{old('address2')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">City</label>
                        <div class="form-group">
                            <input type="text" name="city" class="form-control"  value="{{old('city')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">State</label>
                        <div class="form-group">
                            <input type="text" name="state" class="form-control"  value="{{old('state')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Country</label>
                        <div class="form-group">
                            <input type="text" name="country" class="form-control"  value="{{old('country')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Postcode / ZIP:</label>
                        <div class="form-group">
                            <input type="text" name="pincode" class="form-control"  value="{{old('pincode')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="avatar">Photo</label><br>
                                
                                <img src="#" id="avatar" alt="" width='150' height='150'><br>
                                <input type="file" name="avatar" class="form-control" accept="avatar/*" class="upload"  onchange="readURL(this);">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    <!-- /.box-body -->
    </div>
</section>



@endsection


@section('scripts')

    <script>

        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#avatar')
                        .attr('src',e.target.result)
                        .width(150)
                        .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection