<!DOCTYPE html>
<html>
<head>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }
        th {
            background-color: #dddddd;
            border: 1px solid  #fff;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
    <body>

            

            

    </body>
</html>

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
                            Root IT Support = Welcome to Root IT inline purchase <br>
                            Tracking No : {{ $order_data['trackingno']}} <br>
                            First Name : {{ $order_data['first_name']}} <br>
                            Last Name : {{ $order_data['last_name']}} <br>
                            Phone Number : {{ $order_data['phone']}} <br>
                            City : {{ $order_data['city']}} <br>
                            State : {{ $order_data['state']}} <br>
                            Pincode : {{ $order_data['pincode']}} <br>
                            Email : {{ $order_data['email']}} <br>
                        </p>
                      
                    </td>
                </tr>
              </table>

            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                </tr>
                @php $total="0" @endphp
                @foreach($items_in_cart as $data)
                    <tr>
                        <td>{{ $data['item_name']}}</td>
                        <td>{{ $data['item_quantity']}}</td>
                        <td>$ {{ $data['item_price']}}</td>
                    </tr>

                @php $total = $total + ( $data['item_quantity'] * $data['item_price']) @endphp
                @endforeach

                <tr>
                    <td colspan="2">Grand Total</td>
                    <td>$ {{ number_format($total,2)}}</td>
                </tr>
            </table>

          </div>
      </div>
    </body>
</html>
