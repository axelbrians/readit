@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{ route('update_reply') }}">
    @method('PUT')
    @csrf
    <input type="hidden" class="form-control" name ="id" value="{{ $answer->id }}">
    <input type="hidden" class="form-control" name ="question_id" value="{{ $answer->question_id }}">
    <div class="form-group">
        <label for="formGroupExampleInput2">Description</label>
        <input type="text" class="form-control" name="the_answer" placeholder="Another input" value="{{ $answer->the_answer }}">
    </div>
    <button class="btn btn-warning">
        {{ __('Update') }}
    </button>

</form>
</div>

@endsection