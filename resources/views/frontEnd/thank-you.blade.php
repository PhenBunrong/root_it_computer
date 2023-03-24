@extends('frontEnd.frontEnd')

@section('content')
<div class="breadcrumb_cus">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
            <li><a href="" title="Product Brand">Thank You</a></li>
        </ol>
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->

<div class="content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-5 text-center">
                <div class="buttons clearfix">
                    <h1>Thank You For Shopping.</h1>
                    @if(session('status'))
                        <h3>{{ session('status') }}</h3>
                    @endif

                    <hr>
                    <a href="/" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection