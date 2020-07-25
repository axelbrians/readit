@extends('layouts.app')

@section('content')
        
            <!-- <div class="content">
                <div class="title m-b-md">
                    {{config('app.name')}}
                </div>
            </div>
        </div> -->
<div class="container" style="height:70vh;">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1 style="font-size: 4rem;" class="mb-0 mt-5">
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
@endsection