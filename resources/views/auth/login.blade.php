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
                                <h2 class="text-center mb-3"> <span class="fa fa-graduation-cap" style="font-size:60px;"></span> School Manager</h2>
                                <h4 class="text-center mb-4"> <span class="fa fa-key"></span> Sign in</h4>
                                
                                
                                <form action="{{route('auth.login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>UserName/Email</strong></label>
                                        <input type="text" class="form-control" name="username" placeholder="{{ old('username')}}">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Password</strong></label>
                                        <input type="password" class="form-control" name="password" placeholder="****">
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Sign me in</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()