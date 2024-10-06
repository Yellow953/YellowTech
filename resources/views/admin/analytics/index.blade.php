@extends('admin.layouts.app')

@section('title', 'analytics')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Daily Views</h3>
                </div>
                <div class="box-body">
                    <canvas id="areaChart" height="250"></canvas>
                </div>
            </div>

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Device/Browser</h3>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" height="250"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Daily Views</h3>
                </div>
                <div class="box-body">
                    <canvas id="lineChart" height="250"></canvas>
                </div>
            </div>

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Location</h3>
                </div>
                <div class="box-body">
                    <canvas id="barChart" height="230"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
    var uniqueVisits = @json($uniqueVisits);
    var topBrowsers = @json($topBrowsers);
    var topLocations = @json($topLocations);
</script>
