@extends('layouts.master')
@section('head')
@stop
@section('content')
	<div class="container">
		<div class="row">
		    <div class="col-md-offset-1 col-md-6">
		        <div class="well">
		        	<h2>Aviation Vocabulary Learned</h2>
		        	<table class="table table-striped">
		        		<thead>
		        			<tr>
		        				<th>Word</th>
		        				{{-- Look into created_at column in correctAnswers table for last practiced--}}
		        				<th>Last practiced</th>
		        			</tr>
		        		</thead>
		        		<tbody>
		        			@foreach($flashcards as $flashcard)
		        			<tr>
		        				<td>{{$flashcard->front}}</td>
		        				{{-- change later --}}
		        				<td>{{$flashcard->created_at}}</td>
		        			</tr>
		        			@endforeach
		        		</tbody>
		        	</table>
		        </div>
		    </div>
		    <div class="col-md-4">
		        <div class="well">
					<button type="button" class="btn btn-primary btn-circle" aria-label="Left Align">
					  Practice Flashcards
					</button>
		        </div>
		    </div>
		</div>
	</div>
@stop