@extends('frontEnd.frontEnd')

@section('content')
<div class="breadcrumb_cus">
    <div class="container">
    <ol class="breadcrumb">
            <li><a href="/" title="ROOT IT Support">Home</a></li>
			<?php $brand_name= App\Models\Brand::where('id',$id_)->get() ?>
			@foreach($brand_name as $item)
				<li><a href="{{url('showBrand/'.$item->id)}}" title="{{$item->name}}">{{$item->name}}</a></li>
			@endforeach
        </ol>	
    </div><!-- end container -->
</div><!-- end breadcrumb_cus -->


<div class="container">
    <div class="search_widget_sub">
        @include('frontEnd.part.search')
    </div><!-- end search_widget_sub -->
</div><!-- end container -->


<div class="content_wrapper">
    <div class="container">
        <div class="row">
            <div class="w3-card-4" style="width:70%">
                <header class="w3-container w3-light-grey">
                    <h3>John Doe</h3>
                </header>
                <div class="w3-container">
                    <p>1 new friend request</p>
                <hr>
                <img src="img_avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                    <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
                </div>
                    <button class="w3-button w3-block w3-dark-grey">+ Connect</button>
                </div>
            </div>
        </div><!-- end row -->

    </div><!-- end container -->
</div><!-- end content_wrapper -->
@endsection
