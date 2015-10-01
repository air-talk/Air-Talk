@extends('layouts.master')

@section('head')
	<style type="text/css">
		ul{
			list-style-type: none;
		}
		.red{
			color: red;
		}
		.green{
			color: lightGreen;
		}
		.correct{
			background-color: lightGreen;
		}
	</style>
@stop

@section('content')
	<main>
	    <div class="container">
	      	<div class="row">
			    <div class="col-md-12">
			        <div class="well">
			        	<h1 id="correct" class="hidden green">Correct</h1>
			        	<h1 id="incorrect" class="hidden red">Incorrect</h1>
						<h2 id="question"></h2><br>
			        	<ul id="answersList">
					        	<li id="answer1"></li>
					        	<li id="answer2"></li>
					        	<li id="answer3"></li>
					        	<li id="answer4"></li>
		        		</ul>
		        		<button class="btn btn-success" id="check" style="width: 100%"> Check answer </button>

			        	<button class="btn btn-primary hidden" id="next" style="width: 100%"> Next question </button>

			        	<button class="btn btn-primary hidden" id="correctNext" style="width: 100%"> Next question </button>
			        </div>
			    </div>
			</div>
	    </div>
	</main>

    <input type="hidden" name="index" id="index" value="">
    <input type="hidden" name="id" id="id" value="">
@stop	

@section('script')

    <script type="text/javascript">

	    $.fn.randomize = function(selector){
	        var $elems = selector ? $(this).find(selector) : $(this).children(),
	            $parents = $elems.parent();

	        $parents.each(function(){
	            $(this).children(selector).sort(function(){
	                return Math.round(Math.random()) - 0.5;
	            // }). remove().appendTo(this); // 2014-05-24: Removed `random` but leaving for reference. See notes under 'ANOTHER EDIT'
	            }).detach().appendTo(this);
	        });

	        return this;
	    };
        
        var questionList = [];
        @foreach($questions as $question)
            questionList.push({ id:"{{{ $question->id }}}", question:"{{{ $question->question }}}", right_answer: "{{{ $question->right_answer }}}", wrong_answer1: "{{{ $question->wrong_answer1 }}}", wrong_answer2: "{{{ $question->wrong_answer2 }}}", wrong_answer3: "{{{ $question->wrong_answer3 }}}" })
        @endforeach
        if(questionList.length == 0){
            $( "#check" ).addClass("hidden");
        	$("#question").html("You have already finished all of these questions! You will be redirected back to quiz front page");
			setTimeout(
			  function() 
			  {
	    		window.location.replace("http://airtalk.dev/questions");
			  }, 3000
		    );
        }

        var lastQuestion = questionList[questionList.length-1];

        $("#question").html(questionList[0].question);
        $("#answer1").html("<input type='radio' name='answer' value='1' class='random'> " + questionList[0].right_answer);
        $("#answer2").html("<input type='radio' name='answer' value='2' class='random'> " + questionList[0].wrong_answer1);
        $("#answer3").html("<input type='radio' name='answer' value='3' class='random'> " + questionList[0].wrong_answer2);
        $("#answer4").html("<input type='radio' name='answer' value='4' class='random'> " + questionList[0].wrong_answer3);
        $("#answersList").randomize();
        $("#index").val('0');
        $("#id").val(questionList[0].id);



        $("#check").click(function() {
	    	var value = $("input[name=answer]:checked").val();
	    	if(value == 1){
	    		$( "#check" ).addClass( "hidden" );
	    		$( "#correctNext" ).removeClass( "hidden" );
	    		$( "#correct" ).removeClass( "hidden" );
	    		$( "#answer1" ).addClass( "correct" );
	    		$( "input" ).attr("disabled",true);
	    	}else{
	    		$( "#check" ).addClass( "hidden" );
	    		$( "#next" ).removeClass( "hidden" );
	    		$( "#incorrect" ).removeClass( "hidden" );
	    		$( "#answer1" ).addClass( "correct" );
	    		$( "input" ).attr("disabled",true);
	    	}
	    });

        // got answer right, store in pivot table, display next question
        $('#correctNext').click(function(e){
        	if(lastQuestion['id'] == $('#id').val()){
	            var next = parseInt($("#index").val());
	            var correct = 1;
	            next++;
	            $.ajax({
	            type: "POST",
	                url: "/questions/attempt/" + $("#id").val() + "/" + correct,
	                data: {id:$("#id").val(),correct:correct},
	                dataType: "json",

	                success: function(data) {

	                	$("#question").html("Quiz Completed. You will be redirected back to quiz front page");
	                	$("#answer1").html("");
	                	$("#answer2").html("");
	                	$("#answer3").html("");
	                	$("#answer4").html("");
			    		$( "#correctNext" ).addClass( "hidden" );
			    		$( "#next" ).addClass( "hidden" );
			    		$( "#correct" ).addClass( "hidden" );
			    		$( "#incorrect" ).addClass( "hidden" );
			    		setTimeout(
			    		  function() 
			    		  {
				    		window.location.replace("http://airtalk.dev/questions");
			    		  }, 3000);
	                },
	                error: function(data){
	                    alert("fail");
	                // add in redirect to results page here
	                }
	            }); 
        	}else{
	            var next = parseInt($("#index").val());
	            var correct = 1;
	            next++;
	            $.ajax({
	            type: "POST",
	                url: "/questions/attempt/" + $("#id").val() + "/" + correct,
	                data: {id:$("#id").val(),correct:correct},
	                dataType: "json",

	                success: function(data) {

	                	$("#question").html(questionList[next].question);
	                	$("#answer1").html("<input type='radio' name='answer' value='1' class='random'> " + questionList[next].right_answer);
	                	$("#answer2").html("<input type='radio' name='answer' value='2' class='random'> " + questionList[next].wrong_answer1);
	                	$("#answer3").html("<input type='radio' name='answer' value='3' class='random'> " + questionList[next].wrong_answer2);
	                	$("#answer4").html("<input type='radio' name='answer' value='4' class='random'> " + questionList[next].wrong_answer3);
	                	$("#answersList").randomize();
	                    $("#id").val(questionList[next].id);
	                    $("#index").val(next);
	                    $( "#check" ).removeClass("hidden");
			    		$( "#correctNext" ).addClass( "hidden" );
			    		$( "#correct" ).addClass( "hidden" );
			    		$( "#answer1" ).removeClass( "correct" );
			    		$( "input" ).attr("disabled",false);
	                },
	                error: function(data){
	                    alert("fail");
	                // add in redirect to results page here
	                }
	            }); 
			}

        });

        // got answer wrong, display next question
        $('#next').click(function(e){
        	if(lastQuestion['id'] == $('#id').val()){
	            var next = parseInt($("#index").val());
	            var correct = 0;
	            next++;
	            $.ajax({
	            type: "POST",
	                url: "/questions/attempt/" + $("#id").val() + "/" + correct,
	                data: {id:$("#id").val(),correct:correct},
	                dataType: "json",

	                success: function(data) {

	                	$("#question").html("Quiz Completed. You will be redirected back to quiz front page");
	                	$("#answer1").html("");
	                	$("#answer2").html("");
	                	$("#answer3").html("");
	                	$("#answer4").html("");
			    		$( "#correctNext" ).addClass( "hidden" );
			    		$( "#next" ).addClass( "hidden" );
			    		$( "#correct" ).addClass( "hidden" );
			    		$( "#incorrect" ).addClass( "hidden" );
			    		setTimeout(
			    		  function() 
			    		  {
				    		window.location.replace("http://airtalk.dev/questions");
			    		  }, 3000);
	                },
	                error: function(data){
	                    alert("fail");
	                // add in redirect to results page here
	                }
	            }); 
        	}else{
	            var next = parseInt($("#index").val());
	            var correct = 0;
	            next++;
	            $.ajax({
	            type: "POST",
	                url: "/questions/attempt/" + $("#id").val() + "/" + correct,
	                data: {id:$("#id").val(),correct:correct},
	                dataType: "json",

	                success: function(data) {

	                	$("#question").html(questionList[next].question);
	                	$("#answer1").html("<input type='radio' name='answer' value='1' class='random'> " + questionList[next].right_answer);
	                	$("#answer2").html("<input type='radio' name='answer' value='2' class='random'> " + questionList[next].wrong_answer1);
	                	$("#answer3").html("<input type='radio' name='answer' value='3' class='random'> " + questionList[next].wrong_answer2);
	                	$("#answer4").html("<input type='radio' name='answer' value='4' class='random'> " + questionList[next].wrong_answer3);
	                	$("#answersList").randomize();
	                    $("#id").val(questionList[next].id);
	                    $("#index").val(next);
			    		$( "#check" ).removeClass( "hidden" );
			    		$( "#next" ).addClass( "hidden" );
			    		$( "#incorrect" ).addClass( "hidden" );
			    		$( "#answer1" ).removeClass( "correct" );
	                },
	                error: function(data){
	                    alert("fail");
	                // add in redirect to results page here
	                }
	            }); 
			}

        });
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>


@stop