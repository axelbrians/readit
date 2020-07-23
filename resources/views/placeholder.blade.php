
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mystyle.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <script>
      function load()
      {
         document.frm1.submit()
      }
      </script>
</head>
<body onload="load()">
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container">


            <a class="navbar-brand" href="{{ route('home') }}">
                
                    <i class="fa fa-home"></i>
                    {{ config('app.name', 'Readit') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    

                                    <a class="dropdown-item" href="{{ route('userquestion') }}">
                                        {{ __('My Question') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('useranswer') }}">
                                        {{ __('My Answer') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
   

   <form action="{{ route('thread') }}" method = "POST" id="frm1" name="frm1">
      @csrf
      <input type="hidden" name ="id" value="{{ $id_question }}">
   </form>
   <main class="py-4">
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


   </main>
   <footer>
      <div class="footer w-100">

      </div>
      <div class="copyright w-100">
          <center>&copy; 2020 ReadIt. Proudly made with love.</center>
      </div>
  </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
</body>
