@extends('layout')

@section('headcss')
    <link rel='stylesheet' href='css/bootstrap-datetimepicker.min.css' />
    <link rel='stylesheet' href='css/fullcalendar.css' />
@endsection

@section('headjs')
    <!--script src='js/jquery.min.js'></script-->
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src='js/bootstrap-datetimepicker.min.js'></script>
    <script src='js/calendar.js'></script>
@endsection

@section('title', 'Calendar')


@section('content')

    @include('modal.displayMockEvent')
    @include('modal.displayTrainingEvent')
    @include('modal.addcalendarevent')
    @include('modal.addmockevent')

    
    <!-- Calendar -->

    <div class="row space-bottom-2">
        <div class="col-xs-12">
            <h3 class="text-center">Admin Buttons</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">Add Training</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMockModal">Add Mock</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class='' id='calendar' style="padding: 1rem;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
