<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/airtalk_custom.css">
    <link rel="shortcut icon" href="/images/vintage-airplane.ico">
    <title>Airtalk | Practice perfecting your radio technique. Free! </title>
    <link href='https://fonts.googleapis.com/css?family=Nunito:300' rel='stylesheet' type='text/css'>
    @yield('head')
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                @if (Auth::check())
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                @endif
                <a class="navbar-brand" href="{{{action('HomeController@showWelcome')}}}"><img src="/images/airtalk_white_small.png" alt="airtalk logo"></a>
            </div>
                @if (Auth::check()) 
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li {{ Request::is('questions')? 'class="active"': '' }}><a href="{{{action('QuestionsController@index')}}}">Questions</a></li>
                        <li {{ Request::is('flashcards')? 'class="active"': '' }}><a href="{{{action('FlashcardsController@index')}}}">Vocab</a></li>
                        <li {{ Request::is('planes')? 'class="active"': '' }}><a href="{{{action('FlashcardsController@planesindex')}}}">Planes</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="btn" href="{{{ action('UsersController@index') }}}">{{{ Auth::user()->email }}}</a></li>
                        <li><a class="btn" href="{{{ action('UsersController@doSignout') }}}">Logout</a></li>
                    </ul>
                </div>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Signin<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    {{ Form::open(array('action' => 'UsersController@doSignin')) }}
                                    <div class="top-margin">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{{ Input::old('email') }}}">
                                    </div>
                                    <div class="top-margin">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{{ Input::old('password') }}}">
                                    </div>
                                    <a href="">Forgot password?</a>
                                    <br>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    {{ Form::close() }}
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="row">
                <div>
                    @if (Session::has('successMessage'))
                    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
                    @endif
                    @if (Session::has('errorMessage'))
                    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
                    @endif
                    @if($errors->has())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $key=> $error)
                            <li>{{{$error}}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>

    </main>
    <footer>

    </footer>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @yield('script')
</body>
</html>
