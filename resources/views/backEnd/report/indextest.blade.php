@extends('layouts.master')


@section('title','List order')
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
    <i class="fas fa-database"></i> &nbsp;Order Page
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Order Page</li>
  </ol>
</section>
<section class="content-header">
    <div class="box-body">
      <form action="{{url('admin/reportSearch')}}" method="GET">
        <div class="row">
          <div class="col-md-4">
            <label for="">Form Date</label>
            <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){echo $_GET['from_date'];}else{}?>" class="form-control" placeholder="from Date">
          </div>
          <div class="col-md-4">
            <label for="">To Date</label>
            <input type="date" name="to_date"  value="<?php if(isset($_GET['to_date'])){echo $_GET['to_date'];}else{}?>" class="form-control" placeholder="To Date">
          </div>
          <div class="col-md-4">
            <label for="">Check</label><br>
            <button type="sumite" class="btn btn-primary">Filter User</button>
          </div>
        </div>
      </form>
    </div>
</section>
<section class="content-header">
 
</section>
<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
  <div class="box">
      <div class="box-header">
        <div class="no-print">
            <a  href="" onclick="window.print()" target="_blank" class="btn btn-default"> Print</a>
            <a  href="" onclick="window.print()" target="_blank" class="btn btn-default">CSV</a>
            <a  href="" onclick="window.print()" target="_blank" class="btn btn-default">Excel</a>
        </div>
        <div class="box-body table-responsive">
            <table id="order_table" class="table table-hover table-striped table-bordered">
              <thead>
                <tr class="active">
                  <th width="20%">
                    <a href="#">Product Name</a>
                  </th>
                  <th width="5%">
                    <a href="#">Sold Qty</a>
                  </th>
                  <th width="5%">
                    <a href="#">Sale Price</a>
                  </th>
                  <th width="5%">
                    <a href="#">Tax Amount</a>
                  </th>
                  <th width="5%"><a href="#">Grand Total</a></th>
              </thead>
              <tbody>
              @if($orders->isEmpty())
                    <tr>
                        <td>No Record Found!</td>
                    </tr>
                      
              @else  
                  @php $total = "0"; @endphp
                  
                  @foreach($orders as $row)

                      @php $total = $total + ($row->price * $row->qty) @endphp

                      @php   
                          $tax = $row->tax_amt;
                          $tax_total = ($total * $tax)/100;
                      @endphp
                      
                        <tr>
                          <td>{{$row->products->name}}</td>
                          <td class="text-center">{{$row->qty}}</td>
                          <td>$ {{number_format($row->price, 2)}}</td>
                          <td>
                              @if(isset($row->tax_amt))
                                  @php
                                      $tax = $row->tax_amt;
                                      $tax_total = ($total * $tax)/100;
                                  @endphp
                                  $ {{ number_format( $tax_total, 2) }}
                              @else
                                  0
                              @endif
                          </td>
                          <td>
                              @if(isset($row->tax_amt))
                                  @php $grandtotal = $tax_total + $total @endphp
                                  $ {{number_format($grandtotal, 2)}}
                              @else
                                  $ {{number_format($total, 2)}}
                              @endif
                          </td>
                        </tr>
                  @endforeach
              @endif
              </tbody>
              <tfoot class="no-print">
                <tr>
                  
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
  </div>    
</section>

@endsection

