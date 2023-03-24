<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root It Support</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <style>
      body{
        font-size: 12px;
        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
      }
       table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          font-size: 12px;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
</style>
</head>
    <body>
        <div class="container">
              <h2 class="page-header"> ROOT IT SUPPORT
                <small class="pull-right">
                    Date: <?php 
                              use Carbon\Carbon;
                              $date = new Carbon();
                              $date->timezone('US/Central');

                              echo $date->toFormattedDateString();
                          ?> 
                </small>
              </h2>
              <table>
                <tr>
                    <td>
                      From
                      <p>
                          Admin, Inc.<br>
                         
                          #753, Street 110 (Lom), Prey Tea, Sangkat Choam Chao,<br>
                          Khan Porsen Chey, Phom Penh, Cambodia.<br>
                          Email: sales@rootitsupport.com <br>
                          Tell :&nbsp;  +855 (0)17 925 629 (Cellcard)<br>
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; +855 (0)70 925 629 (Smart)<br>
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; +855 (0)90 925 629 (Metfone)<br>
                        
                      </p>
                    </td>
                    <!-- /.col -->
                    <td>
                      To
                      <p>
                          {{$orders->users->name .' '. $orders->users->lname}}<br>
                        
                          {{$orders->users->city}} City, {{$orders->users->state}} State,<br>
                          {{$orders->users->country}} Country. <br>
                          Phone: {{$orders->users->phone}}<br>
                          Email: {{$orders->users->email}} <br>
                          Pincode : {{$orders->users->pincode}} 
                        </p>
                      
                    </td>
                    <!-- /.col -->
                    <td>
                      <b>Invoice No. : #0000{{number_format($orders->id)}}</b><br>
                      <br>
                      <b>Tracking No. : </b> {{$orders->tracking_no}}<br>
                      <b>Order Date : </b>{{$orders->created_at->format('d/m/y')}} <br>
                    </td>
                </tr>
              </table>

              <table>
                <tr>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Tax_amt</th>
                  <th>Payment Status</th>
                  <th>Subtotal</th>
                </tr>
                
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

                      @php $totalItem = $totalItem + ($item->qty) @endphp
                  @endforeach
              </table>

              <table>
                  <tr>
                    <th>
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
                    </th>
                    <th>
                      <p class="lead">Amount Due : {{$orders->created_at->format('d/m/y')}} </p>
                      <div class="table-responsive">
                        <table>
                          <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>{{number_format($total, 2)}}</td>
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
                            
                            <td>{{ number_format($totalItem) }} (Items)</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td>
                              @if(isset($item->tax_amt))
                                  @php $grandtotal = $tax_total + $total @endphp
                                  {{number_format($grandtotal, 2)}}
                              @else
                                  {{number_format($total, 2)}}
                              @endif
                            </td>
                          </tr>
                        </table>
                      </div>
                    </th>
                  </tr>
              </table>
          </div>
      </div>
    </body>
</html>
