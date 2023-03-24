@extends('layouts.master')


@section('title','Dashboard')
@section('product.create' , 'active')

@section('content')
<section class="content-header">
    <h1>
        <i class="fas fa-database"></i> &nbsp;Add Product
    </h1>
    <ol class="breadcrumb">
        <li><a href="#" class="header_a"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active header_a">Create Product</li>
    </ol>
</section>


<section class="content" data-aos="fade-up" data-aos-duration="3000">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Add Product</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Original Price</label>
                                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="price" value="{{ old('price') }}">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="spl_price">Selling  Price</label>
                                
                                    <input type="number" name="spl_price" class="form-control @error('spl_price') is-invalid @enderror" id="spl_price" placeholder="spl_price" value="{{ old('spl_price') }}">
                                    @error('spl_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="brand_id">Brand</label>
                                    <select type="text" name="brand_id" class="form-control @error('brand_id') is-invalid @enderror" id="select2_brand">
                                                @foreach($brands as $id=> $brand)
                                                    <option value="{{$id}}">{{$brand}}</option>
                                                @endforeach
                                    </select>
                                    @error('brand_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select type="text" name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="select2_category">
                                                @foreach($categories as $id=> $category)
                                                    <option value="{{$id}}">{{$category}}</option>
                                                @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcategory_id">SubCategory</label>
                                    <select type="text" name="subcategory_id" class="form-control" id="select2_subcategory">
                                            @foreach($subCategory as $id=> $subcategory)
                                                <option value="{{$id}}">{{$subcategory}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">status</label>
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

                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty" placeholder="quantity" value="{{ old('qty') }}">
                            @error('qty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tax_amt">Tax_amt</label>
                            <input type="number" name="tax_amt" class="form-control @error('tax_amt') is-invalid @enderror" id="tax_amt" placeholder="quantity" value="{{ old('tax_amt') }}">
                            @error('tax_amt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label for="image">Photo</label><br>
                                
                                <img src="#" id="image" alt="" width='150' height='150'><br>
                                <input type="file" name="image" class="form-control" accept="image/*" class="upload" required onchange="readURL(this);">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">title</label>
                            <textarea name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title">{{ old('title') }}</textarea>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="description">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="{{ route('product.index') }}" class="btn btn-default"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</a>
                        <!-- <button type="submit" class="btn btn-success">Save & Add More</button> -->
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div><!-- /.box-footer -->
            </form>
        </div>
    <!-- /.box-body -->
    </div>
</section>



@endsection

@section('scripts')

    <script>
        jQuery(document).ready(function () {

            jQuery('select[name="category_id"]').on('change', function() {
                var categoryId = jQuery(this).val();
                if(categoryId)
                {
                    jQuery.ajax({
                        url : '/search/' + categoryId,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            jQuery('select[name="subcategory_id"]').empty(); // remove last selected items
                            jQuery.each(data, function(key,value){
                                $('select[name="subcategory_id"]').append('<option value="'+ key +'">' + value + '</option>');
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#select2_brand').select2();
        });
        $(document).ready(function() {
            $('#select2_category').select2();
        });
        $(document).ready(function() {
            $('#select2_subcategory').select2();
        });
    </script>
    <!-- <script>
        $("#btnsearch").on("click", function(){

            var link = document.getElementById("product").value;

            $.ajax({
                url: window.location.href="getDateSearch/" + link
            });
        });
    </script> -->

    <script>

        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#image')
                        .attr('src',e.target.result)
                        .width(150)
                        .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection