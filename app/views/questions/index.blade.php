@extends('layouts.master')


@section('content')

	<main>
	    <div class="container">
	      	<div class="row">
		    <div class="col-md-8">
		        <div class="well">
		        	<h1>All Questions</h1>
		        	@forelse ($questions as $question)
			        	<p><a href="/questions/{{$question->id}}">{{$question->question}}</a></p>
			        @empty
				        <h2>There seems to be no questions!</h2>
			        @endforelse
                    {{ $questions->links() }}
		        </div>
		    </div>
		    <div class="col-md-4">
		        <div class="well">
		       		<h3>Categories</h3>
		       		<p><a href="/questions?cat=untowered">Untowered</a></p>
		       		<p><a href="/questions?cat=classb">Class B</a></p>
		       		<p><a href="/questions?cat=classc">Class C</a></p>
		       		<p><a href="/questions?cat=classd">Class D</a></p>
		        </div>
		    </div>
		</div>
	    </div>
	</main>

@stop