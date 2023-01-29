@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Term</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" action="{{ route('dashboard.terms.update', $term->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Term</label>
                                    <input type="text" name="name" class="form-control" placeholder="First Term" value="{{ $term->name }}">
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