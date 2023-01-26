@extends('layouts.dashboard')
@section('content')


<div class="col-lg-8 offset-2">
    {{-- From here users that are not admin can create user --}}
    <h1>Create user</h1>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">User Details</h4>

            <div class="align-right">
                <a href="{{route('users')}}"> <button class="btn btn-primary"> <span class="fa fa-eye"></span> View users </button> </a>
            </div>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="firstName" class="form-control input-default " required placeholder="First Name *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastName" class="form-control input-default " required placeholder="Last Name *">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control input-default " required placeholder="Email *">
                    </div>
                    {{-- <div class="form-group">
                        <input type="password" name="password" class="form-control input-default " placeholder="password">
                    </div> --}}
                    <div class="form-group">
                        <select class="form-control" name="role" id="role" required>
                            <option value=""> --Select User Role-- </option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->rolename}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="country" id="country" class="form-control input-default">
                            <option>
                                -- Select Country --
                            </option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="state" id="state" class="form-control input-default">
                            <option>
                                --Select State--
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lga" class="form-control input-default " placeholder="LGA">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control input-default " required placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="">User image</label>
                        <input type="file" name="userImage" class="form-control input-default ">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script>
      $(document).ready(function() {
        $('#country').change(function() {
            let countryId = this.value;
            // console.log(countryId)
            $.ajax({
                type: "GET",
                url: `states/${countryId}`,
                dataType: "json",
                success: function(data) {
                    $('select[name="state"]').empty();
                    $.each(data.states, function(key, value) {
                        $('select[name="state"]').append(
                            `<option value='${value.name}'> ${value.name} </option>`
                        )
                    });
                }
            });
        })
      })
</script>