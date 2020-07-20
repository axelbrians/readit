@extends('layouts.app')

@section('content')

{{-- <p>{{$id_question}}</p> --}}
<div class="container">
<form method="POST" action="{{ route('reply') }}">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" name ="the_answer" placeholder="Reply box">
        <input type="hidden" name="id_question" value="{{ $id_question }}">
        
    </div>

    <button class="btn btn-primary">
        {{ __('Submit') }}
    </button>

</form>
</div>

@endsection