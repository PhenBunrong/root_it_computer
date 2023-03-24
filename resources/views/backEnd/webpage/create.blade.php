@extends('layouts.master')


@section('title','Webpage')
@section('webpage.create' , 'active')

@section('content')
<section class="content-header">
    <h1>
        <i class="fas fa-database"></i> &nbsp;Add Webpage
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Webpage</li>
    </ol>
</section>


<section class="content" data-aos="fade-up" data-aos-duration="3000">
        <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-info bg-default">
                <div class="box-header with-border">
                <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Add Webpage</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box">
                    <div class="box-header">
                        <form action="{{ route('webpage.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="category_id" class="col-sm-2 control-label">Category<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                        <select type="text" name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                                            @foreach($categories as $id=> $row)
                                                <option value="{{$id}}">{{$row}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="status" class="col-sm-2 control-label">Status<span style="color:red;">*</span></label>
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
                                    <label for="title" class="col-sm-2 control-label">Title<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                            <textarea name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title">{{ old('title') }}</textarea>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">Description<span style="color:red;">*</span></label>
                                    <div class="col-sm-10">
                                            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="description">{{ old('description') }}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>


                            <div class="box-footer">
                                <div class="col-sm-offset-2 col-sm-10">
                                <a href="{{ route('webpage.index') }}" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</a>
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
        <!-- /.row -->
</section>

@endsection

