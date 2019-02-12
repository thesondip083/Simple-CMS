<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!--added for pop up notification by sondip-->
    <script src="{{ asset('js/toastr.min.js') }}"></script>









    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--ADDED CSS BY SONDIP FOR POPUP NOTIFICATION-->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
  

  <!--summernote for style-->

  @yield('styles')

     

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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

        
        
                <div class="container">
                    <div class="row">
                        <!--only the authenticated user can see the menu-->
                        @if(Auth::check())

                            <div class="col-lg-4">
                                
                                <ul class="list-group">

                                    <li class="list-group-item list-group-item-success">
                                        <a href="{{route('home')}}">Home</a>
                                    </li>

                                    <li class="list-group-item list-group-item-primary">
                                        <a href="{{route('user.profile')}}">My profile</a>
                                    </li>

                                     <li class="list-group-item list-group-item-secondary">
                                        
                                        <a href="{{route('category.create')}}">Create a New Category</a>
                                    </li>
                                    
                                    <li class="list-group-item list-group-item-info">
                                        <!--for showing the categories-->
                                        <a href="{{route('category.index')}}">All Categories</a>
                                    </li>

                                    <li class="list-group-item list-group-item-secondary">
                                        
                                        <a href="{{route('post.create')}}">Create a New post</a>
                                    </li>





                                    <li class="list-group-item list-group-item-info">
                                        <!--for showing the posts-->
                                        <a href="{{route('post.index')}}">All Posts</a>
                                    </li>


                                    <li class="list-group-item list-group-item-secondary">
                                        
                                        <a href="{{route('tag.create')}}">Create Tag</a>
                                    </li>

                                    <li class="list-group-item list-group-item-info">
                                        
                                        <a href="{{route('tag.index')}}">All Tags</a>
                                    </li>
                                    
                                    
                                    @if(Auth::user()->admin)
                                  <li class="list-group-item list-group-item-warning">

                                        <a href="{{route('user.index')}}">Users</a>
                                    </li>

                                    <li class="list-group-item list-group-item-warning">
                                        
                                        <a href="{{route('user.create')}}">Add User</a>
                                    </li>

                                    <li class="list-group-item list-group-item-secondary">
                                        
                                        <a href="{{route('setting')}}">Setting</a>
                                    </li>

                                    @endif

                                    <li class="list-group-item list-group-item-danger">
                                        
                                        <a href="{{route('post.trash')}}">Trashed Posts</a>
                                    </li>

                                </ul>
                            </div>
                             @endif

                             
                            <div class="col-lg-8">
                               
                                  @yield('content')

                            </div>

                        
                        

                       
                    </div>
                </div>
        
    </div>

   <script>
        @if(Session::has('msg'))
           toastr.success("{{Session::get('msg')}}");
        @endif
        


        @if(Session::has('info'))
           toastr.info("{{Session::get('info')}}");
        @endif   


         @if(Session::has('del_msg'))
           toastr.options.closeButton= true
           toastr.warning("{{Session::get('del_msg')}}");

        @endif
    </script>

    @yield('scripts')
    
</body>
</html>
