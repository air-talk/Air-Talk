@extends('layouts.master')
@section('head')
<title>Edit Profile</title>
@stop
@section('content')
    <h1>Edit User Profile</h1>
    <div class="well col-md-8 col-md-offset-2">
        {{ Form::model($user,array('action' => array('UsersController@update', $user->id), 'method' => 'PUT')) }}
            @include('users.partials.user-edit-form')
        {{ Form::close() }}
    </div>
@stop