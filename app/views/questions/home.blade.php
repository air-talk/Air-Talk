@extends('layouts.master')
@section('head')

	<style type="text/css">
		.blue-back{
			background-color: lightBlue;
			width: 150px;
			height: 150px;
		}
		.centerY{
			line-height: 150px;
		}
	</style>

@stop
@section('content')
	<div class="row">
		<div class="col-md-8 text-center">
		    <div class="well text-center">

		    	@if(QuestionsController::percentageAll() == 0)
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1">
							<p class="centerY allQuestionsText">All Questions</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageAll() == 100)
					<div class="blue-back img-circle img-responsive">
						<p class="centerY">Complete!</p>
					</div><br>
				@else
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1">
							<p class="centerY allQuestionsText">All Questions</p>
						</a>
					</div><br>
				@endif

				@if(QuestionsController::percentageNontowered() == 0)
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?cat=Untowered">
							<p id="non-toweredText" class="centerY">Non-Towered</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageNontowered() == 100)
					<div class="blue-back img-circle img-responsive">
						<p class="centerY">Complete!</p>
					</div><br>
				@else
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1&cat=Untowered">
							<p id="non-toweredText" class="centerY">Non-Towered</p>
						</a>
					</div><br>
				@endif

				@if(QuestionsController::percentageClassb() == 0)
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?cat=Class B">
							<p id="classbText" class="centerY">Class B</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageClassb() == 100)
					<div class="blue-back img-circle img-responsive">
						<p class="centerY">Complete!</p>
					</div><br>
				@else
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1&cat=Class B">
							<p id="classbText" class="centerY">Class B</p>
						</a>
					</div><br>
				@endif

				@if(QuestionsController::percentageClassc() == 0)
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?cat=Class C">
							<p id="classcText" class="centerY">Class C</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageClassc() == 100)
					<div class="blue-back img-circle img-responsive">
						<p class="centerY">Complete!</p>
					</div><br>
				@else
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1&cat=Class C">
							<p id="classcText" class="centerY">Class C</p>
						</a>
					</div><br>
				@endif

				@if(QuestionsController::percentageClassd() == 0)
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?cat=Class D">
							<p id="classdText" class="centerY">Class D</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageClassd() == 100)
					<div class="blue-back img-circle img-responsive">
						<p class="centerY">Complete!</p>
					</div><br>
				@else
					<div class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1&cat=Class D">
							<p id="classdText" class="centerY">Class D</p>
						</a>
					</div><br>
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

	<script type="text/javascript">
		var all_questions = {{ QuestionsController::percentageAll()}};
		var non_towered = {{ QuestionsController::percentageNontowered()}};
		var class_b = {{ QuestionsController::percentageClassb()}};
		var class_c = {{ QuestionsController::percentageClassc()}};
		var class_d = {{ QuestionsController::percentageClassd()}};
		$(document).ready(function() {
			$( ".allQuestionsText" ).mouseover(function() {
				console.log('hover in');
			    $( this ).addClass("hide");
			  }).mouseout(function() {
			    $( this ).find( "span" ).text( "mouse out " );
			  });
		});
	</script>

@stop
