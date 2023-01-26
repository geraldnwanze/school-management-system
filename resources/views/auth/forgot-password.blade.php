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
                                @include('includes.dashboard-return-msg')
                                <h2 class="text-center mb-3"> <span class="fa fa-home" style="font-size:60px;"></span> Property Manager</h2>
                                
                                <h4 class="text-center mb-4">Forgot Password</h4>
                                <form action="{{route('forgotPwd')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>Email</strong></label>
                                        <input type="email" class="form-control" name="email" placeholder="hello@example.com">
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm"> <span class="fa fa-search"></span>Search</button>
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