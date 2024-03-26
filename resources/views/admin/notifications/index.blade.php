@extends('admin.layouts.app')

@section('title', 'notifications')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Notifications Table</h3>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    @forelse($notifications as $notification)
                    <div class="log">
                        <p> {{$notification}}</p>
                    </div>
                    @empty
                    <div class="log">
                        <p class="text-center">No Data Yet ...</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection