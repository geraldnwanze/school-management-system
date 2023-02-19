@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">School Profile</h4>

                </div>
                
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" action="{{route('dashboard.school.profile')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Reg No. format</label>
                                    <input type="text" name="regNo" value="{{old('regNo')}}" class="form-control" placeholder="School Initial/year/regNo.">
                                    <span class="text-success"> NB: You can rearrange student registration no. format</span>
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