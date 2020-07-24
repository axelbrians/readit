@extends('layouts.app')

@section('content')

<h1>Hello, {{ $myDetails->name }}</h1>
<h2>My Questions</h2>

@foreach ($myQuestion as $$myQuestion)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card card-hoverable mb-4">
                <div class="card-body">
                    
                    <a style="text-decoration: none; color: #000;" class="stretched-link" href="{{ route('thread', $$myQuestion->id) }}">

                    {{-- script for clicking whole a tag, still not working though--}}
                    {{-- onclick="event.preventDefault();
                    document.getElementById('view-thread').submit();" --}}

                        <div class="media flex-wrap w-100 align-items-center">
                            <div class="media-body truncate">
                                <h2><strong>{{ $$myQuestion->title_question }}</strong></h2>
                                <div class="text-muted">
                                    <a href="javascript:void(0)"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ $$myQuestion->name }}</a> | 
                                    Posted on {{ Carbon\Carbon::parse($$myQuestion->created_at)->timezone("Asia/Jakarta")->format('M d, Y \a\t H:i') }}
                                </div>
                                <div class="text-muted">
                                    <div>Member since <strong>{{ Carbon\Carbon::parse($$myQuestion->user_created_at)->timezone("Asia/Jakarta")->format('M d, Y') }}</strong></div>
                                </div>
                            </div>
                        </div>

                        {{-- <form id="view-thread" action="{{ route('thread') }}" method="POST" style="display: none;">
                            <input type="hidden" name="id" value="{{ $$myQuestion->id }}">
                            @csrf
                        </form> --}}                
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endforeach

@endsection