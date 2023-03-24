@extends('layouts.master')


@section('title','List order')
@section('order.index' , 'active')


@section('content')
<section class="content-header">
  <h1>
    <i class="fas fa-database"></i> &nbsp;Order Page
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Order Page</li>
  </ol>
</section>
<!-- <section class="content-header">

  <form action="report_inoformation" method="POST">
    @csrf
    <br>
      <div class="row">
        <div class="container-fluid">
          <div class="form-group row">
            <label for="date" class="col-form-label col-sm-2  text-right">Date of Today</label>
            <div class="col-sm-3  text-right">
              <input type="date" class="form-control input-sm" id="form" name="form" require>
            </div>
            <label for="date" class="col-form-label col-sm-2  text-right">Date of Last Day</label>
            <div class="col-sm-3  text-right">
              <input type="date" class="form-control input-sm" id="form" name="form" require>
            </div>
            <div class="col-sm-2">
                <button type="submit"  class="btn btn-primary btn-sm"><i class="fas fa-database"></i>&nbsp;Show Date</button>
            </div>
          </div>
        </div>
      </div>
  </form>
</section> -->

<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
  <div class="box">
      <div class="box-header">
        <div class="box-body table-responsive">
            <table id="table_dashboard" class="table table-hover table-striped table-bordered">
              <thead>
                <tr class="active">
                  <th width="10px">
                    <a href="#">Tracking No</a>
                  </th>
                  <th width="10px">
                    <a href="#">Customer Name</a>
                  </th>
                  <th width="10px">
                    <a href="#">Customer Phone</a>
                  </th>
                  <th width="10px">
                    <a href="#">Payment Mode</a>
                  </th>
                  <th width="10px">
                    <a href="#">Tracking Msg</a>
                  </th>
                  <th width="10px">
                    <a href="#">Status</a>
                  </th>
                  <th width="5%"><a href="#">Action</a></th>
                  <th width="5%"><a href="#">Proceed</a></th>
              </thead>
              <tbody>
                @foreach($orders as $row)
                  <tr>
                    <td>{{$row->tracking_no}}</td>
                    <td>{{$row->users->name .' '. $row->users->lname}}</td>
                    <td>{{$row->users->phone}}</td>
                    <td>{{$row->payment_mode}}</td>
                    <td>
                          @if($row->tracking_msg == 'Pending')
                              Pending
                          @elseif($row->tracking_msg == 'Packed')
                              Packed
                          @elseif($row->tracking_msg == 'Shipped')
                              Shipped
                          @elseif($row->tracking_msg == 'Delivered')
                            Delivered
                          @elseif($row->tracking_msg == '')
                            New
                          @endif
                    </td>
                    <td>
                          @if($row->order_status == '0')
                              Pending
                          @elseif($row->order_status == '1')
                              Completed
                          @elseif($row->order_status == '2')
                              cancelled
                          @endif
                    </td>
                    <td>
                      <div class="button_action">
                        <a class="btn btn-primary btn-detail" title="Detail Data" href="{{url('admin/order-view/'.$row->id)}}">VIEW</a>
                      </div>
                    </td>
                    <td>
                      <div class="button_action">
                        <a class="btn btn-success btn-detail" title="Detail Data" href="{{url('admin/order-proceed/'.$row->id)}}">PROCEED</a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>---</th>
                  <th>---</th>
                  <th>---</th>
                  <th>---</th>
                  <th>---</th>
                  <th>---</th>
                </tr>
              </tfoot>
            </table>
        </div>
      </div>
  </div>    
</section>

@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      $('#table_dashboard').DataTable();
    });
  </script>
@endsection
