@extends('layouts.master')
@section('head')
@stop
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h1>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
                <h3>Untowered Airport Test Progress</h3>
                <h3>A Airport Test Progress</h3>
                <h3>C Airport Test Progress</h3>
                <h3>D Airport Test Progress</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <p>Add</p>
                <p>some</p>
                <p>more</p>
                <p>stuff</p>
            </div>
        </div>
    </div>
@stop