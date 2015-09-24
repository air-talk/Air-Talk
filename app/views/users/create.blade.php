@extends('layouts.master')
@section('head')
<title>Sign Up</title>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 well col-md-offset-3">
			<h3 class="thin text-center">Create a free account</h3>
		    {{ Form::open(array('action' => 'UsersController@store')) }}
		        @include('users.partials.create_user_form')
		    {{Form::close()}}
		</div>
	</div>
</div>
@stop