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
                        <?php $product=DB::table('products')->where('category_id',$id=1)->orderBy('id','desc')->get(); ?>
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
                                                <div id="successMsg{{$row->id}}" class="alert alert-success" style="display:none;"> </div>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="{{url('productsDetail/'.$row->id)}}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                            <input type="hidden" class="product_id" value="$row->id">
                                            @guest
                                                <a data-toggle="modal" data-target="#LoginModal">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            @else
                                                <a class="add-to-wishlist-btn">
                                                    <i class="fas fa-heart" ></i>
                                                </a>
                                            @endguest
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fas fa-random"></i>
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