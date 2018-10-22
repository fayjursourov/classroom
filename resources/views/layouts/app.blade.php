

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
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">






</head>


<body>
@php
        use Illuminate\Support\Facades\Session;
        use App\Http\Controllers\RoleController;

        if (isset(Auth::user()->email) != null)
        {
            $result_role = RoleController::show(Auth::user()->email);
        }

@endphp



    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Classroom') }}
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

                        @if(isset(Auth::user()->email) && Auth::user()->email == $result_role->email && $result_role->role == 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add Users</a>
                            </li>
                        @endif


                    @if(isset(Auth::user()->email))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Subject</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                @if(isset(Auth::user()->email))
                                    @if(Auth::user()->email == $result_role->email && $result_role->role == 'teacher')
                                        <a class="dropdown-item" href="{{ url('/subject/insert') }}">Create Subject</a>
                                        <a class="dropdown-item" href="{{ url('/subject') }}">Subject list</a>
                                    @endif

                                    @if(isset(Auth::user()->email) && Auth::user()->email == $result_role->email && $result_role->role == 'student')
                                            <a class="dropdown-item" href="{{ url('/subject') }}">Subject list</a>
                                    @endif
                                @endif

                            </div>
                        </li>
                        @endif



                        @if(isset(Auth::user()->email))

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Attendance</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                @if(Auth::user()->email == $result_role->email && $result_role->role == 'teacher')

                                    <a class="dropdown-item" href="{{ url('/attendance/insert') }}">Create Attendance</a>
                                    <a class="dropdown-item" href="{{ url('/attendance/list') }}">Created Attendance list</a>
                                    <a class="dropdown-item" href="{{ url('/st-attendance/list') }}">Student's Attendance list</a>

                                @endif

                                @if(Auth::user()->email == $result_role->email && $result_role->role == 'student')
                                    <a class="dropdown-item" href="{{ url('/st-attendance/select') }}">Add Attendance</a>
                                @endif

                            </div>
                        </li>

                        @endif

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}<span class="caret"></span>
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

            @yield('content')
    </div>






    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>&copy; Classroom</p>
        </div>
    </footer>


    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
</body>
</html>
