@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Staff</h4>
                    <a href="{{ route('dashboard.staffs.index') }}" class="btn btn-sm btn-primary"> 
                        <span class="fa fa-list"></span> Staffs</a>

                </div>
                
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" action="{{ route('dashboard.staffs.create') }}">
                            @csrf
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Surname</label>
                                    <input type="text" name="surname" value="{{old('surname')}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" value="{{old('firstname')}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Othername</label>
                                    <input type="text" name="othername" value="{{old('othername')}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">--Select--</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" value="{{old('nationality')}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>State of origin</label>
                                    <select name="state" id="" class="form-control">
                                        <option value="">--Select--</option>
                                        @foreach ($states as $state)
                                            <option value="{{$state->id}}">{{$state->state}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>LGA</label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control">
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