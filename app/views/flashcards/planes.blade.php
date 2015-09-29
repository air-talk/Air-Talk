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
                            <div id="card">
                                <div class="front img"> 
                                    <img class="helper" src="{{$flashcards[0]->front}}">
                                </div> 
                                <div class="back">
                                    <h3 id="plane_name">{{$flashcards[0]->back}}</h3>
                                    <div class="col-xs-6">
                                        <button class="btn btn-danger btn-block"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>I was wrong</button>
                                    </div>
                                    <div class="col-xs-6">   
                                        <button class="btn btn-success btn-block">I was right<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></button>
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
                                <th>Practice</th>
                                <th>Name</th>
                                {{-- Look into created_at column in correctAnswers table for last practiced--}}
                                <th>Last practiced</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flashcards as $flashcard)
                            <tr>
                                <td>
                                    <div class="checkbox">
                                      <label>
                                        <input id="{{$flashcard->id}}" type="checkbox" value="" >
                                      </label>
                                    </div>
                                </td>
                                <td>{{$flashcard->back}}</td>
                                {{-- change later --}}
                                <td>{{$flashcard->created_at}}</td>
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
        var card_face = 'front';
        var i = 1;
        $("#card").flip({
          axis: 'x',
          reverse: true,
          forceHeight: true
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
            if(card_face == 'front'){
                card_face = 'back'
            }else{
                card_face = 'front';
            }
          }
        });
        
        // got anser right, or wrong store in attempts table
        $(document).keyup(function(e) {
            if(e.which == 39 && card_face == 'back' || e.which == 37 && card_face == 'back' ) {
                var next = parseInt($("#index").val());
                next++;
                console.log(next);
                $.ajax({
                type: "POST",
                    url: "../flashcards/attempt" ,
                    data: {id:$("#id").val(),which:e.which},
                    dataType: "json",

                    success: function(data) {

                        $("#front").html(flashcardList[next].front);
                        $("#back").html(flashcardList[next].back);
                        $("#id").val(flashcardList[next].id);
                        $("#index").val(next);
                        $("#card").flip('toggle');
                        card_face = 'front';
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
