@extends('layouts.master')

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Compete Order</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="span">&times;</span>
        </button>
      </div>
      
        <form action="{{ url('admin/order/complete-order/'.$orders->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal-body">
                @if($orders->payment_status == "0")
                    <h4>
                        <input type="checkbox" name="cash_received" require> Received Payment (Cash on Delivery)
                    </h4>
                    <p>Check the box to confirm that you received the Cash from Customer Close this Order</p>
                @else
                    <h5>The Payment has been done Online.</h5>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btnModal btn-secondary" data-dismiss="modal">NO</button>
                <button type="submit" class="btnModal btn-primary">YES</button>
            </div>
        </form>
    </div>
  </div>
</div>

<style>
    .text-dark{
        color:black;
        background-color: #f39c12;
        padding: 10px 20px;
    }

    .btn-secondary {
        color: #fff;
        background-color: #6c757d;
        border-color: #6c757d;
    }
    h4{
        padding: -20px;
    }
    .form-group2{
        
        display: flex;
    }

</style>
<br>
<div class="boxs">
    <div class="boxs_border">
        <div class="inner">
            <label style="font-size:25px; padding-top:5px">Order Status</label>
            <a href="{{route('order.index')}}" class="btn btn-lg pull-right">BACK</a>
        </div>
    </div>
</div>

<section class="content" data-aos="fade-up" data-aos-duration="3000">
            <div class="row">
                <!-- left column -->
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="box-title"  style="font-size:25px; padding-top:5px">Order Detail</h3>
                                </div>
                                <div class="col-md-6">
                                        <label class="pull-right text-dark">Tracking No : {{$orders->tracking_no}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <div class="form-group">
                                    <div class="row">
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_bordered">
                                                    <div class="inner">
                                                        <h4>Tracking Msg</h4>
                                                        <hr>
                                                        <h5>
                                                            @if($orders->tracking_msg == null)
                                                                No Status Update.
                                                            @else
                                                                {{$orders->tracking_msg}}
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_bordered">
                                                    <div class="inner">
                                                        <h4>Payment Status</h4>
                                                        <hr>
                                                        <h5>
                                                            @if($orders->payment_status == '0')
                                                                Status: {{_('Payment Pending')}} <br><br>
                                                                Mode: {{$orders->payment_mode}} 
                                                            @elseif($orders->payment_status == '1')
                                                                Status:  {{_('Paid on Delivery')}} <br><br>
                                                                Mode: {{$orders->payment_mode}}
                                                            @else
                                                                {{_('Paid Online')}}
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xs-4 mp-3">
                                                <div class="box_bordered">
                                                    <div class="inner">
                                                        <h4>Current Status</h4>
                                                        <hr>
                                                        <h5>
                                                            @if($orders->order_status == '0')
                                                                Order Pending
                                                            @elseif($orders->order_status == '1')
                                                                Order Completed
                                                        
                                                            @elseif($orders->order_status == '2')
                                                               
                                                                    Order Cancelled : 
                                                                    {{ $orders->cancel_reason}}
                                                               
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-header">
                                <div class="form-group">
                                    <div class="row">
                                            <div class="col-xs-6 mp-3">
                                                <div class="box_bordered">
                                                    <div class="inner">
                                                        <h4>Tracking Status Update</h4>
                                                        <hr>
                                                        @if($orders->order_status == "1")
                                                            {{$orders->tracking_msg}}
                                                        @elseif($orders->order_status == "2")
                                                            {{$orders->tracking_msg}}
                                                        @else
                                                            <form action="{{ url('admin/order/update-tracking-status/'.$orders->id)}}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PUT') }}

                                                                <div class="form-group2">
                                                                    <select name="tracking_msg" class="form-control" require id="inputGroupSelect02">
                                                                        <option value="">--- Select ---</option>
                                                                        <option value="Pending" {{ $orders->tracking_msg == "Pending" ? 'selected' : ''}}> Pending</option>
                                                                        <option value="Packed" {{ $orders->tracking_msg == "Packed" ? 'selected' : ''}}> Packed</option>
                                                                        <option value="Shipped" {{ $orders->tracking_msg == "Shipped" ? 'selected' : ''}}> Shipped</option>
                                                                        <option value="Delivered" {{ $orders->tracking_msg == "Delivered" ? 'selected' : ''}}> Delivered</option>
                                                                    </select>
                                                                    <button class="btn btn-success">Update</button>
                                                                </div>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 mp-3">
                                                <div class="box_bordered">
                                                    <div class="inner">
                                                        <h4>Cancel Order</h4>
                                                        <hr>
                                                        @if($orders->order_status == "1")
                                                            
                                                            Order - Completed

                                                        @elseif($orders->order_status == "2")

                                                            {{$orders->cancel_reason}}

                                                        @else
                                                            <form action="{{ url('admin/order/cancel-order/'.$orders->id)}}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PUT') }}

                                                                <div class="form-group2">
                                                                    <select name="cancel_reason" class="form-control" require id="inputGroupSelect02">
                                                                        <option value="">--- Select ---</option>
                                                                        <option value="Customer Not Available"> Customer Not Available </option>
                                                                        <option value="Product Damage"> Product Damage </option>
                                                                        <option value="No response"> No response </option>
                                                                        <option value="Delayed"> Delayed </option>
                                                                    </select>
                                                                    <button class="btn btn-success">Cancel</button>
                                                                </div>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 mp-3">
                                                <div class="box_bordered">
                                                    <div class="inner">
                                                        <h4>Complete Order</h4>
                                                        <hr>
                                                        @if($orders->order_status == "0")
                                                    
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                                Proceed to Finish this Order
                                                            </button>

                                                        @elseif($orders->order_status == "1")
                                                            Order Completed
                                                        @elseif($orders->order_status == "2")
                                                            Order Cancelled.! So not allowed to complete this order
                                                        @else
                                                            Nothing
                                                        @endif
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


