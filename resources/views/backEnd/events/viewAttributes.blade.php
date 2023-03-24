@extends('layouts.master')


@section('title','Dashboard')

@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')
<section class="content-header">
    <h1>
        <i class="fas fa-database"></i> &nbsp;Add Events
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" class="header_a"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active header_a">Events Image Attributes</li>
    </ol>
</section>

<section class="content">
    <div class="row">
            <div class="col-xs-6"  data-aos="fade-up" data-aos-duration="3000">
                <div class="box box-info bg-default">
                    <div class="box-header with-border">
                    <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Add Product</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box">
                        <div class="box-header">
                        
                            <form action="{{ url('admin/eventsImageAtrr/'.$events->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf

                                <input type="hidden" name="event_id" value="{{$events->id}}">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <h5>{{$events->name}}</h5> 
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
                                <div class="form-group">
                                    <label for="status" class="col-sm-2 control-label">status<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <select type="text" name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                            <option value="1" {{ old('status') === 1 ? 'selected' : ''}} >Active</option>
                                            <option value="0" {{ old('status') === 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">description<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{ route('events.index') }}" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</a>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div><!-- /.box-footer -->

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6" data-aos="fade-left" data-aos-duration="3000">
                <div class="box box-info bg-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fas fa-cart-plus"></i> &nbsp;Image Attributes</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box">
                        <div class="box-header">
                            <div class="box-body table-responsive no-padding">
                                <table id="table_dashboard" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <th width="10%">
                                                <a href="#">Image</a>
                                            </th>
                                            <th width="20%">
                                                <a href="#">Description</a>
                                            </th>
                                            <th width="10%">
                                                <a href="#">Status</a>
                                            </th>
                                            <th width="10%" style="text-align:right"><a href="#">Action</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productImages as $row)
                                            <tr>
                                                <td>
                                                <center><img src="{{url('uploads/events/'.$row->image)}}" alt="$row->name" width="80px" height="70px"></center>
                                                </td>
                                                <td>{{$row->description}}</td>
                                                <td>
                                                    <span class="right badge badge-{{ $row->status ? 'success' : 'danger'}} text-sm">
                                                        {{$row->status ? 'Active' : 'Inactive'}}
                                                    </span>    
                                                </td>
                                                <td>
                                                    <div class="button_action" style="text-align:right">
                                                        <a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="#"><i class="fa fa-eye"></i></a>
                                                        <button class="btn btn-xs btn-warning btn-delete"  data-url="{{url('admin/deleteeventsImageAtrr/'.$row->id)}}" ><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            <tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>---</th>
                                            <th>---</th>
                                            <th>---</th>
                                            <th>---</th>
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