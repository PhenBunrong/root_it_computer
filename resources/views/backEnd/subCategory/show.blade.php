@extends('layouts.master')


@section('content')
    <div>
        <section class="content-header">
            <h1>
                <!--Now you can define $page_icon alongside $page_tite for custom forms to follow CRUDBooster theme style -->
                <i class="fa fa-image"></i> Detail ProductAds &nbsp;&nbsp;
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">ProductAds</li>
            </ol>
        </section>

        <!-- Main content -->
        <section id="content_section" class="content">
            <div>
                <p><a title="Return" href="{{route('product.index')}}"><i class="fa fa-chevron-circle-left "></i>
                            &nbsp; Back To List Data ProductAds</a></p>
                        
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong><i class="fa fa-image"></i> Detail ProductAds</strong>
                    </div>

                    <div class="panel-body" style="padding:20px 0px 0px 0px">
                        <div class="box-body" id="parent-form-area">
                            <div class="table-responsive">
                                <table id="table-detail" class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$data->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Image</td>
                                            <td>
                                                <a target="_blank" href="{{asset('uploads/subCategory/'.$data->image)}}"><img style="max-width:150px" title="Image For Image" src="{{asset('uploads/subCategory/'.$data->image)}}"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>{{$data->getCategoryName()}}</td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>{{$data->title}}</td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td>{!! $data->description !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer" style="background: #F5F5F5">
                            <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class="col-sm-10">
                            </div>
                            </div>
                        </div><!-- /.box-footer-->
                    </div>
                </div>
            </div><!--END AUTO MARGIN-->
        </section><!-- /.content -->
    </div>
@endsection