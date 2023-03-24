@extends('layouts.master')


@section('title','Dashboard')

@section('content')
<section class="content-header">
    <h1>
        <i class="fas fa-cart-plus"></i> &nbsp;Add Product
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" class="header_a"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active header_a">Product Image Attributes</li>
    </ol>
</section>


    <section class="content" data-aos="fade-up" data-aos-duration="3000">
        <div class="row">
            <!-- left column -->
                <div class="col-xs-2">
                </div>
                <div class="col-xs-8">
                <!-- general form elements -->
                <div class="box box-info bg-default">
                    <div class="box-header with-border">
                    <h3 class="box-title"><i class="fas fa-cart-plus"></i> &nbsp;Add Product</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <div class="box">
                        <div class="box-header">
                        
                            <form action="{{ url('admin/solutionImageAtrr/'.$Solution->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf

                                <input type="hidden" name="solution_id" value="{{$Solution->id}}">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <h5>{{$Solution->name}}</h5> 
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
                                    <a href="{{ route('solution.index') }}" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</a>
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



@endsection
