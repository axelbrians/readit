@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <img src="{{ URL::to('/') }}/images/logo.png" alt="logo" style="width: 12rem;" class="mt-5 mb-1">
            <h1 style="font-size: 4rem;" class="mb-0">
                Welcome to {{config('app.name')}} 
            </h1>
            <h1 style="font-size: 8rem;" class="mb-5">
                <strong>Commander!</strong>
            </h1>
            <hr>
            <h1 class="mt-5 mb-1">
                Join us to discuss anything!
            </h1>
            <h3 class="mb-5">
                (yes, absolutely anything!)
            </h3>
            <a href="{{ route('login') }}" class="btn btn-success btn-lg">Login</a> or <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Register</a>
        </div>
    </div>
</div>
<script>
    var currentTitle = 'Welcome to Readit!';
</script>
@endsection