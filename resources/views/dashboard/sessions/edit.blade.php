@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Session</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" action="{{ route('dashboard.sessions.update', $session->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>From</label>
                                    <input type="text" name="from" class="form-control" placeholder="{{ date('Y') }}" value="{{ $session->from }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>To</label>
                                    <input type="text" name="to" class="form-control" placeholder="{{ date('Y') + 1 }}" value="{{ $session->to }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection