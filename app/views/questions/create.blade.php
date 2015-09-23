@extends('layouts.master')

@section('head')

	

@stop

@section('content')

	<main>
	    <div class="container">
	      	<div class="row">
		    <div class="col-md-12">
		        <div class="well">
		        	{{ Form::open(array('action' => 'QuestionsController@store')) }}
						<div>        	
	        				{{ Form::label('question', ' Question') }}
							{{ Form::textarea('question', null, ['class' => 'form-control'])}}
						</div>
						<div>        	
	        				{{ Form::label('right_answer', ' Correct Answer') }}
							{{ Form::text('right_answer', null, ['class' => 'form-control'])}}
						</div>
						<div>        	
	        				{{ Form::label('wrong_answer1', ' Incorrect answer #1') }}
							{{ Form::text('wrong_answer1', null, ['class' => 'form-control'])}}
						</div>
						<div>        	
	        				{{ Form::label('wrong_answer2', ' Incorrect answer #2') }}
							{{ Form::text('wrong_answer2', null, ['class' => 'form-control'])}}
						</div>
						<div>        	
	        				{{ Form::label('wrong_answer3', ' Incorrect answer #3') }}
							{{ Form::text('wrong_answer3', null, ['class' => 'form-control'])}}
						</div>
						<div>        	
	        				{{ Form::label('category', ' Category') }}
							{{ Form::select('category', array('untowered' => 'Untowered', 'classb' => 'Class B', 'classc' => 'Class C', 'classd' => 'Class D'), null, ['class' => 'form-control']) }}
						</div><br>
		        		<button class="btn btn-primary" style="width: 100%"> Create Question </button>
		        	{{ Form:: close() }}

		        </div>
		    </div>
		</div>
	    </div>
	</main>

@stop