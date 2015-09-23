@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="/css/flashcards.css">

@stop
@section('content')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    </button>
                    <h1>Do you know the Definition?</h1>
                    <h3>Use your spacebar or click to reveal the Definition</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div id="card"> 
                                <div class="front"> 
                                    {{{ $flashcards[0]->front }}}
                                </div> 
                                <div class="back">
                                    {{{ $flashcards[0]->back }}}
                                    <p></p>
                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-block">I was wrong</button>
                                    </div>
                                    <div class="col-md-6">   
                                        <button class="btn btn-success btn-block">I was right</button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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
@section('script')
    <script src="/js/jquery.flip.js"></script>
    <script type="text/javascript">
        $("#card").flip({
          axis: 'x',
          reverse: true,
          forceHeight: true
        });


        $(document).keypress(function(e) {
          if(e.which == 32) {
            $("#card").flip('toggle');
            console.log('Enter was pressed');
          }
        });
    </script>
@stop
