@extends('layouts.master')
@section('head')

	<style type="text/css">

	</style>

@stop
@section('content')
	<div class="row">
		<div class="col-md-8 text-center">
		    <div class="well text-center">

		    	@if(QuestionsController::percentageAll() == 0)
					<a href="/questions/1"><img class="img-circle img-responsive" src="/images/button.png"></a><br>
				@else
					<a href="/questions/1?unfin=1"><img class="img-circle img-responsive" src="/images/button.png"></a><br>
				@endif

				@if(QuestionsController::percentageNontowered() == 0)
					<a href="/questions/1?cat=Untowered"><img class="img-circle img-responsive" src="/images/button.png"></a><br>
				@else
					<a href="/questions/1?unfin=1&cat=Untowered"><img class="img-circle img-responsive" src="/images/button.png"></a><br>
				@endif

				@if(QuestionsController::percentageClassb() == 0)
					<a href="/questions/1?cat=Class B"><img class="img-circle img-responsive" src="/images/button.png"></a><br>
				@else
					<a href="/questions/1?unfin=1&cat=Class B"><img class="img-circle img-responsive" src="/images/button.png"></a><br>
				@endif

				@if(QuestionsController::percentageClassc() == 0)
					<a href="/questions/1?cat=Class C"><img class="img-circle img-responsive" src="/images/button.png"></a><br>
				@else
					<a href="/questions/1?unfin=1&cat=Class C"><img class="img-circle img-responsive" src="/images/button.png"></a><br>
				@endif

				@if(QuestionsController::percentageClassd() == 0)
					<a href="/questions/1?cat=Class D"><img class="img-circle img-responsive" src="/images/button.png"></a>
				@else
					<a href="/questions/1?unfin=1&cat=Class D"><img class="img-circle img-responsive" src="/images/button.png"></a>
				@endif
	    	</div>
		</div>
		<div class="col-md-4">
		    <div class="well">
	    	</div>
	    </div>	
	</div>
@stop
@section('script')
@stop
