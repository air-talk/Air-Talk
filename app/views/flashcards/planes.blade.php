@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="/css/flashcards.css">

@stop
@section('content')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content text-center">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    </button>
                    <h3>Do you know the name of the plane?</h3>
                    <p>Use your spacebar or click to reveal</p>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div id="card" data-face="front">
                                
                                <div class="front img">

                                    <div id="front"> 
                                    </div>
                                </div> 
                                <div class="back">
    
                                    <div id="back">
                                        
                                    </div>
                                    <form action="" method="post">
                                        <input type="hidden" name="index" id="index" value="">
                                        <input type="hidden" name="id" id="id" value="">
                                       
                                    </form> 
                                    <div class="btn-bottom">
                                        <button class="red col-md-6" id="wrong"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>I was wrong</button>

                                        <button class="col-md-6 green" id="right">I was right<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-6">
                <div class="well">
                    <h2>Name That Plane</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Word</th>
                                {{-- Look into created_at column in correctAnswers table for last practiced--}}
                                <th>Attempts</th>
                                <th>Correct</th>
                                <th>Strength</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unansweredFlashcards as $flashcard)
                                <tr>
                                    <td class="card-name" data-card-id="{{{ $flashcard->id }}}" data-definition="{{{ $flashcard->front }}}" data-front="{{{ $flashcard->back }}}" data-percent="0"><strong>{{$flashcard->back}}</strong></td>
                                    {{-- change later --}}
                                    <td>0</td>
                                    <td>0</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 0%">
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($answeredFlashcards as $flashcard)
                                <tr>
                                    <td class="card-name" data-card-id="{{{ $flashcard->id }}}" data-definition="{{{ $flashcard->front }}}" data-front="{{{ $flashcard->back }}}" data-percent="{{{ floor($flashcard->pivot->correct / $flashcard->pivot->attempts * 100) }}}"><strong>{{{ $flashcard->back }}}</strong></td>
                                    <td>{{{ $flashcard->pivot->attempts }}}</td>
                                    <td>{{{ $flashcard->pivot->correct }}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                            aria-valuenow="{{{ floor($flashcard->pivot->correct / $flashcard->pivot->attempts * 100) }}}" aria-valuemin="0" aria-valuemax="100" style="width:{{{ floor($flashcard->pivot->correct / $flashcard->pivot->attempts * 100) }}}%">
                                              <span class="sr-only">{{{ floor($flashcard->pivot->correct / $flashcard->pivot->attempts * 100) }}}%</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well affixed-element" data-spy="affix" data-offset-top="20" id="sideWell">
                    <h3 class="centered">Do you know the Aviation term?</h3>
                    <hr>
                    <h4 class="centered">Use your spacebar or click to reveal the definition. Then press the left or right arrow key or click the buttons to submit.</h4>
                    <hr>
                    <!-- Trigger the login modal with a button -->
                    <a type="button" class="btn btn-primary btn-circle col-md-offset-3" data-toggle="modal" data-target="#myModal">Practice Flashcards</a>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
@stop
@section('script')
    <script src="/js/jquery.flip.js"></script>
    <script src="/js/jquery-ui-1.11.4.js"></script>
    <script type="text/javascript">
        
        var flashcardList = [];
        @foreach($unansweredFlashcards as $flashcard)
            flashcardList.push({ id:"{{{ $flashcard->id }}}", front:"{{{ $flashcard->front }}}", back: "{{{ $flashcard->back }}}" })
        @endforeach
        @foreach($answeredFlashcards as $flashcard)
            flashcardList.push({ id:"{{{ $flashcard->id }}}", front:"{{{ $flashcard->front }}}", back: "{{{ $flashcard->back }}}" })
        @endforeach


       console.log(flashcardList);
        $("#front").html('<img class="helper `img" src="' + flashcardList[0].front + '" alt="plane image">');
        $("#back").html(flashcardList[0].back);
        $("#id").val(flashcardList[0].id);
        $("#index").val('0');


        function affixWidth() {
            // ensure the affix element maintains it width
            var affix = $('.affixed-element');
            var width = affix.width();
            affix.width(width);
        }

        $(document).ready(function () {

            affixWidth();

        });

        $(".card-name").hover(
          function() {
            if($(this).data('percent') == '0'){
                $( '#sideWell' ).html( "<h2 class='centered'>" + $(this).data('front') + "</h2>" + "<hr><br><img src='" + $(this).data('definition') + "'><br><hr><br>" +  "<div class='progress'><div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='0' style='width: 0%'><span class='sr-only'> 0% </span></div></div><br>" );
            }else{
                $( '#sideWell' ).html( "<h2 class='centered'>" + $(this).data('front') + "</h2>" + "<hr><br><img src='" + $(this).data('definition') + "'><br><hr><br>" +  "<div class='progress'><div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='" + $(this).data('percent') + "' aria-valuemin='0' aria-valuemax='100' style='width:" + $(this).data('percent') + "%'><span class='sr-only'> " + $(this).data('percent') + "%</span> </div> </div><br>" );
            }

          }, function() {
            $( '#sideWell' ).html( '<h3 class="centered">Do you know the Aviation term?</h3><hr><h4 class="centered">Use your spacebar or click to reveal the definition. Then press the left or right arrow key or click the buttons to submit.</h4><hr><a type="button" class="btn btn-primary btn-circle col-md-offset-3" data-toggle="modal" data-target="#myModal">Practice Flashcards</a>'  );
          }
        );


        $("#card").flip({
          axis: 'x',
          reverse: true,
          forceHeight: true
        });

        $("#card").on('flip:done', function() {
            var face = $(this).data('face');

            if (face == 'front') {
                $(this).data('face', 'back');
            } else {
                $(this).data('face', 'front');
            }
        });

        function sleep(milliseconds) {
          var start = new Date().getTime();
          for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
              break;
            }
          }
        }

        $(document).keypress(function(e) {
          if(e.which == 32) {
            $("#card").flip('toggle');
          }
        });

        $('#myModal').on('hidden.bs.modal', function () {
            location.reload();
        });

        $('#right, #wrong').click(function(e) {
              var next = parseInt($("#index").val());
              if($(e.target).is('#right')){
                  e.which = 39
                  var direction = 'right';
              }
              if($(e.target).is('#wrong')){
                  e.which = 37
                  var direction = 'left';
              }


              $("#card").hide("slide", { direction: direction }, 750);
              $("#card").show("slide", { direction: "up" }, 500);

              $("#card").flip('toggle');
              next++;
              sleep(200);
              console.log(next);
              console.log(flashcardList.length);
              if(next < flashcardList.length){
                  $.ajax({
                  type: "POST",
                      url: "/flashcards/attempt/" + $("#id").val() + "/" + e.which ,
                      data: {id:$("#id").val(),which:e.which},
                      dataType: "json",

                      success: function(data) {

                            $("#front").html('<img class="contain" src="' + flashcardList[next].front + '" alt="plane image">');
                            $("#id").val(flashcardList[next].id);
                            $("#index").val(next);
                            // sleep(50);
                            $("#back").html(flashcardList[next].back);

                      },
                      error: function(data){
                          location.reload();
                          // add in redirect to results page here
                      }
                  });
              }else{
                  $("#front").html('You have completed all of the flashcards!<br> The Modal will close in 5 seconds.');
                  $("#back").html('Done');
                 
                  setTimeout(function(){
                     location.reload();
                  }, 4000);
              }  
          });
        
        // got anser right, store in attempts table
        $(document).keyup(function(e) {
            if(e.which == 39 && $('#card').data('face') == 'back' || e.which == 37 && $('#card').data('face') == 'back' ) {
                var next = parseInt($("#index").val());

                if(e.which == 39){
                    var direction = 'right';
                }
                if(e.which == 37){
                    var direction = 'left';
                }

                $("#card").hide("slide", { direction: direction }, 750);
                $("#card").show("slide", { direction: "up" }, 500);

                $("#card").flip('toggle');
                next++;
                sleep(200);
                if(next < flashcardList.length){
                    $.ajax({
                    type: "POST",
                        url: "/flashcards/attempt/" + $("#id").val() + "/" + e.which ,
                        data: {id:$("#id").val(),which:e.which},
                        dataType: "json",

                        success: function(data) {

                            $("#front").html('<img class="contain" src="' + flashcardList[next].front + '" alt="plane image">');
                            $("#id").val(flashcardList[next].id);
                            $("#index").val(next);
                            // sleep(50);
                            $("#back").html(flashcardList[next].back);
                        },
                        error: function(data){
                        alert("fail");
                        // add in redirect to results page here
                        }
                    });
                }else{
                  $("#front").html('You have completed all of the flashcards!<br> The Modal will close in 5 seconds.');
                  $("#back").html('Done');
                   
                    setTimeout(function(){
                       location.reload();
                    }, 4000);
                }
            }   
        });
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
@stop
