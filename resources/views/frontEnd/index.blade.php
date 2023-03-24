@extends('frontEnd.frontEnd')

@section('content')


<script>
    // Rang Price
        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 1500,
            values: [ 75, 500 ],
                slide: function( event, ui ) {
                    $( "#amount_start" ).val( ui.values[ 0 ] );
                    $( "#amount_end" ).val( ui.values[ 1 ] );

                    var start = $('#amount_start').val();
                    var end = $('#amount_end').val();

                    $.ajax({
                        type: "get", 
                        url:'',
                        data: "start=" + start + "& end=" + end,
                        success: function (response) {
                            /* console.log(response); */
                            $('#updateDiv').html(response);
                        }
                    });
                }

            });
            
        });
</script>

<style>
    .list-group-item {
        box-shadow: none;
    }

    .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 0;
    }
    .list-group{
        border: 1px solid #ddd;
    }
    .panel-footer {
        background-color: #fff;
        border-top: none;
    }
    .btn-primary, #cart .text-right .addtocart, #cart .text-right .checkout, .btn-default, #button-cart, .button.aboutus, .btn-info {
        background: none repeat scroll 0 0 #fdb913;
        border: medium none;
        color: #ffffff;
        display: inline-block;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 12px;
        text-transform: uppercase;
        border-radius: 0;
        line-height: normal;
    }
    .btn-primary:hover {
        color: #fff;
        background-color: black !important;
        border-color: black;
    }
    /*     .form-control {
        display: block;
        width: 100%;
        height: auto;
        padding: 7px 12px;
        font-size: 14px;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #eee;
        border-radius: 0;
        box-shadow: none;
    } */

    /*     .space{
        padding-left:35px;
    } */


    /*Megnor category */
    ul.dropmenu{
        display: block;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        margin: 0;
        padding: 1px 0 0;
        position: relative;
        z-index: 9;
    }
    .dropmenu li{
        position: relative;
        list-style: none;
        margin: 0px;
        display: block;
        cursor: pointer;
        padding-bottom: 1px;
    }
    .dropmenu li:hover{	
        /*background-color:#f5f5f5;*/
    }
    .dropmenu li a{
        
        display: block;
        cursor: pointer;
        text-decoration: none;
        font-weight: bold;
        -moz-border-radius-bottomleft: 5px;
        -moz-border-radius-bottomright: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
    }
    .dropmenu li a:hover{
    }
    .dropmenu li span{
        display: block;
        float: right;
        height: 10px;
        width: 6px;
        position: absolute;
        top: 18px;
        right: 10px;
    }
    .dropmenu li:hover ul, .dropmenu li:hover div{
        display: block;
    }
    .dropmenu ul, .dropmenu div{
        position: absolute;
        display: none;
        width: 197px;
        left: 182px;
        top: 0px;
        margin: 0px;
        padding: 0px;
    }
    .dropmenu li div ul{
        border: none;
        background: none;
        position: relative;
        display: block;
        left: 0px;
    }
    .dropmenu ul li{
        border: 1px solid #e4e4e4;
        float: none;
    }

    .dropmenu div ul{
        position: relative;
        display: block;
    }
    .dropmenu li div{
        background-color: #cccccc;
        padding: 5px;
        display: none;
        position: absolute;
    }
    .dropmenu .submenu {background-color: #e4e4e4;}


    .box .box-content ul , #content .content ul { 
        padding:0px;
        margin:0px;
        list-style:none;
    }
    .box .box-content ul li{

    }
    .box .box-content ul li:last-child a ,.box .box-content ul li ul li a{   border-bottom:0 none;}
    .box .box-content ul li a{ border-bottom: 1px solid #e3e3e3;}

    #content .content ul li {
        line-height:22px;
        padding:5px;
    }
    .box .box-content ul li ul li + li{border-top:medium none;}
    .box .box-content ul li a , #content .content ul li a{
        color: #696969;
        font-family: "Istok Web",sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 9px 0 9px 30px;
        position: relative;
    }
    .box .box-content ul li a + a , .box .box-content ul li a + a:hover{ background:none; padding-left:0; }
    .box .box-content ul li a:hover , #content .content ul li a:hover{
        color:#fdb913;
    }

    .box .box-content ul ul{
        background: none repeat scroll 0 0 #f5f5f5;
        margin-left:33%;
        width: 100%;
        z-index: 99;
        border-left:0 none;
    }
    .box .box-content ul li ul li a {
        padding: 8px 0 8px 10px;
    }
    .box.sidebar-category .box-content ul li ul li a.activSub::before {
        right: 3px;
        top: 10px;
    }
    .box.sidebar-category .box-content ul li { padding: 0 0 0 0;}

    .box .box-content ul li ul li a.activSub:before, .box .box-content ul li a.activSub:before {
        content:"\f105";
        font-family:'FontAwesome';
        position: absolute;
        right:6px;
        font-size:13px;
        color:#aba9a9;
    }

    .sidebar-category .box-content {
        background-color: #efefef;
        border: none;
        min-height: 456px;
    }

    .box .box-content ul ul li ul {display:none; margin-left:21px;}

    .box .box-content ul ul li:hover ul {
        display: block;
        top: -1px;
        left: 225px;
    }

    .box .box-content {
        color: #696969;
        font-family: "Istok Web",sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 9px 0 9px 20px;
        position: relative;
        padding: auto 10px;
    }

    .box .sidebar-category{
        margin-top:10px;
    }

    .product_box{
        height: auto;
    }

    .box .box-content ul li ul li a {
        padding: 8px 0 8px 10px;
    }
    
    /*category icon*/
    #Server{
        background: url('https://www.goldonecomputer.com/image/catalog/WIfi-20x20.png') center left no-repeat;
    }
    #Accessories{
        background: url('https://www.goldonecomputer.com/image/catalog/Accessories-20x20.png')center left no-repeat no-repeat;
    }
    #UPS{
        background: url('https://www.goldonecomputer.com/image/catalog/Battery-20x20.png')center left no-repeat no-repeat;
    }
    #GamingGear{
        background: url('https://www.goldonecomputer.com/image/catalog/Gaming-20x20.png')center left no-repeat no-repeat;
    }
    #PCComponents{
        background: url('https://www.goldonecomputer.com/image/catalog/Components-20x20.png')center left no-repeat no-repeat;
    }
    #SmartPhoneandTablets{
        background: url('https://www.goldonecomputer.com/image/catalog/Smartphone-20x20.png')center left no-repeat no-repeat;
    }
    #DigitalStorage{
        background: url('https://www.goldonecomputer.com/image/catalog/SDCard-20x20.png')center left no-repeat no-repeat;
    }
    #Monitor{
        background: url('https://www.goldonecomputer.com/image/catalog/Monitors-20x20.png')center left no-repeat no-repeat;
    }
    #Desktop{
        background: url('https://www.goldonecomputer.com/image/catalog/Desktop_1-20x20.png')center left no-repeat no-repeat;
    }
    #LaptopSqareParts{
        background: url('https://www.goldonecomputer.com/image/catalog/SparePar-20x20.png')center left no-repeat no-repeat;
    }
    #Laptop{
        background: url('https://www.goldonecomputer.com/image/catalog/Laptop-20x20.png')center left no-repeat no-repeat;
    }
    #AudioDevice{
        background: url('https://www.goldonecomputer.com/image/catalog/Headset-20x20.png')center left no-repeat no-repeat;
    }
    #PrinterandScanner{
        background: url('https://www.goldonecomputer.com/image/catalog/Printer-20x20.png')center left no-repeat no-repeat;
    }
    #SecuritySafety{
        background: url('https://www.goldonecomputer.com/image/catalog/Fingerprint-20x20.png')center left no-repeat no-repeat;
    }
    #Projector{
        background: url('https://www.goldonecomputer.com/image/catalog/icons8-projector-20.png')center left no-repeat no-repeat;
    }
    #Software{
        background: url('https://www.goldonecomputer.com/image/catalog/icons8-software-20.png')center left no-repeat no-repeat;
    }
    /*     .product_new{
        padding-left:35px;
    } */


    @media (min-width: 768px){
        #column-right {
            float: right;
        }
    }
    .ui-slider-horizontal .ui-slider-range {
        background: #f6a828 ;
    }

    /*     .product_wrapper h2 {
        background: #22a7cc;
    }
 */
    .btn_search {
        background: #f6a828;
    }
    .btn_search:hover {
        background: #22a7cc;
    }

</style>
<!-- Modal -->
@include('frontEnd.part.modal')
    <div class="slideshow_wrapper">
        <div class="hidden-xs" id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin:0 auto;">
            <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                <ul class="amazingslider-slides" style="display:none;">
                <?php $banner=DB::table('banners')->latest()->paginate(5); ?>
                @foreach($banner as $row)
                    <li><img src="{{asset('uploads/banner/'.$row->image)}}" alt="{{$row->name}}"  class="img-responsive"/></li>
                @endforeach
                </ul>
            </div>
        </div>

        <div class="visible-xs" id="amazingslider-wrapper-1">
            <div class="amazingslider-3">
                <ul class="amazingslider-slides" style="display:none;">
                <?php $banner=DB::table('banners')->latest()->paginate(5); ?>
                @foreach($banner as $row)
                    <li><img src="{{asset('uploads/banner/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive"/></li>
                @endforeach
                </ul>
            </div>
        </div>

        <div class="search_widget">
            <div class="container">
                @include('frontEnd.part.search')
            </div><!-- end container -->
        </div><!-- end search_widget -->
    </div><!-- end slideshow_wrapper -->

    <div class="hot_deal">	
        <div class="container">
            <div class="row">
                    <?php $promotions=DB::table('promotions')->latest()->paginate(1); ?>
                    @foreach($promotions as $row)
                    <div class="col-md-6 col-sm-7">
                        <div class="hot_deal_inner">
                            <h1>{{$row->name}}</h1>
                            <p style="color: white;">{{ $row->title }}</p>
                            <div class="hot_deal_button">
                                <a href="{{url('productsDetail/'.$row->id)}}" title="{{$row->name}}">See Detail <i class="fa fa-chevron-right"></i></a>
                            </div><!-- end hot_deal_button -->
                        </div><!-- end hot_deal_inner -->
                    </div><!-- end col -->
                    <div class="col-md-6 col-sm-5">
                        <img src="{{asset('uploads/promotion/'.$row->image)}}" alt="{{$row->name}}"  class="img-responsive"/>
                    </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end hot_deal -->

    <div id="account-edit" class="container-flu">
        <div class="row">
            <div class="box">
                <div id="column-right" class="col-md-9">
                    <div id="updateDiv">

                        @if($products->isEmpty())
                               <h3> Sorry, Products not Found!</h3>
                        @else   
                            
                            @foreach($products as $item)
                                <?php $countP=0;?>
                                    <div class="product_wrapper">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="product_inner">
                                                    <h2>{{$item->name}}</h2>
                                                    <div class="row">
                                                        <div class="pro_space">
                                                        <?php $product = App\Models\Product::productShow($item->product_id); ?>
                                                            @foreach($product as $row)
                                                                <div class="col-md-3 col-sm-4">
                                                                    <div class="product product_data">
                                                                        <div class="pro_img">
                                                                            <img src="{{asset('uploads/product/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
                                                                        </div><!-- end pro_img -->
                                                                        <div class="product__footer">
                                                                            <div class="pro_title">
                                                                                <h3 class="ellipis"><a href="{{url('productsDetail/'.$row->id)}}" title="{{$row->name}}">{{$row->name}}</a></h3>
                                                                            </div><!-- end pro_title -->
                                                                            <div class="pro_price">
                                                                                    <h4><strike>$ {{$row->price}}</strike> <span>$ {{$row->spl_price}}</span></h4>
                                                                                    <input type="hidden" class="product_id" value="{{$row->id}}">
                                                                                    <input type="hidden" min="1" value="1" max="10" class="qty-input forme-control">
                                                                                    <button type="button" class="product__btn" id="addCart{{$row->id}}" value="{{$row->id}}">Add To Cart</button>
                                                                                    <p id="successMsg{{$row->id}}" class="alert alert-success" style="display:none;"> </p>
                                                                            </div>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="" class="view_btn">
                                                                                        <i class="fas fa-eye"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                <input type="hidden" class="product_id" value="$row->id">
                                                                                @guest
                                                                                    <a href="{{url('/login')}}">
                                                                                        <i class="fas fa-heart"></i>
                                                                                    </a>
                                                                                @else
                                                                                    <a class="add-to-wishlist-btn">
                                                                                        <i class="fas fa-heart" ></i>
                                                                                    </a>
                                                                                @endguest
                                                                                </li>
                                                                                <li>
                                                                                    <a href="{{url('productsDetail/'.$row->id)}}">
                                                                                        <i class="fas fa-list"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- end col -->
                                                            @endforeach
                                                        </div><!-- end pro_space -->
                                                    </div><!-- end row -->
                                                </div><!-- end product_inner -->
                                            </div><!-- end row -->
                                        </div><!-- end container -->
                                    </div><!-- end product_wrapper -->
                                <?php $countP++?>
                            @endforeach
                        
                        @endif
                    </div>
                </div>
                <div id="column-left" class="col-sm-3">
                   <div class="space">
                        @include('frontEnd.part.menu')
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="latest_event">
        <div class="container">
            <h2>Our Works</h2>

            <div id="owl-demo" class="owl-carousel owl-theme">
                <?php $events=DB::table('events')->latest()->paginate(5); ?>
                @foreach($events as $row)
                    <div class="item">
                        <div class="event_box">
                            <a href="{{url('eventsDetail/'.$row->id)}}" title="{{$row->name}}">
                                <img src="{{asset('uploads/events/'.$row->image)}}" alt="{{$row->name}}" class="img-responsive" />
                            </a>
                            <div class="event_title">
                                <h3><a href="{{url('eventsDetail/'.$row->id)}}" title="{{$row->name}}">{{$row->name}}<i class="fa fa-calendar-o" aria-hidden="true"></i></a></h3>
                            </div><!-- end event_title -->
                        </div><!-- end event_box -->
                    </div><!-- end item -->
                @endforeach
            </div><!-- end owl demo -->

            <div class="nav-control">
                <a class="prev-cus"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                <a class="next-cus"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>

        </div><!-- end container -->
    </div><!-- end latest_event -->

@endsection

@section ('script')
    <script>
        $('#range').collapse('show');
        $('#multiCollapseExample1').collapse('show');
        $('#sportswear').collapse('show');
    </script>



    <script>
    function send(){
        var brand = [];
            $('.try').each(function() {
                if($(this).is(":checked")){
                    brand.push($(this).val());
                }
            });
            Finalbrand = brand.toString();
            
            $.ajax({
                type: 'get',
                url: '/shop',
                data: "brand=" + Finalbrand,
                success: function (response) {
                    /* console.log(response); */
                    $('#updateDiv').html(response);
                }
            });
    }
 </script>
    <!-- <script>
        $(function()  {
            $('.brandId').click(function()  {
                //alert('hardeep');
                var brand = [];
                $('.brandId').each(function() {
                    if($(this).is(":checked")){
                        brand.push($(this).val());
                    }
                });
                Finalbrand = brand.toString();
                
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "brand=" + Finalbrand,
                    success: function (response) {
                        console.log(response);
                        $('#updateDiv').html(response);
                    }
                });
            });
        });
    </script> -->


    <!-- <script>
    function send(){
        var start = $('#amount_start').val();
        var end = $('#amount_end').val();

        $.ajax({
          type: "get", 
          url:'',
          data: "start=" + start + "& end=" + end,
          success: function (response) {
                console.log(response);
                $('#updateDiv').html(response);
            }
        });
    }
 </script> -->

@endsection

<!-- jQuery('input[name="e_product"]').empty(); // remove last selected items
    jQuery.each(data, function(key,value){
        $('input[name="e_product"]').find('.txt_cus').val(value);
    }); -->