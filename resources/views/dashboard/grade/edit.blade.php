@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Grade</h4>
                    <a href="{{ route('dashboard.grades.index') }}" class="btn btn-sm btn-primary">view grades</a>

                </div>
                
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" action="{{ route('dashboard.grades.edit', $grade->id) }}">
                            @csrf @method("PATCH")
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Grade</label>
                                    <input type="text" name="grade" value="{{$grade->grade}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Minimum</label>
                                    <input type="text" name="min" value="{{$grade->min}}" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Maximum</label>
                                    <input type="text" name="max" value="{{$grade->max}}" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"> <span class="fa fa-plus"></span> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection