@extends('admin.layouts.app')

@section('title', 'analytics')

@section('content')
<section class="content">
    <!-- Right side column. Contains the navbar and content of the page -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Area Chart</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="areaChart" height="250"></canvas>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- DONUT CHART -->
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Donut Chart</h3>
                    </div>
                    <div class="box-body">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="250"></canvas>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Line Chart</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="lineChart" height="250"></canvas>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Bar Chart</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="barChart" height="230"></canvas>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (RIGHT) -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</section>
@endsection
<script>
var uniqueVisits = @json($uniqueVisits);
var topBrowsers = @json($topBrowsers);
var topLocations = @json($topLocations);
</script>

