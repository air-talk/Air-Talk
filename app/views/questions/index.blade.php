@extends('layouts.master')


@section('content')
	<main>
	    <div class="container">
	      	<div class="row">
			    <div class="col-md-8">
			        <div class="well">
    		        	@if(Input::has('cat') && Input::has('unfin'))
    		        		<h1>Unfinished {{Input::get('cat')}} Questions
    		        		<a href="/questions/1?unfin=1&cat={{Input::get('cat')}}" class="pull-right quiz">Start Quiz</a></h1>
    		        	@elseif(Input::has('unfin'))
    		        		<h1>Unfinished Questions
    		        		<a href="/questions/1?unfin=1" class="pull-right quiz">Start Quiz</a></h1>
    		        	@elseif(Input::has('cat'))
    		        		<h1>{{Input::get('cat')}} Questions
    		        		<a href="/questions/1?cat={{Input::get('cat')}}" class="pull-right quiz">Start Quiz</a></h1>
    	        		@else
    		        		<h1>Questions
    		        		<a href="/questions/1" class="pull-right quiz">Start Quiz</a></h1>
    	        		@endif

			        	@forelse ($questions as $question)
					        	<p>{{$question->question}}</p>
				        @empty
					        <h2>There seems to be no questions!</h2>
				        @endforelse
	                    {{-- {{ $questions->links() }} --}}
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
			       		<p><a href="/questions?unfin=1">Unfinished Questions</a></p>
			       		<ul>
			       			<li><a href="/questions?unfin=1&cat=Untowered">Untowered</a></li>
			       			<li><a href="/questions?unfin=1&cat=Class B">Class B</a></li>
			       			<li><a href="/questions?unfin=1&cat=Class C">Class C</a></li>
			       			<li><a href="/questions?unfin=1&cat=Class D">Class D</a></li>
			       		</ul>
			        </div>
			    </div>
			</div>
	    </div>
	</main>

@stop