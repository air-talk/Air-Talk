@extends('layouts.master')
@section('head')

    <style type="text/css">
        h3{
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <h1>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
                <h3 id="non-towered_progress">Nontowered Airport Quiz Progress</h3>
                <h3 id="class-b_progress">B Airport Quiz Progress</h3>
                <h3 id="class-c_progress">C Airport Quiz Progress</h3>
                <h3 id="class-d_progress">D Airport Quiz Progress</h3>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript">
        var non_towered = {{ QuestionsController::percentageNontowered()}};
        var class_b = {{ QuestionsController::percentageClassb()}};
        var class_c = {{ QuestionsController::percentageClassc()}};
        var class_d = {{ QuestionsController::percentageClassd()}};

        $("#non-towered_progress").html('<img src="/images/airbus.png" style="width: 5%; margin-right:2%;" alt="airbus">Nontowered Airport Quiz Progress <span class="pull-right">%'+non_towered+'</span>');
        $("#class-b_progress").html('<img src="/images/windsock.png" style="width: 5%; margin-right: 2%;" alt="windsock"> B Airport Quiz Progress <span class="pull-right">%'+class_b+'</span>');
        $("#class-c_progress").html('<img src="/images/helicopter.png" style="width: 5%; margin-right: 2%;" alt="helicopter"> C Airport Quiz Progress <span class="pull-right">%'+class_c+'</span>');
        $("#class-d_progress").html('<img src="/images/singleprop.png" style="width: 5%; margin-right: 2%;" alt="singleprop"> D Airport Quiz Progress <span class="pull-right">%'+class_d+'</span>');

    </script>
@stop