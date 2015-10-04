@extends('layouts.master')
@section('head')

	<style type="text/css">
		.blue-back{
			background-color: lightBlue;
			width: 160px;
			height: 160px;
		}
		.centerY{
			line-height: 160px;
		}
		.golden-button{
			background-color: #FBB430;
			width: 160px;
			height: 160px;
		}
		#allQuestionsButton{
			margin-left: 35%;
			background-image: url("/images/sun.png");
			background-repeat: no-repeat;
			background-position: center;
	        background-size: 75%;
		}
		#non-toweredButton{
			background-image: url("/images/bird.png");
			background-repeat: no-repeat;
			background-position: center;
	        background-size: 75%;		
		}
		#classbButton{
			background-image: url("/images/air_balloon.png");
			background-repeat: no-repeat;
			background-position: center;
	        background-size: 115%;	
		}
		#classcButton{
			background-image: url("/images/airplane.png");
			background-repeat: no-repeat;
			background-position: center;
	        background-size: 75%;	
	    }
	</style>

@stop
@section('content')
	<div class="col-md-8">
	    <div class="well text-center">

	    	@if(QuestionsController::percentageAll() == 0)
				<div id="allQuestionsButton" class="blue-back img-circle col-md-offset-4"> 
					<a href="/questions/1">
						<p id="allQuestionsText" class="centerY">All Questions</p>
					</a>
				</div>
			@elseif(QuestionsController::percentageAll() == 100)
				<div id="allQuestionsButton" class="golden-button img-circle col-md-offset-4">
					<p id="allQuestionsText" class="centerY">All Questions</p>
				</div>
			@else
				<div id="allQuestionsButton" class="blue-back img-circle col-md-offset-4"> 
					<a href="/questions/1?unfin=1">
						<p id="allQuestionsText" class="centerY">All Questions</p>
					</a>
				</div>
			@endif
			<div class="container">
				<div class="row">
					@if(QuestionsController::percentageNontowered() == 0)
						<div id="non-toweredButton" class="blue-back img-circle col-xs-3 col-xs-offset-1"> 
							<a href="/questions/1?cat=nontowered">
								<p id="non-toweredText" class="centerY">Non-Towered</p>
							</a>
						</div>
					@elseif(QuestionsController::percentageNontowered() == 100)
						<div id="non-toweredButton" class="golden-button img-circle col-xs-3 col-xs-offset-1">
							<p id="non-toweredText" class="centerY">Non-Towered</p>
						</div>
					@else
						<div id="non-toweredButton" class="blue-back img-circle col-xs-3 col-xs-offset-1"> 
							<a href="/questions/1?unfin=1&cat=nontowered">
								<p id="non-toweredText" class="centerY">Non-Towered</p>
							</a>
						</div>
					@endif

					@if(QuestionsController::percentageClassb() == 0)
						<div id="classbButton" class="blue-back img-circle col-xs-3 col-xs-offset-1"> 
							<a href="/questions/1?cat=classb">
								<p id="classbText" class="centerY">Class B</p>
							</a>
						</div>
					@elseif(QuestionsController::percentageClassb() == 100)
						<div id="classbButton" class="golden-button img-circle col-xs-3 col-xs-offset-1">
							<p id="classbText" class="centerY">Class B</p>
						</div>
					@else
						<div id="classbButton" class="blue-back img-circle col-xs-3 col-xs-offset-1"> 
							<a href="/questions/1?unfin=1&cat=classb">
								<p id="classbText" class="centerY">Class B</p>
							</a>
						</div>
					@endif
				</div>
			</div>
			<div class="container">
				<div class="row">
					@if(QuestionsController::percentageClassc() == 0)
						<div id="classcButton" class="blue-back img-circle col-xs-3 col-xs-offset-1"> 
							<a href="/questions/1?cat=classc">
								<p id="classcText" class="centerY">Class C</p>
							</a>
						</div>
					@elseif(QuestionsController::percentageClassc() == 100)
						<div id="classcButton" class="golden-button img-circle col-xs-3 col-xs-offset-1">
							<p id="classcText" class="centerY">Class C</p>
						</div>
					@else
						<div id="classcButton" class="blue-back img-circle col-xs-3 col-xs-offset-1"> 
							<a href="/questions/1?unfin=1&cat=classc">
								<p id="classcText" class="centerY">Class C</p>
							</a>
						</div>
					@endif

					@if(QuestionsController::percentageClassd() == 0)
						<div id="classdButton" class="blue-back img-circle col-xs-3 col-xs-offset-1"> 
							<a href="/questions/1?cat=classd">
								<p id="classdText" class="centerY">Class D</p>
							</a>
						</div>
					@elseif(QuestionsController::percentageClassd() == 100)
						<div id="classdButton" class="golden-button img-circle col-xs-3 col-xs-offset-1">
							<p id="classdText" class="centerY">Class D</p>
						</div>
					@else
						<div id="classdButton" class="blue-back img-circle col-xs-3 col-xs-offset-1"> 
							<a href="/questions/1?unfin=1&cat=classd">
								<p id="classdText" class="centerY">Class D</p>
							</a>
						</div>
					@endif
				</div>
			</div>
    	</div>
	</div>
	<div class="col-md-4">
	    <div id="side-bar" class="well text-center">
        	<h3 id="question-category"></h3>
        	<p id="side-bar-text">Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.</p>
        	<a id="resetButton" href="/questions/reset_questions"><button class="btn btn-danger">Reset Questions</button></a>
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
		  	$("#resetButton").html("");
	        $("#allQuestionsText").text(all_questions + "% Completed!");
	        $("#question-category").text("All Questions");
		  	$("#side-bar-text").text("Non-towered, Class B, Class C, and Class D Questions");
		  }, function() {
		  	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
			$("#allQuestionsText").text("All Questions");
			$("#question-category").text("");
			$("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  }
		);
		$( "#non-toweredButton" ).hover(
		  function() {
		  	$("#resetButton").html("");
	        $("#non-toweredText").text(non_towered + "% Completed!");
	        $("#question-category").text("Non-Towered");
	        $("#side-bar-text").text("A non-towered airport is an airport with no operating tower, or air traffic control unit. The vast majority of the world's airports are non-towered, and even airports with control towers may operate as non-towered during off-hours, typically during the night.");
		  }, function() {
		  	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
		  	$("#non-toweredText").text("Non-Towered");
		  	$("#question-category").text("");
		  	$("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  }
		);
		$( "#classbButton" ).hover(
		  function() {
		  	$("#resetButton").html("");
	        $("#classbText").text(class_b + "% Completed!");
	        $("#question-category").text("Class B");
	        $("#side-bar-text").text("Class B airspace is defined around key airport traffic areas, usually airspace surrounding the busiest airports in the US according to the number of IFR operations and passengers served. The exact shape of the airspace varies from one class B area to another, but in most cases it has the shape of an inverted wedding cake, with a series of circular 'shelves' of airspace of several thousand feet in thickness centered on a specific airport. Each shelf is larger than the one beneath it. Class B airspace normally begins at the surface in the immediate area of the airport, and successive shelves of greater and greater radius begin at higher and higher altitudes at greater distances from the airport. Many class B airspaces diverge from this model to accommodate traffic patterns or local topological or other features. The upper limit of class B airspace is normally 10,000 feet (3,000 m)");
		  }, function() {
		  	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
	  	    $("#classbText").text("Class B");
	  	    $("#question-category").text("");
	  	    $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  }
		);
		$( "#classcButton" ).hover(
		  function() {
		  	$("#resetButton").html("");
	        $("#classcText").text(class_c + "% Completed!");
	        $("#question-category").text("Class C");
	        $("#side-bar-text").text("Class C space is structured in much the same way as class B airspace, but on a smaller scale. Class C airspace is defined around airports of moderate importance that have an operational control tower and is in effect only during the hours of tower operation at the primary airport. The vertical boundary is usually 4,000 feet (1,200 m) above the airport surface. The core surface area has a radius of five nautical miles (9 km), and goes from the surface to the ceiling of the class C airspace. The upper 'shelf' area has a radius of ten nautical miles, and extends from as low as 1,200 feet (370 m) up to the ceiling of the airspace. A procedural 'outer area' (not to be confused with the shelf area) has a radius of 20 nautical miles. (AIM 3-2-4)");
		  }, function() {
		  	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
		  	$("#classcText").text("Class C");
		  	$("#question-category").text("");
		  	$("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  }
		);
		$( "#classdButton" ).hover(
		  function() {
		  	$("#resetButton").html("");
	        $("#classdText").text(class_d + "% Completed!");
	        $("#question-category").text("Class D");
	        $("#side-bar-text").text("Class D airspace is generally cylindrical in form and normally extends from the surface to 2,500 feet (760 m) above the ground. The outer radius of the airspace is variable, but is generally 4 nautical miles. Airspace within the given radius, but in surrounding class C or class B airspace, is excluded. Class D airspace reverts to class E or G during hours when the tower is closed, or under other special conditions. (AIM 3-2-5)");
		  }, function() {
		  	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
		    $("#classdText").text("Class D");
			$("#question-category").text("");
		  	$("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		  }
		);
	</script>

@stop
