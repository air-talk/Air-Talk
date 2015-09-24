@extends('layouts.master')
@section('head')
@stop
@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="well">
	        	<h4 class="thin text-center">Welcome to Airtalk</h4>
	        	<div class="centered">
		        	<a class="btn btn-success center" href="{{{ action('UsersController@create') }}}">Get Started</a> 
	        	</div>
	        </div>
	    </div>
	</div>
@stop