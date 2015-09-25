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
<?php session_start();  ?>
{{var_dump(Session::all())}}
	<main>
	    <div class="container">
	      	<div class="row">
		    <div class="col-md-12">
		        <div class="well">
		        	<h1 id="correct" class="hidden green">Correct</h1>
		        	<h1 id="incorrect" class="hidden red">Incorrect</h1>
		        	<h2>{{$question->question}}</h2><br>
		        	<p id="answer1">{{ Form::radio('value', 1 ) }}{{$question->right_answer}}</p>
		        	<p id="answer2">{{ Form::radio('value', 2 ) }}{{$question->wrong_answer1}}</p>
		        	<p id="answer3">{{ Form::radio('value', 3 ) }}{{$question->wrong_answer2}}</p>
		        	<p id="answer4">{{ Form::radio('value', 4 ) }}{{$question->wrong_answer3}}</p>
	        		<button class="btn btn-success" id="check" style="width: 100%"> Check answer </button>

		        	<a href="/unfinished_questions/{{ Request::segment(2) + 1}}"><button class="btn btn-primary hidden" id="next" style="width: 100%"> Next question </button></a>

					{{ Form::open(array('action' => array('UnfinishedQuestionsController@storeInSession', $question->id )))  }}
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
	</script>

@stop