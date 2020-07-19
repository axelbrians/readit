@extends('layouts.app')

@section('content')


<div class="container">
<form method="POST" action="{{ route('ask') }}">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" name ="title_question" placeholder="Example input">
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Description</label>
        <input type="text" class="form-control" name="detail_question" placeholder="Another input">
    </div>

    <button class="btn btn-primary">
        {{ __('Submit') }}
    </button>

</form>
</div>

@endsection