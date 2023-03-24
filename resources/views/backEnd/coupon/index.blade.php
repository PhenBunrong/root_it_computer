@extends('layouts.master')


@section('title', 'Coupon')
@section('coupon.index' , 'active')

@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')
<section class="content-header">
  <h1>
  <i class="fas fa-database"></i> &nbsp;Coupon Code Page 
    <a class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a>
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#CouponModal"><i class="fas fa-plus-circle"></i>&nbsp; Add Data</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Coupon</li>
  </ol>
</section>


<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
  <div class="box">
    <div class="box-header">
        <div class="box-body table-responsive">
            <table id="table_dashboard" class="table table-hover table-striped table-bordered">
              <thead>
                <tr class="active">
                  <th width="3%">
                    <a href="#">ID</a>
                  </th>
                  <th width="20%">
                    <a href="#">Offer</a>
                  </th>
                  <th width="10%">
                    <a href="#">Coupon Code</a>
                  </th>
                  <th width="10%">
                    <a href="#">Expiry Datetime</a>
                  </th>
                  <th width="6%">
                    <a href="#">Status</a>
                  </th>
                  <th width="10%" style="text-align:right"><a href="#">Action</a></th>
              </thead>
              <tbody>
              @foreach($coupon as $row)
              <tr>
                  <td>{{$row->id}}</td>
                  <td>{{Illuminate\Support\Str::of($row->offer_name)->Limit(50)}}</td>
                  <td>{{$row->coupon_code}}</td>
                  <td>{{$row->end_datetime}}</td>
                  <td>
                    @if($row->status == "1")
                      <label class="badge badge-danger ">Inactive</label>
                    @else
                      <label class="badge badge-success">Active</label>
                    @endif
                  </td>
                  <td style="text-align:right">
                      <a href="{{ route('coupon.edit', $row)}}" class="btn btn-sm btn-primary">Edit</a>
                      <button class="btn btn-sm btn-danger btn-delete"  data-url="{{ route('coupon.destroy', $row)}}">Delete</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>---</th>
                  <th>---</th>
                  <th>---</th>
                  <th>---</th>
                  <th>---</th>
                  <th>---</th>
                </tr>
              </tfoot>
            </table>
      </div>
    <div>
  </div>    
</section>

<!-- Modal -->
<div class="modal fade" id="CouponModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Coupon Code Page</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="span">&times;</span>
        </button>
      </div>
      <form action="{{route('coupon.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="modal-body">
          <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Offer Name</label>
                        <input type="text" name="offer_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Products (option)</label>
                        <select name="product_id" class="form-control" id="select2_products">
                            <option value="">Select Products</option>
                            @foreach($product as $row)
                            <option value="{{$row->id}}">{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Coupon Code</label>
                        <input type="text" name="coupon_code" readonly class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Coupon Limit</label>
                        <input type="number" name="coupon_limit" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Coupon Type</label>
                        <select name="coupon_type" class="form-control">
                            <option value="">Select your  Coupon Type</option>
                            <option value="1">Percentage</option>
                            <option value="2">Amount</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Coupon Price</label>
                        <input type="text" name="coupon_price" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Start Date Time</label>
                        <input type="datetime-local" name="start_datetime" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">End Date Time</label>
                        <input type="datetime-local" name="end_datetime" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Status</label><br>
                        <input type="checkbox" name="status" /> (0=Active , 1=blocked)
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Visibility Status</label><br>
                        <input type="checkbox" name="visibility_status" /> (0=Show , 1=Hide)
                    </div>
                </div>
            </div>
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


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

