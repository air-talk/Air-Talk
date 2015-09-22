@extends('layouts.master')
@section('head')
@stop
@section('content')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></button>
                    <br>
                {{ Form::open(array('action' => 'FlashcardsController@index')) }}
                    <div class="modal-body">
                        <h2>{{$flashcards[0]->front}}</h2>
                    </div>
                {{-- </form> --}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
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
		        	<!-- Trigger the login modal with a button -->
                    <a type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal">Practice Flashcards</a>
		        </div>
		    </div>
		</div>
		    <!-- Modal -->
	</div>
@stop