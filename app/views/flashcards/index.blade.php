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
                        <div class="col-md-6 col-md-offset-3">
                            <div id="card">
                                <div class="front img"> 
                                    {{$flashcards[0]->front}}
                                </div> 
                                <div class="back">
                                    <div id="definition"> {{$flashcards[0]->back}} </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-block"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>I was wrong</button>
                                    </div>
                                    <div class="col-md-6">   
                                        <button class="btn btn-success btn-block">I was right<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></button>
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
        var card_face = 'front';
        var i = 1;
        $("#card").flip({
          axis: 'x',
          reverse: true,
          forceHeight: true
        });

        function sleep(milliseconds) {
          var start = new Date().getTime();
          for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
              break;
            }
          }
        }

        $(document).keypress(function(e) {
          if(e.which == 32) {
            $("#card").flip('toggle');
            if(card_face == 'front'){
                card_face = 'back'
            }else{
                card_face = 'front';
            }
          }
        });
        
        // got anser right, store in attempts table
        $(document).keyup(function(e) {
            if(e.which == 39 && card_face == 'back') {
                
                $("#card").flip('toggle');
                $.ajax({
                type: "GET",
                    url: "../vocab/info/" + i,
                    data: "",
                    dataType: "json",

                    success: function(data) {
                        $('.front').html(data.front);
                        sleep(100);
                        $('#definition').html(data.back);
                        console.log(data.front);
                        console.log(data.back);
                    },
                    error: function(data){
                    alert("fail");
                    // add in redirect to results page here
                    }
                });
                i++;
                card_face = 'front';
            }   
        });

         // got anser wrong don't store
        $(document).keyup(function(e) {
            if(e.which == 37 && card_face == 'back') {
                $("#card").flip('toggle');
                $.ajax({
                type: "GET",
                    url: "../vocab/info/" + i,
                    data: "",
                    dataType: "json",

                    success: function(data) {
                        $('.front').html(data.front);
                        sleep(100);
                        $('#definition').html(data.back);
                        console.log(data.front);
                        console.log(data.back);
                    },
                    error: function(data){
                    alert("fail");
                    // add in redirect to results page here
                    }
                });
                i++;
                card_face = 'front';
            }   
        });
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
@stop
