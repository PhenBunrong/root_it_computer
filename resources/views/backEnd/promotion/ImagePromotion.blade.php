@extends('layouts.master')


@section('title','Dashboard')
@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')
<section class="content-header">
    <h1>
    <i class="fas fa-database"></i> &nbsp;Add Product Image Attributes
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" class="header_a"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active header_a">Product Image Attributes promotion</li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-xs-6"  data-aos="fade-up" data-aos-duration="3000">
            <!-- general form elements -->
            <div class="box box-info bg-default">
                <div class="box-header with-border">
                <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Add Product Image Promotion</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box">
                    <div class="box-header">
                        <div class="box-body">
                            <form action="{{ url('admin/promotion_image/'. $Viewproducts->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf

                                <input type="hidden" name="product_id" value="{{$Viewproducts->id}}">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <h5>{{$Viewproducts->name}}</h5> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Pincode<span style="color:red;">*</span></label> 
                                    <div class="col-sm-10">
                                        <h5>{{$Viewproducts->pro_code}}</h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Image<span style="color:red;">*</span></label>
                                    <div class="col-sm-10"> 
                                        <div class="custom-file">
                                                <input type="file" class="form-control" name="image[]" id="image" multiple="multiple">
                                                <label class="custom-file-label" for="customFile">Choose file 620 x 400 (Pixels) </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">description<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                    <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{ route('promotion.index') }}" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</a>
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
        <div class="col-xs-6"  data-aos="fade-left" data-aos-duration="3000">
            <!-- general form elements -->
            <div class="box box-info bg-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fas fa-cart-plus"></i> &nbsp;Product Image Attributes</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box">
                    <div class="box-header">
                        <div class="box-body table-responsive">
                            
                            <input type="hidden">
                            <input type="hidden">
                            <table id="table_dashboard" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th width="10%">
                                            <a href="#">Image</a>
                                        </th>
                                        <th width="20%">
                                            <a href="#">Description</a>
                                        </th>
                                        <th width="10%"><a href="#">Action</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($productImages as $row)
                                    <tr>
                                        <td style="text-align:center">
                                            <img src="{{url('uploads/promotion/'.$row->image)}}" alt="" width="100px" height="80px">
                                        </td>
                                        <td>{{ Illuminate\Support\Str::of($row->description)->words(20) }}</td>
                                        <td>
                                            <div class="button_action text-right">
                                                <a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="#"><i class="fa fa-eye"></i></a>
                                                <button class="btn btn-xs btn-warning btn-delete"  data-url="{{url('admin/deletePromotionImage/'.$row->id)}}" ><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                            <div class="col-md-8"></div>
                                <div class="col-md-4">
                            </div>
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