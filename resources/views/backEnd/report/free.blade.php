    <div class="container" data-aos="fade-up" data-aos-duration="3000">
        <div class="brand-section">
            <div class="row">
                <div class="col-md-6">
                    <h1>ROOT IT SUPPORT</h1>
                </div>
                <div class="col-md-6">
                    <div class="float-right">
                        <p class="text-white">#753, Street 110 (Lom), Prey Tea, Sangkat Choam Chao, Khan Porsen Chey, Phom Penh, Cambodia.</p>
                        <p class="text-white">sales@rootitsupport.com</p>
                        <p class="text-white">Tel:  +855 (0)17 925 629 (Cellcard)
                                                    +855 (0)70 925 629 (Smart)
                                                    +855 (0)90 925 629 (Metfone)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="">
                <div class="">
                    <h2 class="heading">Invoice No.: {{$orders->id}}</h2>
                    <p class="sub-heading">Tracking No. {{$orders->tracking_no}} </p>
                    <p class="sub-heading">Order Date: {{$orders->created_at->format('d-m-y')}} </p>
                    <p class="sub-heading">Email Address: {{$orders->users->email}} </p>
             
                    <p class="sub-heading">Full Name: {{$orders->users->getUserName()}}</p>
                    <p class="sub-heading">Address:  {{$orders->users->city}} City, {{$orders->users->state}} State, {{$orders->users->country}} Country</p>
                    <p class="sub-heading">Phone Number:  {{$orders->users->phone}}</p>
                    <p class="sub-heading">Pincode: {{$orders->users->pincode}}  </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quanity</th>
                        <th>price</th>
                        <th>Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = "0"; @endphp
                    @foreach($orders->orderitems as $item)
                    <tr>
                        <td>{{Illuminate\Support\Str::of($item->products->name)->Limit(40)}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{number_format($item->price, 0)}}</td>
                        <td>{{$item->price * $item->qty}}</td>
                    </tr>

                        @php $total = $total + ($item->price * $item->qty) @endphp
                    @endforeach
                    <tr>
                        <td colspan="3" class="float-right">Sub Total</td>
                        <td>{{number_format($total, 0)}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="float-right">Tax Amount</td>
                        <td>
                            <!-- {{-- Grand_Total = total_amount * Tax / 100 --}} -->
                            @if(isset($item->tax_amt))
                                @php
                                    $tax = $item->tax_amt;
                                    $tax_total = ($total * $tax)/100;
                                @endphp
                                {{ number_format( $tax_total) }}
                            @else
                                0
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="float-right">Grand Total</td>
                        <td>
                            @if(isset($item->tax_amt))
                                @php $grandtotal = $tax_total + $total @endphp
                                {{number_format($grandtotal, 0)}}
                            @else
                                {{number_format($total, 0)}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: 
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
            </h3>
            <h3 class="heading">Payment Mode: {{$orders->payment_mode}}</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Fabcart. All rights reserved. 
                <a href="https://www.fundaofwebit.com/" class="float-right">www.fundaofwebit.com</a>
            </p>
        </div>      
    </div>  








    <div class="container">
        <div class="row">
                <div class="col-sm-12">

                  <!-- Main content -->
                  <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-sm-12">
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
                      <div class="col-sm-12 table-responsive">
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
                                            Razorpay Successful
                                        @elseif($orders->payment_status == '3')
                                            Razorpay Failed
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
                      <div class="col-sm-6 .invoice-col-6">
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
                      <div class="col-sm-6 .invoice-col-6">
                        <p class="lead">Payment Mode : {{$orders->created_at->format('d/m/y')}} </p>

                        <div class="table-responsive">
                          <table class="table">
                              <tbody>
                                <tr>
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
                              </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-sm-12">

                        <a  href="" onclick="window.print()" target="_blank" class="btn btn-default btnprint"><i class="fa fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success float-right">
                            <i class="fa fa-credit-card"></i>
                            Submit Payment
                        </button>

                        <a href="{{ url('admin/generate-invoice/'.$orders->id) }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                          <i class="fa fa-download"></i> Generate PDF
                        </a>

                      </div>
                    </div>

                  </div>
                  <!-- /.invoice -->
                </div>
        </div>
    </div>
