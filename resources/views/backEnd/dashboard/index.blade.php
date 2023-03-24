@extends('layouts.master')

@section('tilte', 'Dashboard')
@section('Dashboard' , 'active')

@section('content')
<?php

    $current_month = date('M');
    $last_month = date('M',strtotime("-1 month"));
    $last_to_last_month = date('M',strtotime("-2 month"));
    $last_to_3_month = date('M',strtotime("-3 month"));
    $last_to_4_month = date('M',strtotime("-4 month"));
    $last_to_5_month = date('M',strtotime("-5 month"));
    $last_to_6_month = date('M',strtotime("-6 month"));
    $last_to_7_month = date('M',strtotime("-7 month"));
    $last_to_8_month = date('M',strtotime("-8 month"));
    $last_to_9_month = date('M',strtotime("-9 month"));
    $last_to_10_month = date('M',strtotime("-10 month"));
    $last_to_11_month = date('M',strtotime("-11 month"));

  $dataPoints = array(

    
    array("y" => $last_to_6_month_orders, "label" => $last_to_6_month),
    array("y" => $last_to_5_month_orders, "label" => $last_to_5_month),
    array("y" => $last_to_4_month_orders, "label" => $last_to_4_month),
    array("y" => $last_to_3_month_orders, "label" => $last_to_3_month),
    array("y" => $last_to_last_month_orders, "label" => $last_to_last_month),
    array("y" => $last_month_orders, "label" => $last_month),
    array("y" => $current_month_orders, "label" => $current_month),/* 
    array("y" => $last_to_11_month_orders, "label" => $last_to_11_month),
    array("y" => $last_to_10_month_orders, "label" => $last_to_10_month),
    array("y" => $last_to_9_month_orders, "label" => $last_to_9_month),
    array("y" => $last_to_8_month_orders, "label" => $last_to_8_month),
    array("y" => $last_to_7_month_orders, "label" => $last_to_7_month), */
  );
  

  $dataUser = array(
    array("label"=> "Food + Drinks", "y"=> 590),
    array("label"=> "Activities and Entertainments", "y"=> 261),
    array("label"=> "Health and Fitness", "y"=> 158),
    array("label"=> "Shopping & Misc", "y"=> 72),
    array("label"=> "Transportation", "y"=> 191),
    array("label"=> "Rent", "y"=> 573),
    array("label"=> "Travel Insurance", "y"=> 126)
);

?>

        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6"  data-aos="zoom-in-up" data-aos-duration="1500">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <?php $orders=DB::table('orders')->get()->count(); ?>

                  <h3>
                      @if(isset($orders))
                          {{$orders}}
                      @else
                          0
                      @endif
                    
                  </h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6"  data-aos="zoom-in-up" data-aos-duration="1500">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <?php $categories=DB::table('categories')->get()->count(); ?>
                <h3>
                    @if(isset($categories))
                        {{$categories}}
                    @else
                        0
                    @endif
                  
                </h3>
                <p>Categories</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6" data-aos="zoom-in-up" data-aos-duration="1500">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <?php $product=DB::table('products')->get()->count(); ?>
                <h3>
                    @if(isset($product))
                        {{$product}}
                    @else
                        0
                    @endif
                  
                </h3>
                <p>Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6" data-aos="zoom-in-up" data-aos-duration="1500">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                <?php $users=DB::table('users')->get()->count(); ?>

                <h3>
                    @if(isset($users))
                        {{$users}}
                    @else
                        0
                    @endif
                  
                </h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('admin\register-user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom" data-aos="fade-right" data-aos-duration="1500">
                <div class="box">
                  <div class="box-header">
                  <div  class="chart tab-pane active" id="chartContainer" style="position: relative; height: 300px;"></div>
                  </div>
                </div>
              </div><!-- /.nav-tabs-custom -->

            </section>
          </div><!-- /.row (main row) -->
          <!-- <div class="row">
            <section class="col-lg-12 connectedSortable">
              <div class="nav-tabs-custom" data-aos="fade-left" data-aos-duration="1500">
                <div class="box">
                  <div class="box-header">
                  <div id="chartUser" style="height: 370px; width: 100%;"></div>
                  </div>
                </div>
              </div>
            </section>
          </div> -->

        </section><!-- /.content -->

@endsection

@section('scripts')
<script>
  window.onload = function () {
  
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title:{
      text: "Order Report"
    },
    axisY: {
      title: "",
      prefix: "Order "
    },
    data: [{
      type: "spline",
      markerSize: 5,
      xValueFormatString: "YYYY",
      yValueFormatString: "Order #,##0.##",
      xValueType: "dateTime",
      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
  });
  
  chart.render();
  
  var chartUser = new CanvasJS.Chart("chartUser", {
    animationEnabled: true,
    exportEnabled: true,
    title:{
      text: "User Report"
    },
    subtitles: [{
      text: ""
    }],
    data: [{
      type: "pie",
      showInLegend: "true",
      legendText: "{label}",
      indexLabelFontSize: 16,
      indexLabel: "{label} - #percent%",
      yValueFormatString: "฿#,##0",
      dataPoints: <?php echo json_encode($dataUser, JSON_NUMERIC_CHECK); ?>
    }]
  });
  chartUser.render();
  }

  
</script>

@endsection

