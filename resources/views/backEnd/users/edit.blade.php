@extends('layouts.master')


@section('title','Register User')
@section('Register' , 'active')


@section('content')
<br>
<section class="content-header">
  <h1>
  <i class="fa fa-users"></i>&nbsp;&nbsp; &nbsp;Register User - Edit Role
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboad')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Register User - Edit Role</li>
  </ol>
</section>

<section class="content" data-aos="fade-up" data-aos-duration="3000">
<!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register User - Edit Role</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-users"></i>&nbsp; &nbsp;Register User</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Fist Name</label>
                        <h4>Current Role:
                                @if($user_roles->role_as === 'admin')
                                    <span class="right badge badge-success text-sm">
                                        Admin
                                    </span>
                                @elseif($user_roles->role_as === 'user')
                                    <span class="right badge badge-danger text-sm">
                                        User
                                    </span>
                                @else
                                    <span class="right badge badge-primary text-sm">
                                        Customer
                                    </span>
                                @endif
                        </h4>
                </div>
                <div class="col-md-6">
                    <label for="">Fist Name</label>
                    <h4>isBan Status: 
                        @if($user_roles->isban == '0')
                            <span class="right badge badge-primary text-sm">
                                Not Banned
                            </span>
                        @elseif($user_roles->isban == '1')
                            <span class="right badge badge-danger text-sm">
                                Banned
                            </span>
                        @endif
                    </h4>
                </div>
            </div>
            
            <hr>
            <form action="{{url('admin/role-update/'.$user_roles->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Fist Name</label>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{$user_roles->name}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Last Name</label>
                        <div class="form-group">
                            <input type="text" name="lname" class="form-control" value="{{$user_roles->lname}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" value="{{$user_roles->email}}">
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <label for="">OLd Password</label>
                        <div class="form-group">
                            <input type="password" name="old_password" class="form-control" placeholder="Enter OLd Password" />
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <label for="">Password</label>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <label for="">Confirm Password</label>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Role As</label>
                        <div class="form-group">
                            <select name="role_as" class="form-control">
                                <option value="">---Select Role---</option>
                                <option value="admin" {{ old('role_as', $user_roles->role_as) === 'admin' ? 'selected' : ''}}>Admin</option>
                                <option value="user" {{ old('role_as', $user_roles->role_as) === 'user' ? 'selected' : ''}}>User</option>
                                <option value="">Customer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">isBan</label>
                        <div class="form-group">
                            <select name="isban" class="form-control">
                                <option value="">---Select Ban and Un-Ban---</option>
                                <option value="0" {{ old('isban', $user_roles->isban) === 0 ? 'selected' : ''}}>Un-Ban</option>
                                <option value="1" {{ old('isban', $user_roles->isban) === 1 ? 'selected' : ''}}>Ban-Now</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Mobie Phone</label>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" value="{{$user_roles->phone}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Country</label>
                        <div class="form-group">
                            <input type="text" name="country" class="form-control" value="{{$user_roles->country}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Address 1</label>
                        <div class="form-group">
                            <input type="text" name="address1" class="form-control" value="{{$user_roles->address1}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Address 2</label>
                        <div class="form-group">
                            <input type="text" name="address2" class="form-control" value="{{$user_roles->address2}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">City</label>
                        <div class="form-group">
                            <input type="text" name="city" class="form-control" value="{{$user_roles->city}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">State</label>
                        <div class="form-group">
                            <input type="text" name="state" class="form-control" value="{{$user_roles->state}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Postcode / ZIP:</label>
                        <div class="form-group">
                            <input type="text" name="pincode" class="form-control" value="{{$user_roles->pincode}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="avatar">Photo</label><br>
                                
                                <img src="#" id="avatar" alt="" width='150' height='150'><br>
                                <input type="file" name="avatar" class="form-control" accept="avatar/*" class="upload" onchange="readURL(this);">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
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