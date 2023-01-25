@extends('layouts.dashboard')
@section('content')

    <h1> <i>{{ auth()->user()->role }}</i> Welcome to my School Manager</h1>
    
@endsection