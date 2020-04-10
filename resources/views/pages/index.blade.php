<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    
    
</head>
<body>
   <nav class="navbar navbar-expand-md navbar-dark customize-nav sticky-top shadow-sm">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>
   
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">
                  @guest
   
                  @else
                  <li class="nav-item"><a class="nav-link" href="/posts/create">Add New Post</a> </li>
                  @endguest
   
              </ul>
   
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="/">Home</a>
                  </li>
   
                  <li class="nav-item">
                      <a class="nav-link" href="/posts">Blog</a>
                  </li>
   
                  <li class="nav-item">
                      <a class="nav-link" href="/about">About</a>
                  </li>
                  
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
                              {{ Auth::user()->username }} <span class="caret"></span>
                          </a>
                      
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          
                              <a class="dropdown-item nav-dropdown" href="/dashboard">Dashboard
                              </a>
                              <a class="dropdown-item nav-dropdown" href="{{ route('logout') }}"
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
   
   <div class="my-jombotron">
      <div class="row">
         <div class="col-md-12 text-center welcome">
            <h1 class="text-light">Document your creative processes here on Emedia Blog</h1> 
            <a href="/register" class="btn btn-primary" id="my-btn1">Get Started</a>
            <a href="/posts" class="btn btn-primary" id="my-btn2">Explore</a>
         </div>
         
      </div>
   </div>
   
   <div class="container mt-3">
      <div class="row">
         @foreach ($posts as $post)
         <div class="col-md-3 mt-2">
            
               <div class="card">
                  <div class="view overlay">
                  <img src="/storage/cover_images/{{$post->cover_image}}" alt="" class="card-img-top" height="100">
                  </div>
            
                  <div class="card-body">
                  <a href="/posts/{{$post->id}}"><h4 class="card-title">{{$post->title}}</h4></a>
                  <small>written by {{$post->user->name}} on {{ $post->created_at }}</small>
                  </div>
               </div>
            
         </div>
         @endforeach
      </div>
      
      
   </div>
   
</body>
</html>