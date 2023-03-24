<hr class="mb-4">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="summary summary-checkout">
                                    <div class="summary-item paymant-method">
                                        <h4 class="title-box">Payment Method</h4>
                                        <hr>
                                        <p class="summary-info"><span class="title">Check / Money Order</span></p>
                                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                                        <div class="choose-payment-method">
                                            <label for="" class="payment-method">
                                                <input type="radio" name="payment-method" id="payment-method" id="payment-method-bank" value="cod">
                                                <span>Cash On Delivery</span>
                                                <span class="payment-desc">Order Now Pay on Delivery</span>
                                            </label><br>
                                            <label for="" class="payment-method">
                                                <input type="radio" name="payment-method" id="payment-method" id="payment-method-bank" value="card">
                                                <span>Debit / Credit Card</span>
                                                <span class="payment-desc">There are many variations</span>
                                            </label><br>
                                            <label for="" class="payment-method">
                                                <input type="radio" name="payment-method" id="payment-method" id="payment-method-bank" value="paypal">
                                                <span>Paypal</span>
                                                <span class="payment-desc">There are many variations</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6 mb-3">
                                <button class=" btn-block payment_btn" type="submit">PLACE YOUR ORDER</button>
                            </div>

<hr class="mb-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <button name="place_order_btn" class="btn btn-block payment_btn" type="submit">PLACE YOUR ORDER</button>
                            </div>
                            <!-- <div class="col-md-6 mb-3">
                                <button value="Continue" class="razorpay_pay_btn btn  btn-block payment_btn" type="button">RAZORPAY PAY ONLINE</button>
                            </div>
                            <div class="col-md-6 mb-3"> 
                                @include('frontEnd.checkout.stripepaympdal')
                                <button type="button" class="btn btn-block payment_btn" data-toggle="modal" data-target="#StripeCardModal">STRIPE - PAY ONLINE</button>
                            </div> -->
                        </div>

<style>
    <?php for($i=1;$i<15;$i++) { ?>
        #banUer<?php echo $i ;?> { display:none;}
        .banUer<?php echo $i ;?> {
            width:120px; height: 40px; background: #333; border-radius: 50px; position:relative;
        }
        .banUer<?php echo $i ;?>:before {
            content: 'Yes'; position: absolute; top: 12px; left: 13px; height: 2px; color: #26ca28; font-size: 16px;
        }
        .banUer<?php echo $i ;?>:after {
            content: 'Np'; position: absolute; top: 12px; left: 84px; height: 2px; color: #fff; font-size: 16px;
        }
        .banUer<?php echo $i ;?> Label {
            display: block; width: 52px; height:22px; border-radius:50px; transition: all .5s ease;
            cursor: pointer; position: absolute; top: 9px; z-index: 1; left:12px; background: #ddd;
        }
    <?php} ?>
</style>

<!-- <div class="box-category-heading"><span class="heading-img"><i></i></span>Categories</div>
    <div class="list-group">
		
        @foreach($category as $row)
            <a class="list-group-item" href="{{url('showCategory/'.$row->id)}}" title="">{{$row->name}}</a>
        @endforeach
            <a class="list-group-item" href="{{url('showAllCategory')}}" title="All Categories">All Categories</a>
    </div>
</div>

 -->





<ul class="list-unstyled childs_1">
        <!-- 2 Level Sub Categories START -->
        <?php $brandShow = App\Models\Product::brandShow($row->id); ?>
        @foreach($brandShow as $item)
                <li class="dropdown"><a class="activSub" href="{{url('showbyBrand/'.$item->id)}}">{{$item->getBrandName()}}</a></li>
        @endforeach
    <!-- 2 Level Sub Categories END -->
</ul>




			<li>
                <a href="#">Categories</a>
                <ul class="cbp-hssubmenu">
                    <li><a href="{{url('showAllCategory')}}" title="All Categories">All Categories</a></li>
                    <?php $category=DB::table('categories')->get(); ?>
                    @foreach($category as $row)
                        <li><a href="{{url('showCategory/'.$row->id)}}" title="">{{$row->name}}</a></li>
                    @endforeach
                </ul>
            </li>

<!-- ===================================================================================== -->
                        <div class="product_wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="product_inner">
                                        <h2>All Product</h2>
                                        <div class="row">
                                            <div class="pro_space">
                                            <?php $products =DB::table('products')->where('status','1')->orderBy('id','desc')->get(); ?>
                                            @foreach($products as $row)
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
                                                                        <div id="successMsg{{$row->id}}" class="alert alert-success" style="display:none;"> </div>
                                                                </div>
                                                                <ul>
                                                                    <li>
                                                                        <a target="_blank" href="{{asset('uploads/product/'.$row->image)}}">
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

                        <div class="product_wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="product_inner">
                                    <?php $brandName=DB::table('categories')->where('id',$id=1)->get() ?>
                                    @foreach($brandName as $row)
                                    <h2>{{$row->name}}</h2>
                                    @endforeach
                                        <div class="row">
                                            <div class="pro_space">
                                            <?php $product=DB::table('products')->where('category_id',$id=1)->latest()->get(); ?>
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
                                                                    <button type="button" class="product__btn" id="Cart{{$row->id}}" value="{{$row->id}}">Add To Cart</button>
                                                                    <div id="successMsge{{$row->id}}" class="alert alert-success" style="display:none;"> </div>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <a target="_blank" href="{{asset('uploads/product/'.$row->image)}}">
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
                                                                    <a  href="{{url('productsDetail/'.$row->id)}}">
                                                                        <i class="fas fa-list"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- end random col -->
                                            @endforeach
                                            </div><!-- end pro_space -->
                                        </div><!-- end row -->
                                    </div><!-- end product_inner -->
                                </div><!-- end row -->
                            </div><!-- end container -->
                        </div><!-- end product_wrapper -->

                        <div class="product_wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="product_inner">
                                    <?php $brandName=DB::table('categories')->where('id',$id=2)->get() ?>
                                    @foreach($brandName as $row)
                                    <h2>{{$row->name}}</h2>
                                    @endforeach
                                        <div class="row">
                                            <div class="pro_space">
                                            <?php $product=DB::table('products')->where('category_id',$id=5)->orderBy('id','desc')->get(); ?>
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
                                                                    <button type="button" class="product__btn" id="CartAdd{$row->id}}" value="{{$row->id}}">Add To Cart</button>
                                                                    <div id="successMsges{{$row->id}}" class="alert alert-success" style="display:none;"> </div>
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <a target="_blank" href="{{asset('uploads/product/'.$row->image)}}">
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












                        <ul class="list-unstyled childs_1">
                                <!-- 2 Level Sub Categories START -->
                                <?php $brandShow = App\Models\SubCategory::brandShow($row->id); ?>
                                @foreach($brandShow as $item)
                                    <li class="dropdown"><a class="activSube" href="{{url('showBrand/'.$item->id)}}">{{$item->name}} </a>
                                
                                    <ul class="list-unstyled childs_1">
                                        <!-- 2 Level Sub Categories START -->
                                            <?php $productBrand = App\Models\Product::productBrand($item->id); ?>
                                            @foreach($productBrand as $c)
                                                <li class="dropdown"><a class="activSube" href="{{url('showBrand/'.$item->id)}}">{{$c->getBrandName()}} </a></li>
                                            @endforeach
                                        <!-- 2 Level Sub Categories END -->
                                    </ul>
                                </li>
                                @endforeach
                            <!-- 2 Level Sub Categories END -->
                        </ul>