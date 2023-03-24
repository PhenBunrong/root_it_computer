@extends('layouts.master')


@section('title','List Customer')
@section('customer.index' , 'active')

@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')

<section class="content-header">
  <h1>
  <i class="fas fa-database"></i> &nbsp;Customer
    <a class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a>
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#CouponModal"><i class="fas fa-plus-circle"></i>&nbsp; Add Data</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Customer</li>
  </ol>
</section>


<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
  <div class="box">
    <div class="box-header">
        <div class="box-body table-responsive">
        <table id="table_dashboard" class="table table-hover table-striped table-bordered">
              <thead>
                <tr class="active">
                  <th width="10%">
                    <a href="#">avatars</a>
                  </th>
                  <th width="10%">
                    <a href="#">name</a>
                  </th>
                  <th width="20%">
                    <a href="#">email</a>
                  </th>
                  <th width="8%">
                    <a href="#">phone</a>
                  </th>
                  <th width="8%">
                    <a href="#">address1</a>
                  </th>
                  <th width="8%">
                    <a href="#">address2</a>
                  </th>
                  <th width="8%">
                    <a href="#">city</a>
                  </th>
                  <th width="8%">
                    <a href="#">state</a>
                  </th>
                  <th width="8%">
                    <a href="#">country</a>
                  </th>
                  <th width="8%">
                    <a href="#">pincode</a>
                  </th>
              </thead>
              <tbody>
              @foreach($customer as $row)
              <tr>
                  <td><center><img src="{{asset('uploads/avatars')}}/{{$row->avatar}}" height="50px " width="50px" alt=""></center></td>
                  <td>{{$row->name}} {{$row->lname}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->phone}}</td>
                  <td>{{$row->address1}}</td>
                  <td>{{$row->address2}}</td>
                  <td>{{$row->city}}</td>
                  <td>{{$row->state}}</td>
                  <td>{{$row->country}}</td>
                  <td>{{$row->pincode}}</td>
                </tr>
              @endforeach
              </tbody>
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

