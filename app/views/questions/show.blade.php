@extends('layouts.master')

@section('head')

	<style type="text/css">
		.red{
			color:red;
		}
		.green{
			color:lightgreen;
		}
		.correct{
			background-color: lightgreen;
		}
	</style>

@stop

@section('content')
	<main>
	    <div class="container">
	      	<div class="row">
		    <div class="col-md-12">
		        <div class="well">
		        	<h1 id="correct" class="hidden green">Correct</h1>
		        	<h1 id="incorrect" class="hidden red">Incorrect</h1>
		        	<h2>{{$question->question}}</h2><br>
		        	<ul>
			        	<li><p class="random" id="answer1">{{ Form::radio('value', 1 ) }}{{$question->right_answer}}</p></li>
			        	<li><p class="random" id="answer2">{{ Form::radio('value', 2 ) }}{{$question->wrong_answer1}}</p></li>
			        	<li><p class="random" id="answer3">{{ Form::radio('value', 3 ) }}{{$question->wrong_answer2}}</p></li>
			        	<li><p class="random" id="answer4">{{ Form::radio('value', 4 ) }}{{$question->wrong_answer3}}</p></li>
	        		</ul>
	        		<button class="btn btn-success" id="check" style="width: 100%"> Check answer </button>

		        	<a href="/questions/{{ $question->id + 1}}"><button class="btn btn-primary hidden" id="next" style="width: 100%"> Next question </button></a>

					{{ Form::open(array('action' => array('QuestionsController@update', $question->id )))  }}
		        		<button class="btn btn-primary hidden" id="correctNext" style="width: 100%"> Next question </button>
					{{ Form::close() }}


		        </div>
		    </div>
		</div>
	    </div>
	</main>

@stop	

@section('script')
	<script>
		$(function(){
		    $("#check").click(function() {
		    	var value = $("input[name=value]:checked").val();
		    	if(value == 1){
		    		$( "#check" ).addClass( "hidden" );
		    		$( "#correctNext" ).removeClass( "hidden" );
		    		$( "#correct" ).removeClass( "hidden" );
		    		$( "#answer1" ).addClass( "correct" );
		    		$( "input" ).attr("disabled",true);
		    	}else{
		    		$( "#check" ).addClass( "hidden" );
		    		$( "#next" ).removeClass( "hidden" );
		    		$( "#incorrect" ).removeClass( "hidden" );
		    		$( "#answer1" ).addClass( "correct" );
		    	}
		    });
		});

		$(document).ready(function(){
		      $('ul').each(function(){
		            // get current ul
		            var $ul = $(this);
		            // get array of list items in current ul
		            var $liArr = $ul.children('li');
		            console.log($liArr);
		            // sort array of list items in current ul randomly
		            $liArr.sort(function(a,b){
		                  // Get a random number between 0 and 10
		                  var temp = parseInt( Math.random()*10 );
		                  // Get 1 or 0, whether temp is odd or even
		                  var isOddOrEven = temp%2;
		                  // Get +1 or -1, whether temp greater or smaller than 5
		                  var isPosOrNeg = temp>5 ? 1 : -1;
		                  // Return -1, 0, or +1
		                  return( isOddOrEven*isPosOrNeg );
		            })
		            // append list items to ul
		            .appendTo($ul);            
		      });
		});
	</script>

@stop