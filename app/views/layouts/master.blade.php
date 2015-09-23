<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/airtalk_custom.css">
    @yield('head')
</head>
<body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="" alt="airtalk logo"></a>
            </div>
            <div id="navbar" class="pull-left collapse navbar-collapse">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <main>
        <div class="container">
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
            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            @yield('script')
        <footer>

        </footer>
    </body>
    </html>
