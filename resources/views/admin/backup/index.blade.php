@extends('admin.layouts.app')

@section('title', 'backup')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="card p-4">
        <h2 class="text-center text-primary mb-4">Full Backup</h2>
        <div class="row my-2 ">
            <div class="col-md-6">
                <form action="{{ route('backup.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-row">
                        <input type="file" name="file" required class="input-field">
                        <button type="submit" class="btn btn-info mx-2 py-2 px-3">Import</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <a href="{{ route('backup.export') }}" class="text-center btn btn-info mx-2 py-2 px-3">
                    Export
                </a>
            </div>
        </div>
    </div>
</section>
@endsection