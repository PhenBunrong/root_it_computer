@extends('layouts.master')


@section('title','Register User')
@section('Register' , 'active')

@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')
<script>
    $(document).ready(function() {

      $(".ProductStatus").change(function()
        {
          var id = $(this).attr('rel');

          if($(this).prop("checked")==true)
          {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url: '/admin/update-user-isban',
                data: {isban:'0',id:id},

                success:function(data) {
                    $("#message_success").show();
                },
                error:function()
                {
                  alert("Error");
                }

            });
          }
          else 
          {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url: '/admin/update-user-isban',
                data: {isban:'1',id:id},

                success: function (response) {

                    $("#message_error").show();
                    
                },error:function(){
                  alert("Error");
                }

            });
          }
        });
    });
</script>
<section class="content-header">
  <div id="message_success" style="display:none;">Ban Enabled</div>
  <div id="message_error" style="display:none;">Ban Disabled</div>
</section>

<section class="content-header">
  <h1>
    <i class="fas fa-database"></i> &nbsp;Register User
    <a href="{{ route('user.userCreate') }}" class="btn btn-success btn-sm" ><i class="fas fa-plus-circle"></i>&nbsp; Add Data</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Register User</li>
  </ol>
</section>

<section class="content-header">
    <div class="box">
                <label style="font-size:25px" class="mp-2">Register User</label>
                <h4 class="pull-right" style="font-size:22px; padding-right: 20px;">
                    @php $u_total = "0"; @endphp
                    @foreach($users as $row)
                        @php
                            if($row->isUserOnline())
                            {
                                $u_total = $u_total + 1;
                            }
                        @endphp
                    @endforeach
                    Total User Online : {{ $u_total }}
                </h4>
    </div>
</section>

<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
    <div class="box">
    <div class="box-header">
        <div class="box-body">
            
            <table id="table_dashboard" class="table table-hover table-striped table-bordered">
                <thead>
                <tr class="active">
                    <th width="4%">
                        <a href="#">ID</a>
                    </th>
                    <th width="10%">
                        <a href="#">Name</a>
                    </th>
                    <th width="16%">
                        <a href="#">Email</a>
                    </th>
                    <th width="10%">
                        <a href="#">Online/Offline</a>
                    </th>
                    <th width="10%">
                        <a href="#">Role_As</a>
                    </th>
                    <th width="10%">
                        <a href="#">isBan/unBan</a>
                    </th>
                    <th width="10%" style="text-align:right"><a href="#">Action</a></th>
                </tr>
                </thead>
                <tbody>
                    <?php $countRole =1; ?>
                    @foreach($users as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->getUserName()}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                @if($row->isUserOnline())
                                    <span class="right badge badge-success">
                                        Online
                                    </span>
                                @else
                                    <span class="right badge badge-warning">
                                        Offline
                                    </span>
                                @endif
                            </td>
                            <td>
                                
                                <input type="hidden" value="{{$row->id}}" id="userId<?php echo $countRole;?>">
                                <select name="role" id="role<?php echo $countRole;?>" class="form-control">
                                    <option value="">Customer</option>
                                    <option value="admin" {{ old('role_as', $row->role_as) === 'admin' ? 'selected' : ''}} > Admin</option>
                                    <option value="user" {{ old('role_as', $row->role_as) === 'user' ? 'selected' : ''}} > User </option>
                                    
                                </select>
                                <div id="successMsg<?php echo $countRole;?>" class="text-success"></div>
                                <!-- @if($row->role_as === 'admin')
                                    <span class="right badge badge-success">
                                        Admin
                                    </span>
                                @elseif($row->role_as === 'vendor')
                                    <span class="right badge badge-danger">
                                        Vendor
                                    </span>
                                @else
                                    <span class="right badge badge-primary">
                                        Default
                                    </span>
                                @endif -->
                            </td>
                            <td>
                                <input type="checkbox" class="ProductStatus" rel="{{$row->id}}"
                                    data-toggle="toggle" data-on="Un-Ban" data-off="Ban-Now" data-onstyle="success" data-offstyle="danger"
                                    @if($row['isban']=="0") checked @endif />
                               <!--  @if($row->isban == '0')
                                    <span class="right badge badge-primary">
                                        Not Banned
                                    </span>
                                @elseif($row->isban == '1')
                                    <span class="right badge badge-danger">
                                        Banned
                                    </span>
                                @endif -->
                            </td>
                            <td style="text-align:right">
                                <a href="{{ url('admin/role-edit/'.$row->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger btn-delete"  data-url="{{ url('admin/role-destroy/'.$row->id)}}">Delete</button>
                            </td>
                        </tr>
                        
                        <?php $countRole++; ?>
                    @endforeach
                    
                </tbody>
                <tfoot>
          
                </tfoot>
            </table>
        </div>
        </div>
    <div>
    </div>    
</section>


@endsection


@section('js')
 <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
 <script>
    $(document).ready(function(){
      $(document).on('click', '.btn-delete' , function(){
          $this = $(this);
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger',
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "Do you really want to delete this product?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No',
              reverseButtons: true
            }).then((result) => {
            if (result.value) {
              $.post($this.data('url'), {_method:'DELETE', _token: '{{ csrf_token() }}'}, function (res){
                $this.closest('tr').fadeOut(500, function() {
                  $(this).remove();
                })
              })
            } 
          })
      })
    })
 </script>
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      $('#table_dashboard').DataTable();


    <?php for($i=1; $i<15; $i++) {?>
        $('#successMsg<?php echo $i;?>').hide();
      $('#role<?php echo $i;?>').change(function(){

        var role_val<?php echo $i;?> = $('#role<?php echo $i;?>').val();
        var userId<?php echo $i;?> = $('#userId<?php echo $i;?>').val();

        $.ajax({
            type: 'GET',
            url: '/admin/updateRole',
            data: 'userID='+ userId<?php echo $i;?> + '&role_val=' + role_val<?php echo $i;?>,
            success: function(response) {
                console.log(response);
                $('#successMsg<?php echo $i;?>').show();
                $('#successMsg<?php echo $i;?>').html(response);
            },
        });
      });

    <?php }?>
    });
    
  </script>
@endsection