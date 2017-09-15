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

    
    <!-- Calendar -->

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
