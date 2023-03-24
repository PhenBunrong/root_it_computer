@extends('frontEnd.frontEnd')

@section ('title', 'Order Page')

@section ('content')

<style>
    .btn-primary, #cart .text-right .addtocart, #cart .text-right .checkout, .btn-default, #button-cart, .button.aboutus, .btn-info {
        background: none repeat scroll 0 0 #fdb913;
        border: medium none;
        color: #ffffff;
        display: inline-block;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 12px;
        text-transform: uppercase;
        width: auto;
        height: auto;
        border-radius: 0;
        line-height: normal;
    }

    .form-control {
        display: block;
        width: 100%;
        height: auto;
        padding: 7px 12px;
        font-size: 14px;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #eee;
        border-radius: 0;
        box-shadow: none;
    }

    .appl{
        height: auto;
    }
</style>
<hr>
<div id="account-edit" class="container">
    <div class="row">
            <div class="box">
                <div id="content" class="col-sm-4">   
                    @include('frontEnd.profile.menu')
                </div>
                <div id="content" class="col-sm-8"> 
                    <h3><span style="color:green;">{{ucwords(Auth::user()->getUserName())}}</span> , Your Order </h3>
                    <hr>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Product name</th>
                                    <th>Product code</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $row)
                                <tr>
                                    <td>{{$row->created_at}}</td>
                                    <td>{{ucwords($row->name)}}</td>
                                    <td>{{$row->pro_code}}</td>
                                    <td>{{$row->spl_price}}</td>
                                    <td>
                                    @if($row->order_status == '0')
                                        Pending
                                    @elseif($row->order_status == '1')
                                        Completed
                                    @elseif($row->order_status == '2')
                                        cancelled
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection