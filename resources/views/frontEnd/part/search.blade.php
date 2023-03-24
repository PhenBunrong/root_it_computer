
<form name="search" action="{{ route('search') }}" method="GET">
    <div class="row wrap-search-form">
        <div class="col-md-10 col-sm-9">
            <div class="row">
                <!-- <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="xs-pdd sm-pdd wrap-list-cate">

                            <select name="e_category" class="form-control slt_cus">
                                    <option value="0">All Categories</option>
                                <?php $proCateogry =DB::table('categories')->get(); ?>
                                @foreach($proCateogry as $item)
                                    <option value="{{$item->id}}">{{ucwords($item->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="xs-pdd">
                            <input type="text" class="form-control txt_cus" name="e_product" placeholder="Search Your Key Products ..." required />
                        </div><!-- end xs-pdd -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->

        <div class="col-md-2 col-sm-3">
            <button type="submit" class="form-control btn_search" id="btnsearch" name="btnsearch">Search Now <i style="margin-left: 5px;" class="fa fa-search"></i></button>
        </div><!-- end col -->
    </div><!-- end row -->
</form>
