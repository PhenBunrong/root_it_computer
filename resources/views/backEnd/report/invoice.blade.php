@extends('layouts.master')


@section('title','Invoice')
@section('order.index' , 'active')


@section('content')

<style>
.navbar-laravel {
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}
.router-link-exact-active{
    background-color: #3f51b5;
    color:#fff !important;
}


@media print {
    .nav.nav-tabs li:not(.active){
        display: none;
    }
    .invoice{
    	padding: 10px 20px;
    }


    .invoice{
		background-position: center center;
		background-repeat: no-repeat;

	}
	.table-responsive table{
		background-color: transparent !important;
	}

}


@page {
    margin: 0;
}

</style>

    <section class="content-header">
      <h1>
        Invoice
        <small>#00000{{number_format($orders->id)}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboad')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

<!--     <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
      </div>
    </div>
 -->
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header"> ROOT IT SUPPORT
            <small class="pull-right">
                Date: <?php 
                          use Carbon\Carbon;
                          $date = new Carbon();
                          $date->timezone('US/Central');

                          echo $date->toDayDateTimeString();
                      ?> 
            </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Admin, Inc.</strong><br>
            #753, Street 110 (Lom), Prey Tea, Sangkat Choam Chao,<br>
            Khan Porsen Chey, Phom Penh, Cambodia.<br>
            Email: sales@rootitsupport.com <br>
            Tell :&nbsp;  +855 (0)17 925 629 (Cellcard)<br>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; +855 (0)70 925 629 (Smart)<br>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; +855 (0)90 925 629 (Metfone)<br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{$orders->users->name .' '. $orders->users->lname}}</strong><br>
            {{$orders->users->city}} City, {{$orders->users->state}} State,<br>
            {{$orders->users->country}} Country. <br>
            Phone: {{$orders->users->phone}}<br>
            Email: {{$orders->users->email}} <br>
            Pincode : {{$orders->users->pincode}} 
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice No. : #00000{{number_format($orders->id)}}</b><br>
          <br>
          <b>Tracking No. : </b> {{$orders->tracking_no}}<br>
          <b>Order Date : </b>{{$orders->created_at->format('d/m/Y')}} <br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Tax_amt</th>
                  <th>Payment Status</th>
                  <th>Total Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  @php $total = "0"; @endphp
                  @php $totalItem="0" @endphp

                  @foreach($orders->orderitems as $item)
                  <tr>
                      <td>{{Illuminate\Support\Str::of($item->products->name)->Limit(40)}}</td>
                      <td>{{$item->qty}}</td>
                      <td>{{$item->tax_amt}}</td>
                      <td>
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
                      </td>
                      <td>{{$item->price * $item->qty}}</td>
                  </tr>

                      @php $total = $total + ($item->price * $item->qty) @endphp
                      @php $totalItem = $totalItem + ($item->qty) @endphp
                  @endforeach
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods: {{$orders->payment_mode}}</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Payment Mode : {{$orders->created_at->format('d/m/y')}} </p>

          <div class="table-responsive">
            <table class="table">
                <tbody>
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>$ {{number_format($total, 2)}}</td>
                  </tr>
                  <tr>
                    <th>Tax Amount:</th>
                    <td>
                      <!-- {{-- Grand_Total = total_amount * Tax / 100 --}} -->
                      @if(isset($item->tax_amt))
                          @php
                              $tax = $item->tax_amt;
                              $tax_total = ($total * $tax)/100;
                          @endphp
                          $ {{ number_format( $tax_total, 2)}}
                      @else
                          0
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Shopping:</th>
                    <td>{{ number_format($totalItem) }} (Items)</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>
                      @if(isset($item->tax_amt))
                          @php $grandtotal = $tax_total + $total @endphp
                          $ {{number_format($grandtotal, 2)}}
                      @else
                          $ {{number_format($total, 2)}}
                      @endif
                    </td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a  href="" onclick="window.print()" target="_blank" class="btn btn-default btnprint"><i class="fa fa-print"></i> Print</a>
          <!-- <a href="{{ url('admin/generate-invoice/'.$orders->id) }}" class="btn btn-success float-right">
              <i class="fa fa-credit-card"></i>
              Submit Payment
          </a> -->

          <a href="{{ url('admin/generate-invoice/'.$orders->id) }}" class="btn btn-primary float-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </a>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
 

@endsection
