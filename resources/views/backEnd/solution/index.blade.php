@extends('layouts.master')


@section('title', 'Solution')
@section('solution.index' , 'active')

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
                url: '/admin/update-solution-status',
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
                url: '/admin/update-solution-status',
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
  <i class="fas fa-database"></i>&nbsp;Solution
    <a href="{{route('solution.index')}}" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a>
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#CouponModal"><i class="fas fa-plus-circle"></i>&nbsp; Add Data</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Solution</li>
  </ol>
</section>


<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
  <div class="box">
    <div class="box-header">
        <div class="box-body table-responsive">
        
            <table id="table_dashboard" class="table table-hover table-striped table-bordered">
              <thead>
                <tr class="active">
                  <th width="10%">
                    <a href="#">Image</a>
                  </th>
                  <th width="10%">
                    <a href="#">Name</a>
                  </th>
                  <th width="16%">
                    <a href="#">Title</a>
                  </th>
                  <th width="5%">
                    <a href="#">Status</a>
                  </th>
                  <th width="5%" style="text-align:right"><a href="#">Action</a></th>
                </tr>
              </thead>
              <tbody>
              @foreach($solution as $row)
                <tr>
                  <td><center><img src="{{asset('uploads/solution/'.$row->image)}}" height="80px" width="80px" alt=""></center></td>
                  <td>{{ Illuminate\Support\Str::of($row->name)->words(40) }}</td>
                  <td>{!! Illuminate\Support\Str::of($row->title)->words(40) !!}</td>
                  <td>
                      <input type="checkbox" class="ProductStatus" rel="{{$row->id}}"
                                data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger"
                                @if($row['status']=="1") checked @endif />
                          <!-- <span class="right badge badge-{{ $row->status ? 'success' : 'danger'}} text-sm">
                            {{$row->status ? 'Active' : 'Inactive'}}
                          </span> -->
                  </td>
                  <td>
                    <div class="button_action" style="text-align:right">
                    <a class="btn btn-xs btn-danger btn-detail" title="Detail Data" href="{{ route('solution.show', $row)}}"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-xs btn-primary btn-detail" title="Attributes Data" href="{{ url('admin/solutionImageAtrr/'.$row->id)}}"><i class="fa fa-image"></i></a>
                      <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{ route('solution.edit', $row)}}"><i class="fa fa-pencil"></i></a>
                      <button class="btn btn-xs btn-warning btn-delete"  data-url="{{ route('solution.destroy', $row)}}" ><i class="fa fa-trash"></i></button>
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
                </tr>
              </tfoot>
            </table>
      </div>
    <div>
  </div>    
</section>

<div class="modal fade" id="CouponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Solution Create</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="span">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="{{ route('solution.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name<span style="color:red;">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Photo<span style="color:red;">*</span></label>
                      <div class="col-sm-10">  
                        <img src="#" id="image" alt="" width='150' height='150'><br>
                        <input type="file" name="image" class="form-control" accept="image/*" class="upload" required onchange="readURL(this);">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">status<span style="color:red;">*</span></label>
                    <div class="col-sm-10">
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
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">title<span style="color:red;">*</span></label>
                    <div class="col-sm-10">
                    <textarea name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title">{{ old('title') }}</textarea>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">description<span style="color:red;">*</span></label>
                    <div class="col-sm-10">
                    <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="description">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
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
              text: "Do you really want to delete this product?",
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