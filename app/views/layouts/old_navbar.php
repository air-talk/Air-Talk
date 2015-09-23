<header>
    <!-- Second navbar for sign in -->
    <nav class="nav navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="black">AIR</span><span class="blue">Talk</span></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav nav-pills navbar-right">
            <li><a href="{{{action('HomeController@showWelcome')}}}">Home</a></li>
            <li><a href="{{{action('FlashcardsController@index')}}}">Flash Cards</a></li>
            <li><a href="{{{action('QuestionsController@index')}}}">Quizs</a></li>
            @if(Auth::check())
                <li>
                  <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse4" aria-expanded="false" aria-controls="nav-collapse4">Profile <i class=""></i> </a>
                </li>
                <li>
                  <a class="btn btn-default btn-outline btn-circle collapsed" href="{{{action('UsersController@doSignout')}}}" aria-expanded="false" >Sign Out</a>
                </li>
            @else
                <li>
                  <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign In</a>
                </li>
                <li>
                  <a id="signup" class="btn btn-default btn-outline btn-circle collapsed" href="{{{action('UsersController@create')}}}" aria-expanded="false">Sign Up</a>
                </li>
            @endif
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <div class="navbar-form navbar-right form-inline">
                {{ Form::open(array('action' => 'UsersController@doSignin')) }}
                    @include('users.partials.login_form')
                    <button class="btn btn-primary btn-sm"> Submit </button>
                {{Form::close()}}
            </div>
          </div>
          <ul class="collapse nav navbar-nav nav-collapse slide-down" role="search" id="nav-collapse4">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-circle" src="https://pbs.twimg.com/profile_images/588909533428322304/Gxuyp46N.jpg" alt="maridlcrmn" width="20" /> @if (Auth::user()) {{{ Auth::user()->first_name }}} @endif<span class="caret"></span></a>
              @if (Auth::user())
              <ul class="dropdown-menu">
                <li><a href="{{{action('UsersController@index')}}}">My profile</a></li>
                <li><a href="{{{action ('UsersController@edit', Auth::user()->id)}}}">Edit</a></li>
                <li class="divider"></li>
                <li><a href="#">Logout</a></li>
              </ul>
              @endif
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</header>