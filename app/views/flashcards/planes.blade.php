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
                    <p>Use your spacebar or click to reveal the Definition</p>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div id="card" data-face="front">
                                <div class="front img" id="front"> 
                                </div> 
                                <div class="back">
                                    <div id="back">
                                        
                                    </div>
                                    <form action="#" method="post">
                                        <input type="hidden" name="index" id="index" value="">
                                        <input type="hidden" name="id" id="id" value="">
                                        <div class="col-md-6">
                                            <button class="btn btn-danger btn-block"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>I was wrong</button>
                                        </div>
                                        <div class="col-md-6">   
                                            <button class="btn btn-success btn-block">I was right<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></button>
                                        </div>
                                    </form>
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
                                <th>Plane</th>
                                {{-- Look into created_at column in correctAnswers table for last practiced--}}
                                <th>Times practiced</th>
                                <th>Times Correct</th>
                                <th> % </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unansweredFlashcards as $flashcard)
                                <tr>
                                    <td><strong>{{$flashcard->back}}</strong></td>
                                    {{-- change later --}}
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0%</td>
                                </tr>
                            @endforeach
                            @foreach($answeredFlashcards as $test)
                                <tr>
                                    <td><strong>{{{ $test->back }}}</strong></td>
                                    <td>{{{ $test->pivot->attempts }}}</td>
                                    <td>{{{ $test->pivot->correct }}}</td>
                                    <td>{{{ floor($test->pivot->correct / $test->pivot->attempts * 100) }}}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <!-- Trigger the login modal with a button -->
                    <a type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal">Practice Flashcards</a>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </div>
@stop
@section('script')
    <script src="/js/jquery.flip.js"></script>
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



        var card_face = 'front';

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
        
        // got anser right, store in attempts table
        $(document).keyup(function(e) {
            if(e.which == 39 && $('#card').data('face') == 'back' || e.which == 37 && $('#card').data('face') == 'back' ) {
                var next = parseInt($("#index").val());
                $("#card").flip('toggle');
                next++;
                $.ajax({
                type: "POST",
                    url: "/flashcards/attempt/" + $("#id").val() + "/" + e.which ,
                    data: {id:$("#id").val(),which:e.which},
                    dataType: "json",

                    success: function(data) {

                        $("#front").html('<img class="img helper" src="' + flashcardList[next].front + '" alt="plane image">');
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
            }   
        });
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
@stop
