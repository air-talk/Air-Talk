@extends('layouts.master')
@section('head')
<title>Sign Up</title>
@stop
@section('content')
<div class="well" id="form">
    {{ Form::open(array('action' => 'UsersController@store')) }}
        @include('users.partials.create_user_form')
    {{Form::close()}}
</div>
@stop