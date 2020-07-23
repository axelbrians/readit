@extends('layouts.app')

@section('content')

<!-- Title Bar + Mini-Info -->
<div class="container mt-4 mb-3">
    <div class="row justify-content-start">
        <div class="col-md-12" style="padding-left: 2rem;">
            <h1>{{ $questions->title_question }}<span style="color: #B8B8B8;"> #{{ sprintf('%06d', $questions->id) }}</span></h1>
            Posted by <a href="javascript:void(0)">{{ $questions->name }}</a> | Last edit {{ Carbon\Carbon::parse($questions->updated_at)->timezone("Asia/Jakarta")->format('M d, Y') }} at {{ Carbon\Carbon::parse($questions->updated_at)->timezone("Asia/Jakarta")->format('H:i') }} |
                @if ($count > 1)
                    {{ $count }} replies
                @else
                    {{ $count }} reply
                @endif
        </div>
    </div>
</div>

<!-- Fetching question -->
<div class="container">
    <div class="row align-items-start">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="forum-content user-detail">
                        <div class="container">
                            <center><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-thumbnail" alt="avatar" style="width: 7em;"></center>
                        </div>
                        <div class="mt-2">
                            <a href="javascript:void(0)"><center>{{ $questions->name }}</center></a>
                        </div>
                        <div>Member since <strong>{{ Carbon\Carbon::parse($questions->user_created_at)->timezone("Asia/Jakarta")->format('M d, Y') }}</strong></div>
                    </div>
                    <div class="forum-content content-detail">
                        <div style="font-size: .7rem;">
                            Edited {{ Carbon\Carbon::parse($questions->updated_at)->timezone("Asia/Jakarta")->format('M d, Y') }}
                        </div>
                        <hr class="w-100">
                        <div style="font-size: 1.1rem;">
                            {{ $questions->detail_question }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Fetching all answers data retrieved from HomeController@index --}}
@foreach ($answers as $answer)
<div class="container">
    <div class="row align-items-start">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="forum-content user-detail">
                        <div class="container">
                            <center><img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-thumbnail" alt="avatar" style="width: 7em;"></center>
                        </div>
                        <div class="mt-2">
                            <a href="javascript:void(0)" data-abc="true"><center>{{ $answer->name }}</center></a>
                        </div>
                        <div>Member since <strong>{{ Carbon\Carbon::parse($answer->user_created_at)->timezone("Asia/Jakarta")->format('M d, Y') }}</strong></div>
                    </div>
                    <div class="forum-content content-detail">
                        <div class="d-flex justify-content-between" style="font-size: .7rem;">
                            <div>
                                Edited {{ Carbon\Carbon::parse($answer->updated_at)->timezone("Asia/Jakarta")->format('M d, Y') }}
                            </div>
                            <div>
                                #{{ $loop->iteration }}
                            </div>
                        </div>
                        <hr class="w-100">
                        <div style="font-size: 1.1rem;">
                            {{ $answer->the_answer }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form method="POST" action="{{ route('reply') }}">
                            @csrf
                            <div class="form-group">
                                <label for="the_answer" style="font-size: 1.5rem;">Your Answer</label>
                                <textarea class="form-control" name="the_answer" id="the_answer" cols="30" rows="8" placeholder="Your comment here" style="resize: none;"></textarea>
                                <input type="hidden" name="id_question" value="{{ $questions->id }}">
                            </div>
                        
                            <button class="btn btn-primary">
                                {{ __('Post Your Answer') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection