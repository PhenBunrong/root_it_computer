@extends('layouts.master')


@section('title', 'Coupon')
@section('coupon.create' , 'active')


@section('content')
<div class="boxs md-2">
    <div class="boxs_border">
        <div class="inner">
            <label style="font-size:25px; padding-top:5px">Update Coupon Code Page</label>
        </div>
    </div>
</div>


<section class="content" data-aos="fade-up" data-aos-duration="3000">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-database"></i>&nbsp;Update Coupon</h3>
        </div>
        <div class="box-header">
            <form action="{{route('coupon.update',$coupon)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Offer Name</label>
                            <input type="text" name="offer_name" value="{{ $coupon->offer_name }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Products (option)</label>
                            <select name="product_id" class="form-control" id="select2_products">
                                <option value="">Select Products</option>
                                @foreach($product as $row)
                                    <option value="{{$row->id}}" {{"$row->id" == "$coupon->product_id" ? 'selected' : ''}}>{{Illuminate\Support\Str::of($row->name)->Limit(20)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Coupon Code</label>
                            <input type="text" name="coupon_code" readonly value="{{ $coupon->coupon_code }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Coupon Limit</label>
                            <input type="number" name="coupon_limit" value="{{ $coupon->coupon_limit }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Coupon Type</label>
                            <select name="coupon_type" class="form-control">
                                <option value="">Select your  Coupon Type</option>
                                <option value="1" {{ "$coupon->coupon_type" == "1" ? 'selected' : ''}}>Percentage</option>
                                <option value="2" {{ "$coupon->coupon_type" == "2" ? 'selected' : ''}}>Amount</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Coupon Price</label>
                            <input type="text" name="coupon_price" value="{{ $coupon->coupon_price }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Start Date Time</label>
                            <input type="datetime-local" name="start_datetime" value="{{ date('Y-m-d\TH:i', strtotime($coupon->start_datetime)) }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">End Date Time</label>
                            <input type="datetime-local" name="end_datetime" value="{{ date('Y-m-d\TH:i', strtotime($coupon->end_datetime)) }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status</label><br>
                            <input type="checkbox" name="status" {{ $coupon->status == "1" ? 'checked':''}} /> (0=Active , 1=blocked)
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Visibility Status</label><br>
                            <input type="checkbox" name="visibility_status" {{ $coupon->visibility_status == "1" ? 'checked': ''}} /> (0=Show , 1=Hide)
                        </div>
                    </div>
                </div>
                    <br>
                <div class="box-footer">
                    <div>
                        <a class="btn btn-default" href="{{route('coupon.index')}}"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp; Back</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    <!-- /.box-body -->
    </div>
</section>




@endsection


