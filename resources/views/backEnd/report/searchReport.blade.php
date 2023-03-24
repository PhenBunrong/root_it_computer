@extends('layouts.master')


@section('title','List report')
@section('report.index' , 'active')


@section('content')

<section class="content-header">
 
    <div class="row">
        <div class="col-md-4">
            <div class="box box-info bg-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Search By Date</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box">
                    <div class="box-header">
                        <form action="{{route('check.reports')}}" method="POST">
                            @csrf
                            <label for="">Take A Date</label>
                            <input type="date" class="form-control" name="date" required="">
                            <br>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info bg-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Search By Month</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box">
                    <div class="box-header">
                        <form action="{{route('check.reports')}}" method="POST">
                            @csrf
                            <label for=""> Select Month</label>
                            <select name="month" class="form-control" id="">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <label for="">Select Year</label>
                            <select name="year" class="form-control" id="">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                            <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info bg-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fas fa-database"></i> &nbsp;Search By Years</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box">
                    <div class="box-header">
                        <form action="">
                            <label for="">Select Year</label>
                            <select name="year" class="form-control" id="">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                            <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

