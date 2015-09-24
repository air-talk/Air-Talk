@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="/css/flashcards.css">

@stop
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2"> 
        <div id="card">
            <div class="front"> 
                {{{ $flashcard->front }}}
            </div> 
            <div class="back">
                {{{ $flashcard->back }}}
                <p></p>
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

@stop
@section('script')
    <script src="/js/jquery.flip.js"></script>
    <script type="text/javascript">
        $("#card").flip({
          axis: 'x',
          reverse: true,
          forceHeight: true
        });

        $(document).keypress(function(e) {
          if(e.which == 32) {
            $("#card").flip('toggle');
            console.log('Enter was pressed');
          }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
@stop