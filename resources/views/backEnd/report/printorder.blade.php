@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
                <div class="col-md-12">

                  <!-- Main content -->
                  <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-md-12">
                        <h4>
                          ROOT IT SUPPORT
                        </h4>
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
                        <b>Invoice No. : #0000{{number_format($orders->id)}}</b><br>
                        <br>
                        <b>Tracking No. : </b> {{$orders->tracking_no}}<br>
                        <b>Order Date : </b>{{$orders->created_at->format('d/m/y')}} <br>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-md-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Tax_amt</th>
                            <th>Payment Status</th>
                            <th>Subtotal</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                          @php $total = "0"; @endphp
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
                      <div class="col-md-6">
                        <p class="lead">Payment Methods:  {{$orders->payment_mode}}</p>
                        <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/visa.png" alt="Visa">
                        <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/american-express.png" alt="American Express">
                        <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/paypal2.png" alt="Paypal">

                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                          plugg
                          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <p class="lead">Payment Mode : {{$orders->created_at->format('d/m/y')}} </p>

                        <div class="table-responsive">
                          <table class="table">
                            <tbody><tr>
                              <th style="width:50%">Subtotal:</th>
                              <td>{{number_format($total, 0)}}</td>
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
                                    {{ number_format( $tax_total)}}
                                @else
                                    0
                                @endif
                              </td>
                            </tr>
                            <tr>
                              <th>Shopping:</th>
                              <td>{{$item->qty + $item->qty}} (Items)</td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td>
                                @if(isset($item->tax_amt))
                                    @php $grandtotal = $tax_total + $total @endphp
                                    {{number_format($grandtotal, 0)}}
                                @else
                                    {{number_format($total, 0)}}
                                @endif
                              </td>
                            </tr>
                          </tbody></table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                  </div>
                  <!-- /.invoice -->
                </div>
        </div>
    </div>



@endsection
