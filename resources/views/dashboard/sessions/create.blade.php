@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create New Session</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" action="{{ route('dashboard.sessions.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>From</label>
                                    <input type="text" name="from" class="form-control" placeholder="{{ date('Y') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>To</label>
                                    <input type="text" name="to" class="form-control" placeholder="{{ date('Y') + 1 }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection