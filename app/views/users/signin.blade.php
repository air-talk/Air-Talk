@extends('layouts.master')
@section('head')
<title>Sign In</title>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 well col-md-offset-3">
        	<h3>Signin</h3>
            {{ Form::open(array('action' => 'UsersController@doSignin')) }}
                @include('users.partials.login_form')
                <button class="btn btn-primary btn-block"> Submit </button>
            {{Form::close()}}
        </div>
    </div>
</div>
@stop