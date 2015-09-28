@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="/css/flashcards.css">

@stop
@section('content')
	<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content text-center">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    </button>
                    <h1>Do you know the Aviation term?</h1>
                    <h3>Use your spacebar or click to reveal the Definition</h3>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div id="card">
                                <div class="front img"> 
                                    {{$flashcards[0]->front}}
                                </div> 
                                <div class="back">
                                    {{$flashcards[0]->back}}
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
            </div>
        </div>
    </div>

    <div class="container">
		<div class="row">
		    <div class="col-md-offset-1 col-md-6">
		        <div class="well">
		        	<h2>Aviation Vocabulary</h2>
		        	<table class="table table-striped">
		        		<thead>
		        			<tr>
		        				<th>Word</th>
		        				{{-- Look into created_at column in correctAnswers table for last practiced--}}
		        				<th>Times practiced</th>
                                <th>Times Correct</th>
                                <th> % </th>
		        			</tr>
		        		</thead>
		        		<tbody>
                            @foreach($unansweredFlashcards as $flashcard)
                                <tr>
                                    <td><a href="{{{ action('FlashcardsController@show', $flashcard->id) }}}">{{$flashcard->front}}</a></td>
                                    {{-- change later --}}
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0%</td>
                                </tr>
                            @endforeach
                            @foreach($answeredFlashcards as $test)
                                <tr>
                                    <td><a href="{{{ action('FlashcardsController@show', $flashcard->id) }}}">{{{ $test->front }}}</a></td>
                                    <td>{{{ $test->pivot->attempts }}}</td>
                                    <td>{{{ $test->pivot->correct }}}</td>
                                    <td>{{{ floor($test->pivot->correct / $test->pivot->attempts * 100) }}}%</td>
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
        var i = 1;
        $("#card").flip({
          axis: 'x',
          reverse: true,
          forceHeight: true
        });

        $(document).keypress(function(e) {
          if(e.which == 32) {
            $("#card").flip('toggle');
            console.log('space was pressed');
          }
        });
        $(document).keyup( function(e) {
            console.log(e.keyCode);
        });
        $(document).keypress(function(e) {
          if(e.which == 13) {
            $.ajax({
            type: "GET",
                url: "../vocab/info/" + i,
                data: "",
                dataType: "json",

                success: function(data) {
                    $('.front').html("'<img src=" + data.front + ">'")
                    console.log(data.front);
                },
                error: function(data){
                alert("fail");

                }

            });
            console.log(i);
            console.log('Enter was pressed');
            i++;
            console.log(i);
          }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
@stop
