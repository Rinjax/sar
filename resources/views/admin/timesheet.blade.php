@extends('layout')

@section('title', 'Calendar Admin')

@section('headjs')
    <script src='{{asset('js/bootstrap-datetimepicker.min.js')}}'></script>
@endsection

@section('headcss')
    <link rel='stylesheet' href='css/bootstrap-datetimepicker.min.css' />
    <link rel='stylesheet' href='css/fullcalendar.css' />
@endsection


@section('content')

    <div class="main-area">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
                <form id="form" method="post" action="{!! route('timesheet.post')  !!}">{{csrf_field()}}
                    <input type="hidden" value="{{$event->id}}" name="eventID" id="eventID">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$event->type}}</div>
                        <div class="panel-body">
                            <strong>{{$event->location->name}}</strong>
                            {{\Carbon\Carbon::parse($event->start)->format('H:i - d/m/Y')}}

                            <table class="table table-striped center-table-text">
                                <tr style="background-color: #222222; color: #fff">
                                    <th class="">Member</th>
                                    <th></th>
                                    <th class="">In</th>
                                    <th class="">Out</th>
                                </tr>
                                @foreach($attendance as $attend)
                                    <tr>
                                        <td>{{$attend->member->name}}</td>
                                        <td></td>
                                        <td>
                                            <div class="input-group js-datetimepicker">
                                                <input name="in_{{$attend->member->id}}" class="form-control text-center" type="text" placeholder="{{$attend->clock_in}}">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group  js-datetimepicker">
                                                <input name="out_{{$attend->member->id}}" class="form-control text-center" type="text">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                        <div class="panel-footer">
                            <input type="submit" value="Save" class="btn btn-primary pull-right">
                            <a href="{!! route('calendar') !!}" class="btn btn-danger">Close</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('.js-datetimepicker').datetimepicker({
                format: 'LT',
                stepping: 15,
                format: ('HH:mm')
            });
        });
    </script>
@endsection