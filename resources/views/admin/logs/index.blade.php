@extends('admin.layouts.app')

@section('title', 'logs')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('logs') }}" method="get" enctype="multipart/form-data" class="filter-form">
                <div class="input-group input-group-outline">
                    <div class="w-100">
                        <label for="text">Text</label>
                        <div>
                            <input type="text" class="form-control" name="text" placeholder="Text"
                                value="{{request()->query('text')}}">
                        </div>
                    </div>
                </div>
                <div class="input-group input-group-outline">
                    <div class="w-100">
                        <label for="startDate">Start Date</label>
                        <div>
                            <input type="date" class="form-control" name="startDate"
                                value="{{request()->query('startDate')}}">
                        </div>
                    </div>
                </div>
                <div class="input-group input-group-outline">
                    <div class="w-100">
                        <label for="endDate">End Date</label>
                        <div>
                            <input type="date" class="form-control" name="endDate"
                                value="{{request()->query('endDate')}}">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-around mt-3">
                    <button type="reset" class="btn btn-secondary py-2 px-3 mx-2 my-auto text-dark">reset</button>
                    <button type="submit" class="btn btn-info py-2 px-3 mx-2 my-auto text-dark">apply</button>
                </div>
            </form>
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Logs Table</h3>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    @forelse($logs as $log)
                    <div class="log">
                        <p> {{$log->text}}</p>
                    </div>
                    @empty
                    <div class="log">
                        <p class="text-center">No Data Yet ...</p>
                    </div>
                    @endforelse

                    <div class="pagination">
                        <p class="text-center">{{$logs->links()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection