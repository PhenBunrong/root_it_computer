@extends('layouts.master')


@section('title','Dashboard')
@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')
<section class="content-header">
    <h1>
        <i class="fas fa-database"></i> &nbsp;Add Product
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" class="header_a"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active header_a">Product Image Attributes</li>
    </ol>
</section>


<section class="content">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Create Image Attributes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Table Image Attributes</a>
        </li>
        </li>
    </ul><!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <section class="content">
                <div class="row">
                    <!-- left column -->
                        <div class="col-xs-2">
                        </div>
                        <div class="col-xs-8">
                        <!-- general form elements -->
                        <div class="box box-info bg-default">
                            <div class="box-header with-border">
                            <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Add Product</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <div class="box">
                                <div class="box-header">
                                
                                    <form action="{{ url('admin/view_attributes/'. $Viewproducts->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{$Viewproducts->id}}">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
                                            <div class="col-sm-10">
                                                <h5>{{$Viewproducts->name}}</h5> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Code<span style="color:red;">*</span></label> 
                                            <div class="col-sm-10">
                                                <h5>{{$Viewproducts->pro_code}}</h5>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Image<span style="color:red;">*</span></label>
                                            <div class="col-sm-10"> 
                                                <div class="custom-file">
                                                        <input type="file" class="form-control" name="image[]" id="image" multiple="multiple">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</button>
                                                <!-- <button type="submit" class="btn btn-success">Save & Add More</button> -->
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </div><!-- /.box-footer -->

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-xs-3">
                        </div>
                    </div>
                    <!-- /.row -->
            </section>
        </div>
        <div class="tab-pane" id="tabs-2" role="tabpanel">
        
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-xs-12">
                        <!-- general form elements -->
                        <div class="box box-info bg-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Product Attributes</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <div class="box">
                                <div class="box-header">
                                    <div class="box-body table-responsive no-padding">
                                        
                                        <input type="hidden">
                                        <input type="hidden">
                                        <table id="table_dashboard" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr class="active">
                                            <th width="3%"><input type="checkbox" id="checkall"></th>
                                            <th width="60px" hieght="50px">
                                                <a href="#">ID &nbsp; <i class="fa fa-sort"></i></a>
                                            </th>
                                            <th width="60px" hieght="50px">
                                                <a href="#">Name &nbsp; <i class="fa fa-sort"></i></a>
                                            </th>
                                            <th width="60px" hieght="50px">
                                                <a href="#">Image &nbsp; <i class="fa fa-sort"></i></a>
                                            </th>
                                            <th width="30px" hieght="50px" style="text-align:right"><a href="#">Action &nbsp; <i class="fa fa-sort"></i></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($productImages as $row)
                                        <tr>
                                            <td><input type="checkbox" class="checkbox" name="checkbox[]" value="4"></td>
                                            <td height="50px" width="60px" >{{$row->id}}</td>
                                            <td height="50px" width="80px">{{$row->getProductName()}}</td>
                                            <td height="50px" width="80px">
                                                <img src="{{url('uploads/products/'.$row->image)}}" alt="" width="60px" height="70px">
                                            </td>
                                            <td height="50px" width="30px">
                                                    <div class="button_action" style="text-align:right">
                                                        <button class="btn btn-xs btn-warning btn-delete"  data-url="{{url('admin/deleteAttributeImage/'.$row->id)}}" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                            </td>
                                            <tr>
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
            </section>
        </div>
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