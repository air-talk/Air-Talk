@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="/css/flashcards.css">

@stop
@section('content')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    </button>
                    <h1>Do you know the name of the plane?</h1>
                    <h3>Use your spacebar or click to reveal the Definition</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div id="card">
                                <div class="front img"> 
                                    <img src="{{$flashcards[0]->front}}">
                                </div> 
                                <div class="back">
                                    <h3 id="plane_name">{{$flashcards[0]->back}}</h3>
                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-block">I was wrong</button>
                                    </div>
                                    <div class="col-md-6">   
                                        <button class="btn btn-success btn-block">I was right</button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                                        <input id="{{$flashcard->id}}" type="checkbox" value="">
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
        var i = 1;
        $("#card").flip({
          axis: 'x',
          reverse: true,
          forceHeight: true
        });

        $(document).keypress(function(e) {
          if(e.which == 32) {
            $("#card").flip('toggle');
          }
        });
        
        $(document).keyup(function(e) {
            if(e.which == 37 || e.which == 39) {
                $("#card").flip('toggle');
                $.ajax({
                type: "GET",
                    url: "../planes/info/" + i,
                    data: "",
                    dataType: "json",

                    success: function(data) {
                        $('.front').html("<img src=" + data.front + ">");
                        $('#plane_name').html(data.back);
                        console.log(data.front);
                        console.log(data.back);
                    },
                    error: function(data){
                    alert("fail");

                    }
                });
                i++;
                console.log(i);
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
@stop
