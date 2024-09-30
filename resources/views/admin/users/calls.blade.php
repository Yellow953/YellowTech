@extends('admin.layouts.app')

@section('title', 'users')

@section('sub-title', 'calls')

@section('content')
<div class="row">
    <div class="col-md-6">
        <section class="content content-center m-0">
            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="my-0 mb-3">Client Call History</h2>

                    <div class="box-body">
                        @forelse ($calls as $call)
                        <div class="log">
                            <p>
                                {{ ucwords($call->staff->name) }} called {{ ucwords($user->name) }} at {{
                                $call->call_time }} with response of {{ $call->response }}
                                @if ($call->reschedule)
                                and he rescheduled to {{ $call->reschedule_time }}
                                @endif
                            </p>
                        </div>
                        @empty
                        <div class="log">
                            <p class="text-center"> No History for this Client yet ...</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-6">
        <section class="content content-center m-0">
            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="my-0 mb-3">Call Client</h2>

                    <div class="box-body">
                        <form method="POST" action="{{ route('users.calls.create', $user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="response">Response *</label>
                                        <select name="response" id="response" class="form-control" required>
                                            <option value=""></option>
                                            @foreach (Helper::get_call_responses() as $response)
                                            <option value="{{ $response }}" {{ old('response')==$response ? 'selected'
                                                : '' }}>{{
                                                ucwords($response) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="call_time">Call Time *</label>
                                        <input type="datetime-local" name="call_time" class="form-control"
                                            id="call_time" value="{{ old('calltime') ?? date('Y-m-d H:i') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reschedule">Reschedule</label>
                                        <input type="checkbox" name="reschedule" id="reschedule" {{ old('reschedule')
                                            ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reschedule_time">Reschedule Time</label>
                                        <input type="datetime-local" name="reschedule_time" class="form-control"
                                            id="reschedule_time" value="{{ old('reschedule_time') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="notes">Notes</label>
                                        <textarea name="notes" rows="5" class="form-control" id="notes"
                                            placeholder="Enter Notes">{{ old('notes') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-custom">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection