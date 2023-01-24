@extends('layouts.auth')
@section('content')

<div class="authincation h-100">
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h2 class="text-center mb-3"> <span class="fa fa-home" style="font-size:60px;"></span> Property Manager</h2>
                                <h4 class="text-center mb-4"> <span class="fa fa-lock"></span> Change Password</h4>
                                <form action="{{route('updateNewPwd')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>Password</strong></label>
                                        <input type="password" class="form-control" name="password" placeholder="New-Password">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Confirm Password</strong></label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Retype-Password">
                                    </div>
                                    <input type="hidden" value="{{$email}}" name="email">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block"> <span class="fa fa-arrow-up"></span> Update password</button>
                                    </div>
                                </form>
                                {{-- <div class=" text-center new-account mt-3">
                                    <p>Don't have an account? <a class="text-primary" href="{{route('register')}}">Sign up</a></p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()