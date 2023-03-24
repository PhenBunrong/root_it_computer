@extends('layouts.master')


@section('title','User Activity Log')
@section('activity.index' , 'active')

@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')

<section class="content-header">
  <h1>
  <i class="fas fa-database"></i> &nbsp;User Activity Log
    <a class="btn btn-primary btn-sm"><i class="fas fa-database"></i>&nbsp;Show Date</a>
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#CouponModal"><i class="fas fa-plus-circle"></i>&nbsp; Add Data</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User Activity Log</li>
  </ol>
</section>


<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
  <div class="box">
    <div class="box-header">
        <div class="box-body table-responsive">
        <table id="table_dashboard" class="table table-hover table-striped table-bordered">
              <thead>
                <tr class="active">
                  <th width="5%">
                    <a href="#">log_name</a>
                  </th>
                  <th width="10%">
                    <a href="#">email</a>
                  </th>
                  <th width="5%">
                    <a href="#">role_as</a>
                  </th>
                  <th width="5%">
                    <a href="#">modify_user</a>
                  </th>
                  <th width="10%">
                    <a href="#">date_time</a>
                  </th>
                  <th width="1%"><a href="#">action</a></th>
              </thead>
              <tbody>
              @foreach($activity as $row)
              <tr>
                  <td>{{$row->user_name}} {{$row->user_lname}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->role_as}}</td>
                  <td>{{$row->modify_user}}</td>
                  <td>{{$row->date_time}}</td>
                  <td>
                    <div class="button_action" style="text-align:right">
                      <button class="btn btn-xs btn-danger btn-block btn-delete"  data-url="{{ route('activity.destroy', $row)}}" >Delete</button>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                  
                </tfoot>
            </table>
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
    } );
  </script>
@endsection

