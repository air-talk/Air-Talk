@extends('layouts.master')

@section('head')

	<style type="text/css">
		.red{
			color:red;
		}
		.green{
			color:green;
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
		        	<p>{{ Form::radio('value', 1 ) }}{{$question->right_answer}}</p>
		        	<p>{{ Form::radio('value', 2 ) }}{{$question->wrong_answer1}}</p>
		        	<p>{{ Form::radio('value', 3 ) }}{{$question->wrong_answer2}}</p>
		        	<p>{{ Form::radio('value', 4 ) }}{{$question->wrong_answer3}}</p>
	        		<button class="btn btn-success" id="check" style="width: 100%"> Check answer </button>
	        		<button class="btn btn-primary hidden" id="next" style="width: 100%"> Next question </button>

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
		    		$( "#next" ).removeClass( "hidden" );
		    		$( "#correct" ).removeClass( "hidden" );
		    	}else{
		    		$( "#check" ).addClass( "hidden" );
		    		$( "#next" ).removeClass( "hidden" );
		    		$( "#incorrect" ).removeClass( "hidden" );
		    	}
		    });
		});
	</script>

@stop