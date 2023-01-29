@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create New Grade</h4>
                    <a href="{{ route('dashboard.grades.index') }}" class="btn btn-sm btn-primary">view grades</a>

                </div>
                
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" action="{{ route('dashboard.grades.create') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Grade</label>
                                    <input type="text" name="grade" class="form-control" placeholder="A">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Minimum</label>
                                    <input type="text" name="min" class="form-control" placeholder="70">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Maximum</label>
                                    <input type="text" name="max" class="form-control" placeholder="100">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"> <span class="fa fa-plus"></span> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection