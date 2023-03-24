@extends('layouts.master')


@section('title','List View')
@section('view.index' , 'active')


@section('content')
<style>

        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
    </style>
<br>
    <div class="boxs">
        <div class="boxs_border">
            <div class="inner">
                <label style="font-size:25px; padding-top:5px">Order Detail</label>
                <a href="{{ url('admin/viewReport/'.$orders->id)}}" class="btn btn-lg btn-success pull-right">GENERATE INVOICE</a>
            </div>
        </div>
    </div>

    <section class="content" data-aos="fade-up" data-aos-duration="3000">
            <div class="row">
                <!-- left column -->
                <div class="col-xs-12">
                    <div class="box box-info bg-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ordered Detail</h3>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <div class="form-group">
                                    <div class="row">
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Tracking No</label>
                                                        <h5>{{$orders->tracking_no}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Tracking Msg</label>
                                                        <h5>{{isset($orders->tracking_msg) == true ? $orders->tracking_msg: 'Nothing update'}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Payment Mode</label>
                                                        <h5>{{$orders->payment_mode}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Payment Status</label>
                                                        <h5>
                                                            @if($orders->payment_status == '0')
                                                                Pending
                                                            @elseif($orders->payment_status == '1')
                                                                COD - Paid
                                                            @elseif($orders->payment_status == '2')
                                                                Paypal Successful
                                                            @elseif($orders->payment_status == '3')
                                                                Paypal Failed
                                                            @elseif($orders->payment_status == '4')
                                                                Stripe Successful
                                                            @elseif($orders->payment_status == '5')
                                                                Stripe Failed
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Payment ID</label>
                                                        <h5>{{isset($orders->payment_id) == true ? $orders->payment_id: 'COD Payment - No Id'}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Order Status</label>
                                                        <h5>
                                                            @if($orders->order_status == '0')
                                                                Pending
                                                            @elseif($orders->order_status == '1')
                                                                Completed
                                                            @elseif($orders->order_status == '2')
                                                                Rajected/Cancelled
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Cancelled Reason</label>
                                                        <h5>{{isset($orders->cancel_reason) == true ? $orders->payment_id: 'Not Cancelled'}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-12 mp-3">
                                            <div class="table_border">
                                                <h4>Orders Items</h4>
                                                <div class="inner">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Product</th>
                                                                <th>Quanity</th>
                                                                <th>Price</th>
                                                                <th>Grandtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $total = "0"; @endphp
                                                            @foreach($orders->orderitems as $item)
                                                            <tr height="50px">
                                                                <td>{{$item->id}}</td>
                                                                <td>{{Illuminate\Support\Str::of($item->products->name)->Limit(40)}}</td>
                                                                <td>{{$item->qty}}</td>
                                                                <td>{{number_format($item->price, 2)}}</td>
                                                                <td>{{number_format($item->price * $item->qty,2)}}</td>
                                                            </tr height="50px">

                                                                @php $total = $total + ($item->price * $item->qty) @endphp
                                                            @endforeach
                                                            <tr height="50px">
                                                                <td colspan="4" class="text-right">Sub Total</td>
                                                                <td>{{number_format($total, 2)}}</td>
                                                            </tr>
                                                            <tr height="50px">
                                                                <td colspan="4" class="text-right">Tax Amount</td>
                                                                <td>
                                                                    <!-- {{-- Grand_Total = total_amount * Tax / 100 --}} -->
                                                                    @if(isset($item->tax_amt))
                                                                        @php
                                                                            $tax = $item->tax_amt;
                                                                            $tax_total = ($total * $tax)/100;
                                                                        @endphp
                                                                        {{ number_format( $tax_total ,2) }}
                                                                    @else
                                                                        0
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr height="50px">
                                                                <td colspan="4" class="text-right">Grand Total</td>
                                                                <td>
                                                                    @if(isset($item->tax_amt))
                                                                        @php $grandtotal = $tax_total + $total @endphp
                                                                        {{number_format($grandtotal, 2)}}
                                                                    @else
                                                                        {{number_format($total, 2)}}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="box box-info bg-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Customer Detail</h3>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <div class="form-group">
                                    <div class="row">
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>First Name</label>
                                                        <h5>{{$orders->users->name}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Last Name</label>
                                                        <h5>{{$orders->users->lname}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Pincode</label>
                                                        <h5>{{$orders->users->pincode}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Phone</label>
                                                        <h5>{{$orders->users->phone}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Country</label>
                                                        <h5>{{$orders->users->country}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>City</label>
                                                        <h5>{{$orders->users->city}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>State</label>
                                                        <h5>{{$orders->users->state}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 mp-3">
                                                <div class="box_border">
                                                    <div class="inner">
                                                        <label>Email</label>
                                                        <h5>{{$orders->users->email}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
    </section>
@endsection


