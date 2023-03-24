@extends('layouts.master')


@section('title','List report')
@section('report.index' , 'active')

@section('css')
  
@endsection

@section('js')

@endsection

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
    <i class="fas fa-database"></i> &nbsp;Sale Report List
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Sale Report List : Checked, Date {{$date}}</li>
  </ol>
</section>
<!-- <section class="content-header">

    <div class="row input-daterange ">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
        </div>
        <div class="col-md-3">
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
        </div>
        <div class="col-md-3">
            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
        </div>
    </div>
</section> -->
<section class="content-header">
 
</section>
<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
  <div class="box">
      <div class="box-header">
        <!-- <div class="no-print">
            <a  href="" onclick="window.print()" target="_blank" class="btn btn-default"> Print</a>
            <a  href="" onclick="window.print()" target="_blank" class="btn btn-default">CSV</a>
            <a  href="" onclick="window.print()" target="_blank" class="btn btn-default">Excel</a>
        </div> -->
        <div class="box-body table-responsive">
            <table id="table_dashboard" class="table table-hover table-striped table-bordered">
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
                  <th width="5%"><a href="#">Order Date</a></th>
              </thead>
              <tbody>
                  
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
                          <td>
                              {{$row->created_at->format('d/m/Y')}}
                          </td>
                        </tr>
                  @endforeach
              </tbody>
            </table>
            <h5>Total Amount : {{ $sum }}</h5>
        </div>
      </div>
  </div>    
</section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
      $('#table_dashboard').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons:[
          {extend: 'copy'},
          {extend: 'csv'},
          {extend: 'excel', title: 'List Report'},
          {extend: 'pdf', title: 'List Report'},

          {extend: 'print', 
            customize: function (win){
              $(win.document.body).addClass('white-bg');
              $(win.document.body).css('font-size','12px');

              $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
            }}
        ]
      });
    });
  </script>
<!--   <script>
    $(document).ready(function() {
    /*      $('#table_dashboard').DataTable(); */

      $('.input-daterange').datepicker({
        todayBtn:'linked',
        format: "yyyy-mm-dd",
        autoclose: true,
      });

      function fetch_data(is_date_search, start_date='', end_date='')
      {
        var dataTable = $('#order_data').DataTable({
          "processing" : true,
          "serverSide" : true,
          "order" : [],
          "ajax" : {
              url:"fetch.php",
              type:"POST",
              data:{
                  is_date_search:is_date_search, start_date:start_date, end_date
              }
          }
        });
      }
    });
    
  </script> -->

<!-- <script>
  $(document).ready(function(){
    $('.input-daterange').datepicker({
      todayBtn:'linked',
      format:'yyyy-mm-dd',
      autoclose:true
    });

    load_data();

  function load_data(from_date = '', to_date = '')
  {
    $('#order_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url:'{{ route("searchFilter.index") }}',
      data:{from_date:from_date, to_date:to_date}
    },
    columns: [
          {
          data:'order_id',
          name:'order_id'
          },
          {
          data:'product_id',
          name:'product_id'
          },
          {
          data:'price',
          name:'price'
          },
          {
          data:'qty',
          name:'qty'
          },
          {
          data:'tax_amt',
          name:'tax_amt'
          }
    ]
    });
  }

  $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != '')
        {
            $('#order_table').DataTable().destroy();
            load_data(from_date, to_date);
        }
        else
        {
            alert('Both Date is required');
        }
      });

      $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#order_table').DataTable().destroy();
        load_data();
      });

  });
</script>
 -->
 
@endsection

