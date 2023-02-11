@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Staff</h4>
                    <a href="{{ route('dashboard.staffs.index') }}" class="btn btn-sm btn-primary"> 
                        <span class="fa fa-list"></span> Staffs</a>

                </div>
                
                <div class="card-body">
                    <div class="basic-form">
                        <form method="POST" action="{{ route('dashboard.staffs.update', [$staff->id]) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Surname</label>
                                    <input type="text" name="surname" value="{{old('surname', $staff->surname)}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" value="{{old('firstname', $staff->firstname)}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Othername</label>
                                    <input type="text" name="othername" value="{{old('othername', $staff->othername)}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{old('email', $staff->email)}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">--Select--</option>
                                        <option value="male" {{$staff->gender == 'male' ? 'selected' : ''}}>Male</option>
                                        <option value="female" {{$staff->gender == 'female' ? 'selected' : ''}}>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Phone</label>
                                    <input type="text" name="phone_number" value="{{old('phone_number', $staff->phone_number)}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" value="{{old('nationality', $staff->nationality)}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>State of origin</label>
                                    <select name="state_id" id="state" class="form-control">
                                        <option value="">--Select--</option>
                                        @foreach ($states as $state)
                                            <option value="{{$state->id}}" {{$staff->state_id == $state->id ? 'selected' : ''}}>
                                                {{$state->state}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>LGA</label>
                                    <select name="lga_id" id="lga" required class="form-control">
                                        @if ($staff->lga !== '')
                                            @foreach ($lgas as $lga)
                                                <option value="{{$lga->id}}" {{$staff->lga_id == $lga->id ? 'selected' : ''}}>
                                                    {{$lga->lga}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary"> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#state').change(function (e) { 
                e.preventDefault();
                let state = e.target.value
                // console.log(e.target.value)
                $.ajax({
                    type: "GET",
                    url: `/get-lga/${state}`,
                    dataType: "Json",
                    success: function (response) {
                        if(response.statusCode == 200){
                            $('#lga').empty()
                            $('#lga').append('<option value="">Select LGA</option>')
                            $.each(response.data, function (item, value) { 
                                $('#lga').append(`<option value=${value.id}>${value.lga}</option>`)
                            });
                        }
                        // console.log(response)
                    }
                });

            });
        });
    </script>
@endsection