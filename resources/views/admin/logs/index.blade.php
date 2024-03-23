@extends('admin.layouts.app')

@section('title', 'logs')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Logs Table</h3>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <td>
                                    <div class="d-flex flex-column">

                                        <p>  {{$log->text}}</p>
                                        <span class="text-secondary text-xs font-weight-bold">{{ $log->created_at }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection
