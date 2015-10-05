@extends('layouts.master')
@section('head')

	<style type="text/css">
		.icon{
			height: 125px;
			width: 100px;
			display: inline-block;
			text-align: center;
		}
		.circle {
			border-radius: 50%;
			width: 100px;
			height: 100px;
			background-color: lightblue; 
		}		
		.golden-button{
			background-color: #FBB430;
		}
		h3 img {
		    width: 5%;
		    height: auto;
		    margin-right: 10px;
		}
		.icon img{
			/*margin-left: 18%;*/
			margin-top: 16%;
		    width: 60%;
		    height: auto;
		}
		span.text-content {
			position: relative;
			background: rgba(0,0,0,0.5);
			color: white;
			cursor: pointer;
			display: table;
			height: 100px;
			border-radius: 50%;
			left: 0;
			position: absolute;
			top: 0;
			width: 100px;
			opacity: 0;
			-webkit-transition: opacity 500ms;
			-moz-transition: opacity 500ms;
			-o-transition: opacity 500ms;
			transition: opacity 500ms;
		}
		a:hover span.text-content {
		  opacity: 1;
		}
		#allQuestionsButton{
			position: absolute;
			top: 17%;
			left: 40%;
		}
		#non-toweredButton{
			position: absolute;
			top: 40%;
			left: 20%;
		}
		#classdButton{
			position: absolute;
			top: 40%;
			left: 60%;
		}
		#classcButton{
			position: absolute;
			top: 65%;
			left: 20%;
		}
		#classbButton{
			position: absolute;
			top: 65%;
			left: 60%;
		}
		.col-md-6 .well{
			height: 600px;
		}
	</style>

@stop
@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-offset-1 col-md-6">
	    	<div class="well">
        	<h3><img src="/images/airtower.png" alt="airport tower">Knowledge Questions</h3>
	        	<div class="row">
			    	@if(QuestionsController::percentageAll() == 0)
				    	<div id="allQuestionsButton" class="icon">
							<a href="/questions/1">
								<div  class="pull-left circle">
									<img src="/images/radar.png" style="margin-left: 5%;" alt="radar">
									<span class="text-content"><span>Place Name</span></span> 
								</div>
								<p id="allQuestionsText">All Questions</p>
							</a>
						</div>	
					@elseif(QuestionsController::percentageAll() == 100)
						<div  id="allQuestionsButton" class="icon">
							<div class="golden-button pull-left circle">
								<img src="/images/radar.png" style="margin-left: 5%;" alt="radar"> 
							</div>
							<p id="allQuestionsText">All Questions</p>
						</div>
					@else
						<div  id="allQuestionsButton" class="icon">
							<a href="/questions/1?unfin=1">
								<div class="pull-left circle"> 
									<img src="/images/radar.png" style="margin-left: 5%;" alt="radar"> 
								</div>
								<p id="allQuestionsText">All Questions</p>
							</a>
						</div>
					@endif

					@if(QuestionsController::percentageNontowered() == 0)
						<div id="non-toweredButton" class="icon">
							<a href="/questions/1?cat=nontowered">
								<div class="pull-left circle"> 
									<img src="/images/windsock.png" alt="windsock"> 
									<span class="text-content"><span>Place Name</span></span> 
								</div>
								<p id="non-toweredText">Non-Towered</p>
							</a>
						</div>
					@elseif(QuestionsController::percentageNontowered() == 100)
						<div id="non-toweredButton" class="icon">
							<div class="golden-button pull-left circle">
								<img src="/images/windsock.png" alt="windsock"> 
							</div>
							<p id="non-toweredText">Non-Towered</p>
						</div>
					@else
						<div id="non-toweredButton" class="icon">
							<a href="/questions/1?unfin=1&cat=nontowered">
								<div class="pull-left circle"> 
									<img src="/images/windsock.png" alt="windsock"> 
								</div>
								<p id="non-toweredText">Non-Towered</p>
							</a>
						</div>
					@endif

					@if(QuestionsController::percentageClassb() == 0)
						<div id="classbButton" class="icon">
							<a href="/questions/1?cat=classb">
								<div class="pull-left circle"> 
									<img src="/images/airbus.png" style="width: 55%; margin-top: 22%; margin-left: 18%;" alt="airbus"> 
								</div>
								<p id="classbText">Class B</p>
							</a>
						</div>
					@elseif(QuestionsController::percentageClassb() == 100)
						<div id="classbButton" class="icon">
							<div class="golden-button pull-left circle">
								<img src="/images/airbus.png" style="width: 55%; margin-top: 22%; margin-left: 22%;" alt="airbus"> 
							</div>
							<p id="classbText">Class B</p>
						</div>
					@else
						<div id="classbButton" class="icon">
							<a href="/questions/1?unfin=1&cat=classb">
								<div class="pull-left circle"> 
									<img src="/images/airbus.png" style="width: 55%; margin-top: 22%; margin-left: 22%;" alt="airbus"> 
								</div>
								<p id="classbText">Class B</p>
							</a>
						</div>
					@endif

					@if(QuestionsController::percentageClassc() == 0)
						<div id="classcButton" class="icon">
							<a href="/questions/1?cat=classc">
								<div class="pull-left circle"> 
									<img src="/images/helicopter.png" style="width: 70%; margin-top: 32%; margin-left: 18%;" alt="helicopter">
								</div>
								<p id="classcText">Class C</p>
							</a>
						</div>
					@elseif(QuestionsController::percentageClassc() == 100)
						<div id="classcButton" class="icon">
							<div class="golden-button pull-left circle">
								<img src="/images/helicopter.png" style="width: 70%; margin-top: 32%; margin-left: 18%;" alt="helicopter">
							</div>
							<p id="classcText">Class C</p>
						</div>
					@else
						<div id="classcButton" class="icon">
							<a href="/questions/1?unfin=1&cat=classc">
								<div class="pull-left circle"> 
									<img src="/images/helicopter.png" style="width: 70%; margin-top: 32%; margin-left: 18%;" alt="helicopter">
								</div>
								<p id="classcText">Class C</p>
							</a>
						</div>
					@endif

					@if(QuestionsController::percentageClassd() == 0)
						<div id="classdButton" class="icon">
							<a href="/questions/1?cat=classd">
								<div class="pull-left circle"> 
									<img src="/images/singleprop.png" style="width: 60%; margin-top: 22%; margin-left: 22%;" alt="singleprop">
								</div>
								<p id="classdText">Class D</p>
							</a>
						</div>
					@elseif(QuestionsController::percentageClassd() == 100)
						<div id="classdButton" class="icon">
							<div class="golden-button pull-left circle">
								<img src="/images/singleprop.png" style="width: 60%; margin-top: 22%; margin-left: 22%;" alt="singleprop">
							</div>
							<p id="classdText">Class D</p>
						</div>
					@else
						<div id="classdButton" class="icon">
							<a href="/questions/1?unfin=1&cat=classd">
								<div class="pull-left circle"> 
									<img src="/images/singleprop.png" style="width: 60%; margin-top: 22%; margin-left: 22%;" alt="singleprop">
								</div>
								<p id="classdText">Class D</p>
							</a>
						</div>
					@endif
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
</div>    
@stop
@section('script')

	<script type="text/javascript">
		var all_questions = {{ QuestionsController::percentageAll()}};
		var non_towered = {{ QuestionsController::percentageNontowered()}};
		var class_b = {{ QuestionsController::percentageClassb()}};
		var class_c = {{ QuestionsController::percentageClassc()}};
		var class_d = {{ QuestionsController::percentageClassd()}};

		// $( "#allQuestionsButton" ).hover(
		//   function() {
		//   	$("#resetButton").html("");
	 //        $("#allQuestionsButton").text(all_questions + "% Completed!");
	 //        $("#question-category").text("All Questions");
		//   	$("#side-bar-text").text("Non-towered, Class B, Class C, and Class D Questions");
		//   }, function() {
		//   	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
		// 	$("#allQuestionsButton").text("");
		// 	$("#question-category").text("");
		// 	$("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		//   }
		// );
		// $( "#non-toweredButton" ).hover(
		//   function() {
		//   	$("#resetButton").html("");
	 //        $("#non-toweredButton").text(non_towered + "% Completed!");
	 //        $("#question-category").text("Non-Towered");
	 //        $("#side-bar-text").text("A non-towered airport is an airport with no operating tower, or air traffic control unit. The vast majority of the world's airports are non-towered, and even airports with control towers may operate as non-towered during off-hours, typically during the night.");
		//   }, function() {
		//   	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
		//   	$("#non-toweredButton").text("");
		//   	$("#question-category").text("");
		//   	$("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		//   }
		// );
		// $( "#classbButton" ).hover(
		//   function() {
		//   	$("#resetButton").html("");
	 //        $("#classbButton").text(class_b + "% Completed!");
	 //        $("#question-category").text("Class B");
	 //        $("#side-bar-text").text("Class B airspace is defined around key airport traffic areas, usually airspace surrounding the busiest airports in the US according to the number of IFR operations and passengers served. The exact shape of the airspace varies from one class B area to another, but in most cases it has the shape of an inverted wedding cake, with a series of circular 'shelves' of airspace of several thousand feet in thickness centered on a specific airport. Each shelf is larger than the one beneath it. Class B airspace normally begins at the surface in the immediate area of the airport, and successive shelves of greater and greater radius begin at higher and higher altitudes at greater distances from the airport. Many class B airspaces diverge from this model to accommodate traffic patterns or local topological or other features. The upper limit of class B airspace is normally 10,000 feet (3,000 m)");
		//   }, function() {
		//   	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
	 //  	    $("#classbButton").text("");
	 //  	    $("#question-category").text("");
	 //  	    $("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		//   }
		// );
		// $( "#classcButton" ).hover(
		//   function() {
		//   	$("#resetButton").html("");
	 //        $("#classcButton").text(class_c + "% Completed!");
	 //        $("#question-category").text("Class C");
	 //        $("#side-bar-text").text("Class C space is structured in much the same way as class B airspace, but on a smaller scale. Class C airspace is defined around airports of moderate importance that have an operational control tower and is in effect only during the hours of tower operation at the primary airport. The vertical boundary is usually 4,000 feet (1,200 m) above the airport surface. The core surface area has a radius of five nautical miles (9 km), and goes from the surface to the ceiling of the class C airspace. The upper 'shelf' area has a radius of ten nautical miles, and extends from as low as 1,200 feet (370 m) up to the ceiling of the airspace. A procedural 'outer area' (not to be confused with the shelf area) has a radius of 20 nautical miles. (AIM 3-2-4)");
		//   }, function() {
		//   	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
		//   	$("#classcButton").text("");
		//   	$("#question-category").text("");
		//   	$("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		//   }
		// );
		// $( "#classdButton" ).hover(
		//   function() {
		//   	$("#resetButton").html("");
	 //        $("#classdButton").text(class_d + "% Completed!");
	 //        $("#question-category").text("Class D");
	 //        $("#side-bar-text").text("Class D airspace is generally cylindrical in form and normally extends from the surface to 2,500 feet (760 m) above the ground. The outer radius of the airspace is variable, but is generally 4 nautical miles. Airspace within the given radius, but in surrounding class C or class B airspace, is excluded. Class D airspace reverts to class E or G during hours when the tower is closed, or under other special conditions. (AIM 3-2-5)");
		//   }, function() {
		//   	$("#resetButton").html("<button class='btn btn-danger'>Reset Questions</button>");
		//     $("#classdButton").text("");
		// 	$("#question-category").text("");
		//   	$("#side-bar-text").html("Hover over the buttons to the left to get more information on the category. Click the button to start the quiz on that specific category. <br><br> You can stop the quiz at any time, and will be returned to your incorrect and unfinished questions next time you start the quiz.");
		//   }
		// );
	</script>

@stop
