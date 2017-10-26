@extends('layout')

@section('title', 'Calendar Admin')

@section('headjs')
    <!--script src='js/jquery.min.js'></script-->
    <script src='{{asset('js/moment.min.js')}}'></script>
    <script src='{{asset('js/bootstrap-datetimepicker.min.js')}}'></script>
@endsection

@section('content')

    <div class="main-area">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$event->location->name}}</div>
                    <div class="panel-body">
                        <form method="post" action="">{{csrf_field()}}
                            <div class="row space-bottom-2">
                                <div class="col-xs-12">
                                    <div class="space-bottom-2">
                                        <label for="location">Location:</label>
                                        <select id="location" name="location" class="form-group">
                                            @foreach($locations as $location)
                                                <option
                                                        value="{{$location->name}}"
                                                        @if ($location->name == $event->location->name) selected="selected" @endif>
                                                    {{ $location->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input hidden id="datetimepicker1" name="datetimepicker1" data-format="yyyy-MM-dd hh:mm" type="datetime"></input>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12"><h4 class="text-center">Attendance</h4></div>
                            </div>



                            <div class="row">

                                <div class="grid-container member-select-grid">

                                    <div class="grid-item-center">
                                        <p class="text-center">Available Members</p>
                                        <select name="members_select" id="members_select" multiple="multiple" size="8">
                                            @foreach ($availableMembers as $name)
                                                <option value="{{$name->name}}">{{$name->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-item-center">
                                        <span class="icon-tab" style="font-size: 3rem; color: darkgrey"></span>
                                    </div>
                                    <div class="grid-item-center">
                                        <p class="text-center">Members Attended</p>
                                        <select name="members_selected" id="members_selected" multiple="multiple" size="8">
                                            @foreach ($event->attendance as $name)
                                                <option value="{{$name->name}}">{{$name->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        Panel Footer
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                inline: true,
                sideBySide: true,
                stepping: 15,
                format: ('YYYY-MM-DD HH:mm'),
                date: ('{{$event->start}}')
            });
        });
    </script>


    <script type="text/javascript">
        $('#members_select').click(function() {
            return !$('#members_select option:selected').remove().appendTo($('#members_selected'));
        });
        $('#members_selected').click(function() {
            return !$('#members_selected option:selected').remove().appendTo($('#members_select'));
        });
    </script>
@endsection