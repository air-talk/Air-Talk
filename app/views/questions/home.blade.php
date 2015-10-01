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
					<div id="allQuestionsButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1">
							<p id="allQuestionsText" class="centerY">All Questions</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageAll() == 100)
					<div id="allQuestionsButton" class="blue-back img-circle img-responsive">
						<p id="allQuestionsText" class="centerY">Complete!</p>
					</div><br>
				@else
					<div id="allQuestionsButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1">
							<p id="allQuestionsText" class="centerY">All Questions</p>
						</a>
					</div><br>
				@endif

				@if(QuestionsController::percentageNontowered() == 0)
					<div id="non-toweredButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?cat=nontowered">
							<p id="non-toweredText" class="centerY">Non-Towered</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageNontowered() == 100)
					<div id="non-toweredButton" class="blue-back img-circle img-responsive">
						<p id="non-toweredText" class="centerY">Complete!</p>
					</div><br>
				@else
					<div id="non-toweredButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1&cat=nontowered">
							<p id="non-toweredText" class="centerY">Non-Towered</p>
						</a>
					</div><br>
				@endif

				@if(QuestionsController::percentageClassb() == 0)
					<div id="classbButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?cat=classb">
							<p id="classbText" class="centerY">Class B</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageClassb() == 100)
					<div id="classbButton" class="blue-back img-circle img-responsive">
						<p id="classbText" class="centerY">Complete!</p>
					</div><br>
				@else
					<div id="classbButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1&cat=classb">
							<p id="classbText" class="centerY">Class B</p>
						</a>
					</div><br>
				@endif

				@if(QuestionsController::percentageClassc() == 0)
					<div id="classcButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?cat=classc">
							<p id="classcText" class="centerY">Class C</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageClassc() == 100)
					<div id="classcButton" class="blue-back img-circle img-responsive">
						<p id="classcText" class="centerY">Complete!</p>
					</div><br>
				@else
					<div id="classcButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1&cat=classc">
							<p id="classcText" class="centerY">Class C</p>
						</a>
					</div><br>
				@endif

				@if(QuestionsController::percentageClassd() == 0)
					<div id="classdButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?cat=classd">
							<p id="classdText" class="centerY">Class D</p>
						</a>
					</div><br>
				@elseif(QuestionsController::percentageClassd() == 100)
					<div id="classdButton" class="blue-back img-circle img-responsive">
						<p id="classdText" class="centerY">Complete!</p>
					</div><br>
				@else
					<div id="classdButton" class="blue-back img-circle img-responsive"> 
						<a href="/questions/1?unfin=1&cat=classd">
							<p id="classdText" class="centerY">Class D</p>
						</a>
					</div><br>
				@endif
	    	</div>
		</div>
		<div class="col-md-4">
		    <div class="well">
		    	{{ Form::open(array('action' => 'QuestionsController@store')) }}

		    	{{ Form::close()}}
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

		$( "#allQuestionsButton" ).hover(
		  function() {
	        $("#allQuestionsText").text(all_questions + "% Completed!");
		  }, function() {
		  	if(all_questions < 100){
		  	  $("#allQuestionsText").text("All Questions");
		  	}else{
	          $("#allQuestionsText").text("Complete!");
		  	}
		  }
		);
		$( "#non-toweredButton" ).hover(
		  function() {
	        $("#non-toweredText").text(non_towered + "% Completed!");
		  }, function() {
		  	if(non_towered < 100){
		  	  $("#non-toweredText").text("Non-Towered");
		  	}else{
	          $("#non-toweredText").text("Complete!");
		  	}
		  }
		);
		$( "#classbButton" ).hover(
		  function() {
	        $("#classbText").text(class_b + "% Completed!");
		  }, function() {
		  	if(class_b < 100){
		  	  $("#classbText").text("Class B");
		  	}else{
	          $("#classbText").text("Complete!");
		  	}
		  }
		);
		$( "#classcButton" ).hover(
		  function() {
	        $("#classcText").text(class_c + "% Completed!");
		  }, function() {
		  	if(class_c < 100){
		  	  $("#classcText").text("Class C");
		  	}else{
	          $("#classcText").text("Complete!");
		  	}
		  }
		);
		$( "#classdButton" ).hover(
		  function() {
	        $("#classdText").text(class_d + "% Completed!");
		  }, function() {
		  	if(class_d < 100){
		  	  $("#classdText").text("Class D");
		  	}else{
	          $("#classdText").text("Complete!");
		  	}
		  }
		);
	</script>

@stop
