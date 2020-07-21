@extends('layouts.app')

@section('content')


<div class="container">
<form method="POST" action="{{ route('qupdate') }}">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" name ="title_question" placeholder="Example input" value="{{$question->title_question}}">
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Description</label>
        <input type="text" class="form-control" name="detail_question" placeholder="Another input" value="{{$question->detail_question}}">
    </div>

    <button class="btn btn-warning">
        {{ __('Update') }}
    </button>

</form>
</div>

@endsection