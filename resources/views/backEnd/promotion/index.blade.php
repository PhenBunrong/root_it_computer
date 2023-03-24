@extends('layouts.master')

@section('title', 'List Promotion')
@section('promotion.index' , 'active')



@section('css')
 <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css')}}"></link>
@endsection

@section('content')
<script>
    $(document).ready(function() {

      $(".ProductStatus").change(function()
        {
          var id = $(this).attr('rel');

          if($(this).prop("checked")==true)
          {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url: '/admin/update-promotion-status',
                data: {status:'1',id:id},

                success:function(data) {
                    $("#message_success").show();
                },
                error:function()
                {
                  alert("Error");
                }

            });
          }
          else 
          {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url: '/admin/update-promotion-status',
                data: {status:'0',id:id},

                success: function (response) {

                    $("#message_error").show();
                    
                },error:function(){
                  alert("Error");
                }

            });
          }
        });
    });
</script>
<section class="content-header">
  <div id="message_success" style="display:none;">Status Enabled</div>
  <div id="message_error" style="display:none;">Status Disabled</div>
</section>

<section class="content-header">
  <h1>
  <i class="fas fa-database"></i> &nbsp;Promotion
<a href="{{route('promotion.index')}}" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a>
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#CouponModal"><i class="fas fa-plus-circle"></i>&nbsp; Add Data</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Promotion</li>
  </ol>
</section>


<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
    <div class="box">
          <div class="box-header">
            <div class="box-body table-responsive">
        
              <table id="table_dashboard" class="table table-hover table-striped table-bordered">
                <thead>
                  <tr class="active">
                    <th width="8%">
                      <a href="#">Image</a>
                    </th>
                    <th width="8%">
                      <a href="#">Name</a>
                    </th>
                    <th width="8%">
                      <a href="#">PinCode</a>
                    </th>
                    <th width="8%">
                      <a href="#">Model</a>
                    </th>
                    <th width="8%">
                      <a href="#">Qty</a>
                    </th>
                    <th width="8%">
                      <a href="#">Original Price</a>
                    </th>
                    <th width="8%">
                      <a href="#">Selling Price</a>
                    </th>
                    <th width="8%">
                      <a href="#">Status</a>
                    </th>
                    <th width="8%">
                      <a href="#">Attributes</a>
                    </th>
                    <th width="10%"  style="text-align:right"><a href="#">Action</a></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($promotions as $row)
                <tr>
                    <td><center><img src="{{asset('uploads/promotion/'.$row->image)}}" height="70px" width="60px" alt=""></center></td>
                    <td>{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</td><!-- <td>{{Illuminate\Support\Str::of($row->name)->words(8)}}</td> -->
                    <td>{{$row->pro_code}}</td>
                    <td>{{$row->getBrandName()}} / {{$row->getCategoryName()}}</td>
                    <td>{{$row->qty}}</td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->spl_price}}</td>
                    <td>
                      <input type="checkbox" class="ProductStatus" rel="{{$row->id}}"
                              data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger"
                              @if($row['status']=="1") checked @endif />
                        <!-- <span class="right badge badge-{{ $row->status ? 'success' : 'danger'}} text-sm">
                          {{$row->status ? 'Active' : 'Inactive'}}
                        </span> -->
                    </td>
                    <td style="text-align:right">
                        <a class="btn btn-xs btn-primary btn-detail" title="Attributes Data" href="{{ url('admin/promotion_image/'.$row->id)}}"><i class="fa fa-image"></i></a>
                        <a class="btn btn-xs btn-primary btn-detail" title="Attributes Data" href="{{ url('admin/promotion_attributes/'.$row->id)}}"><i class="fa fa-list"></i></a>
                    </td>
                    <td>
                      <div class="button_action" style="text-align:right">
                        <a class="btn btn-xs btn-danger btn-edit" title="Edit Data" href="{{ route('promotion.show', $row)}}"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{ route('promotion.edit', $row)}}"><i class="fa fa-pencil"></i></a>
                        <button class="btn btn-xs btn-warning btn-delete"  data-url="{{ route('promotion.destroy', $row)}}" ><i class="fa fa-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                  </tr>
                </tfoot>
              </table>
          </div>
    </div>    
</section>

<div class="modal fade" id="CouponModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Promotion Create</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="span">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="{{ route('promotion.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="name">Name<span style="color:red;">*</span></label>
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
                                  <label for="price">Specials Price<span style="color:red;">*</span></label>
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
                                  <label for="spl_price">Selling Price<span style="color:red;">*</span></label>
                              
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
                                  <label for="brand_id">Brand<span style="color:red;">*</span></label>
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
                                  <label for="category_id">Category<span style="color:red;">*</span></label>
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
                                  <label for="subcategory_id">SubCategory<span style="color:red;">*</span></label>
                                  <select type="text" name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" id="select2_subcategory">
                                              @foreach($subCategory as $id=> $subcategory)
                                                  <option value="{{$id}}">{{$subcategory}}</option>
                                              @endforeach
                                  </select>
                                  @error('subcategory_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{$message}}</strong>
                                  </span>
                                  @enderror
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="status">status<span style="color:red;">*</span></label>
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
                          <label for="qty">Quantity<span style="color:red;">*</span></label>
                          <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty" placeholder="quantity" value="{{ old('qty') }}">
                          @error('qty')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="tax_amt">Tax_amt<span style="color:red;">*</span></label>
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
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="title">title<span style="color:red;">*</span></label>
                          <textarea name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title">{{ old('title') }}</textarea>
                          @error('title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="description">description<span style="color:red;">*</span></label>
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
                    <button type="" class="btn btn-default "  data-dismiss="modal" aria-label="Close"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</button>
                        <!-- <button type="submit" class="btn btn-success">Save & Add More</button> -->
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div><!-- /.box-footer -->
            </form>
        </div>
    </div>
  </div>
</div>

@endsection

@section('js')
 <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
 <script>
    $(document).ready(function(){
      $(document).on('click', '.btn-delete' , function(){
          $this = $(this);
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger',
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "Do you really want to delete this promotion?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No',
              reverseButtons: true
            }).then((result) => {
            if (result.value) {
              $.post($this.data('url'), {_method:'DELETE', _token: '{{ csrf_token() }}'}, function (res){
                $this.closest('tr').fadeOut(500, function() {
                  $(this).remove();
                })
              })
            } 
          })
      })
    })
 </script>
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      $('#table_dashboard').DataTable();
    } );
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