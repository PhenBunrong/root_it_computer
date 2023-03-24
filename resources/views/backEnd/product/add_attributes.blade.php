@extends('layouts.master')


@section('title','Dashboard')
@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')
<section class="content-header">
    <h1>
        <i class="fas fa-database"></i> &nbsp;Product Attributes
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" class="header_a"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active header_a">Product Attributes</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-6" data-aos="fade-up" data-aos-duration="3000">
            <!-- general form elements -->
            <div class="box box-info bg-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Product Attributes</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box">
                    <div class="box-header">
                        <div class="box-body">
                            <form action="{{ url('admin/add_attributes/'.$products->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <h5>{{$products->name}}</h5> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Pincode<span style="color:red;">*</span></label> 
                                    <div class="col-sm-10">
                                        <h5>{{$products->pro_code}}</h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Option<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="field_wrapper">
                                            <div style="display:flex;">
                                                <input type="text"  name="pro_info[]" id="pro_info" placeholder="Detail Option Product" class="form-control"/>
                                                <a href="javascript:void(0);" class="add_button btn btn-sm btn-primary " title="Add field" style="width:80px">Add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="box-footer">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a href="{{ route('product.index') }}" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</a>
                                        <!-- <button type="submit" class="btn btn-success">Save & Add More</button> -->
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div><!-- /.box-footer -->

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6" data-aos="fade-left" data-aos-duration="3000">
        <div class="box box-info bg-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Product Attributes</h3>
                </div><!-- /.box-header -->
                <div class="box">
                    <div class="box-header">
                        <div class="box-body table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                
                                    <thead>
                                        <tr class="active">
                                            <th width="20%"> Name </th>
                                            <th width="60%">Detail Option</th>
                                            <th width="20%"  style="text-align:right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products['attributes'] as $row)
                                        <tr>
                                <form action="{{url('admin/edit_Attribute/'.$products->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                            <input type="hidden" name="attr[]" value="{{$row->id}}">
                                            <td>{{Illuminate\Support\Str::of($row->getProductName())->Limit(20)}}</td>
                                            <td><input type="text" class="form-control" name="pro_info[]" value="{{$row->pro_info}}"></td>
                                            <td>
                                                <div class="btn-group" style="display:block">
                                                    <input type="submit" value="update" class="btn btn-success btn-update" style="padding-top:4; width: 60%;">
                                </form>
                                                    <button style="width:40%;"  class="btn btn-warning btn-delete"  data-url="{{ url('admin/deleteAttribute/'.$row->id)}}" ><i class="fa fa-trash"></i></button>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Detail Option</th>
                                        <th> ----</th>
                                    </tr>
                                    </tfoot>
                            
                            </table>
                        </div>  
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
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
