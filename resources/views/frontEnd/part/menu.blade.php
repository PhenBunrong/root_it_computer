<div class="box sidebar-category">
    <div class="box-category-heading"><span class="heading-img"></span><a href="{{url('showAllCategory')}}" style="color:white">All Categories</a></div>
        <div class="box-content">
            <ul id="nav-one" class="dropmenu">
                <?php $category=App\Models\Category::paginate(15); ?>
                @foreach($category as $row)
                    <li id="{{$row->name}}" class="top_level dropdown home_first"><a  href="{{url('showCategory/'.$row->id)}}">{{$row->name}} ({{App\Models\Product::where('category_id',$row->id)->count()}})</a>
                        
                    </li>
                @endforeach
            </ul>
            <!-- class="activSube" សម្រាប់ icon -->
        </div>
    </div>
</div>
<br>
<div class="box">
    <div class="box-heading">
        <a data-toggle="collapse" href="#range" aria-expanded="true" aria-controls="range">    
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        </a>
        Range Price
    </div>
    <div id="range"  class="list-group panel-collapse collapse">  
        <h5 class="list-group-item">Range Price</h5>
        <div class="list-group-item">
            <div id="slider-range"></div>
            <br>
                <b class="pull-left">$<input size="2" type="text" id="amount_start" name="start_price" value="70" style="border:0px;" readonly="readonly"/></b>
                <b class="pull-right">$<input size="2" type="text" id="amount_end" name="end_price" value="150" style="border:0px;" readonly="readonly"/></b>
            <br>
            <br>
            <!-- <button onclick="send()">Click me</button> -->
        </div>
        
	</div>
</div>
<br>
<div class="box">
    <div class="box-heading">
        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">    
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        </a>
        Refine Search
    </div>
    
<?php $brands = DB::table('brands')->where('status','1')->get(); ?>
        <div id="sportswear" class="list-group panel-collapse collapse">  
            <h5 class="list-group-item">BRANDS LIST</h5>
                @foreach($brands as $row)
                        <div id="filter-group4" style="margin:15px">        
                            <div class="checkbox">
                                <label>
                                        <input type="checkbox" id="brandId" class="try" value="{{$row->id}}"/>    
                                        {{ucwords($row->name)}} <span class="text-right">({{App\Models\Product::where('brand_id',$row->id)->count()}})</span>
                                </label>
                            </div>
                        </div>
                @endforeach
                
            <div class="panel-footer text-right">
                <a onclick="send()" class="btn btn-primary">Refine Search</a>
            </div>
        </div>
</div>
<br>
<div class="box">
    <div class="box-heading">
        <a data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="true" aria-controls="multiCollapseExample1">    
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        </a>
        New Products Added
    </div>
    <div id="multiCollapseExample1" class="collapse multi-collapse">  
        <?php $products=DB::table('products')->latest()->paginate(7); ?>
        @foreach($products as $row)
            <div class="new_pro_box">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="new_pro_img">
                        <a href="{{url('productsDetail/'.$row->id)}}" title="{{$row->name}}">
                            <img src="{{asset('uploads/product/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
                            </a>
                        </div><!-- end new_pro_img -->
                    </div><!-- end col -->
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="new_pro_title">
                            <h3><a href="{{url('productsDetail/'.$row->id)}}" title="{{$row->name}}">{{$row->name}}</a></h3>
                        </div><!-- end new_pro_title -->
                        <div class="new_pro_price">
                            <strike>$ {{$row->price}}</strike> <span>$ {{$row->spl_price}}</span>
                        </div><!-- end new_pro_price -->
                    </div><!-- end col -->
                
                </div><!-- end row -->
            </div><!-- end new_pro_box -->
        @endforeach
	</div>
</div>
