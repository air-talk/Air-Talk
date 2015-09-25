@extends('layouts.master')


@section('content')
	<main>
	    <div class="container">
	      	<div class="row">
		    <div class="col-md-8">
		        <div class="well">
    		        	@if(Input::has('cat'))
    		        		<h1>Unfinished {{Input::get('cat')}} Questions
		        			@if(!empty($questions->toArray()['data']))
		        			 	<a href="/unfinished_questions/1" class="pull-right quiz">Unfinished Quiz</h1></a>
		        			@endif
    	        		@else
    		        		<h1>Unfinished Questions
		        			@if(!empty($questions->toArray()['data']))
			        			<a href="/unfinished_questions/1" class="pull-right quiz">Unfinished Quiz</h1></a>'
		        			@endif
    	        		@endif

		        		<?php $i=1; ?>
		        	@forelse ($questions as $question)
			        	<p><a href="/unfinished_questions/{{$i}}">{{$question->question}}</a></p>
			        	<?php $i++;?>
			        @empty
				        <h2>There seems to be no questions!</h2>
			        @endforelse
                    {{ $questions->links() }}
		        </div>
		    </div>
		    <div class="col-md-4">
		        <div class="well">
		       		<h3>Categories</h3>
		       		<p><a href="/questions">All Questions</a></p>
		       		<p><a href="/questions?cat=Untowered">Untowered</a></p>
		       		<p><a href="/questions?cat=Class B">Class B</a></p>
		       		<p><a href="/questions?cat=Class C">Class C</a></p>
		       		<p><a href="/questions?cat=Class D">Class D</a></p>
		       		<p><a href="/unfinished_questions">Unfinished Questions</a></p>
		       		<ul>
		       			<li><a href="/unfinished_questions?cat=Untowered">Untowered</a></li>
		       			<li><a href="/unfinished_questions?cat=Class B">Class B</a></li>
		       			<li><a href="/unfinished_questions?cat=Class C">Class C</a></li>
		       			<li><a href="/unfinished_questions?cat=Class D">Class D</a></li>
		       		</ul>
		        </div>
		    </div>
		</div>
	    </div>
	</main>

@stop