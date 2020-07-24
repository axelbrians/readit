@extends('layouts.app')

@section('content')

<div class="container">
<form method="POST" action="{{ route('update_thread') }}">
    @method('PUT')
    @csrf
    <input type="hidden" class="form-control" name ="id" placeholder="Example input" value="{{$question->id}}">
    <div class="form-group">
        <label for="title_question">Title</label>
        <input type="text" class="form-control" name ="title_question" id ="title_question" value="{{$question->title_question}}">
    </div>
    <div class="form-group">
        <label for="detail_question">Description</label>
        <input type="text" class="form-control" name="detail_question" id="detail_question" value="{{$question->detail_question}}">
    </div>
    <button class="btn btn-warning">
        {{ __('Update') }}
    </button>
</form>
</div>

@endsection