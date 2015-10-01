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
		    <div id="side-bar" class="well text-center">
            	<a href="/questions/reset_questions"><button class="btn btn-primary">Reset Questions</button></a>
            	<br>
            	<h3 id="question-category"></h3>
            	<p id="side-bar-text">Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.</p>
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
	        $("#question-category").text("All Questions");
		  	$("#side-bar-text").text("Non-towered, Class B, Class C, and Class D Questions");
		  }, function() {
		  	if(all_questions < 100){
		  	  $("#allQuestionsText").text("All Questions");
		  	  $("#question-category").text("");
		  	  $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}else{
	          $("#allQuestionsText").text("Complete!");
	          $("#question-category").text("");
	          $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}
		  }
		);
		$( "#non-toweredButton" ).hover(
		  function() {
	        $("#non-toweredText").text(non_towered + "% Completed!");
	        $("#question-category").text("Non-Towered");
	        $("#side-bar-text").text("A non-towered airport is an airport with no operating tower, or air traffic control unit. The vast majority of the world's airports are non-towered, and even airports with control towers may operate as non-towered during off-hours, typically during the night.");
		  }, function() {
		  	if(non_towered < 100){
		  	  $("#non-toweredText").text("Non-Towered");
		  	  $("#question-category").text("");
		  	  $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}else{
	          $("#non-toweredText").text("Complete!");
	          $("#question-category").text("");
	          $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}
		  }
		);
		$( "#classbButton" ).hover(
		  function() {
	        $("#classbText").text(class_b + "% Completed!");
	        $("#question-category").text("Class B");
	        $("#side-bar-text").text("Class B airspace is defined around key airport traffic areas, usually airspace surrounding the busiest airports in the US according to the number of IFR operations and passengers served. The exact shape of the airspace varies from one class B area to another, but in most cases it has the shape of an inverted wedding cake, with a series of circular 'shelves' of airspace of several thousand feet in thickness centered on a specific airport. Each shelf is larger than the one beneath it. Class B airspace normally begins at the surface in the immediate area of the airport, and successive shelves of greater and greater radius begin at higher and higher altitudes at greater distances from the airport. Many class B airspaces diverge from this model to accommodate traffic patterns or local topological or other features. The upper limit of class B airspace is normally 10,000 feet (3,000 m)");
		  }, function() {
		  	if(class_b < 100){
		  	  $("#classbText").text("Class B");
		  	  $("#question-category").text("");
		  	  $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}else{
	          $("#classbText").text("Complete!");
	          $("#question-category").text("");
	          $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}
		  }
		);
		$( "#classcButton" ).hover(
		  function() {
	        $("#classcText").text(class_c + "% Completed!");
	        $("#question-category").text("Class C");
	        $("#side-bar-text").text("Class C space is structured in much the same way as class B airspace, but on a smaller scale. Class C airspace is defined around airports of moderate importance that have an operational control tower and is in effect only during the hours of tower operation at the primary airport. The vertical boundary is usually 4,000 feet (1,200 m) above the airport surface. The core surface area has a radius of five nautical miles (9 km), and goes from the surface to the ceiling of the class C airspace. The upper 'shelf' area has a radius of ten nautical miles, and extends from as low as 1,200 feet (370 m) up to the ceiling of the airspace. A procedural 'outer area' (not to be confused with the shelf area) has a radius of 20 nautical miles. (AIM 3-2-4)");
		  }, function() {
		  	if(class_c < 100){
		  	  $("#classcText").text("Class C");
		  	  $("#question-category").text("");
		  	  $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}else{
	          $("#classcText").text("Complete!");
	          $("#question-category").text("");
	          $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}
		  }
		);
		$( "#classdButton" ).hover(
		  function() {
	        $("#classdText").text(class_d + "% Completed!");
	        $("#question-category").text("Class D");
	        $("#side-bar-text").text("Class D airspace is generally cylindrical in form and normally extends from the surface to 2,500 feet (760 m) above the ground. The outer radius of the airspace is variable, but is generally 4 nautical miles. Airspace within the given radius, but in surrounding class C or class B airspace, is excluded. Class D airspace reverts to class E or G during hours when the tower is closed, or under other special conditions. (AIM 3-2-5)");
		  }, function() {
		  	if(class_d < 100){
		  	  $("#classdText").text("Class D");
		  	  $("#question-category").text("");
		  	  $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}else{
	          $("#classdText").text("Complete!");
	          $("#question-category").text("");
	          $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  	}
		  }
		);
	</script>

@stop
