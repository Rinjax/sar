@extends('layout')

@section('headcss')
    <link rel='stylesheet' href='css/bootstrap-datetimepicker.min.css' />
@endsection

@section('headjs')
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src='js/bootstrap-datetimepicker.min.js'></script>
    <script src='js/calendar.js'></script>

@endsection

@section('title', 'Modals')


@section('content')

    <!-- Team Training Modal -->
    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="http://localhost/addEvent">{{ csrf_field() }}
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><b>Add Training Event</b></h4>
                </div>
                <div class="modal-body">
                    <label for="location">Location:</label>
                    <select id="location" name="location" class="form-group">
                        @foreach($locations as $location)
                            <option value="{{$location->name}}">{{ $location->name }} </option>
                        @endforeach
                    </select>
                    <input hidden id="datetimepicker1" name="datetimepicker1" data-format="yyyy-MM-dd hh:mm" type="datetime"></input>
                    
                    <textarea id="notes" name="notes" placeholder="Notes..."></textarea>   
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
      </div>
    </div>
    
    
    
    <!-- Modal - MOCK  -->
    <div class="modal fade" id="addMock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="http://localhost/addMockEvent">{{ csrf_field() }}
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Mock Assessment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="location">Location:</label>
                            <select id="location" name="location" class="form-group">
                                @foreach($locations as $location)
                                    <option value="{{$location->name}}">{{ $location->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="location">Assessor:</label>
                            <select id="assessor" name="assessor" class="form-group">
                                @foreach($assessors as $assessor)
                                    <option value="{{$assessor->username}}">{{ $assessor->username }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input hidden id="datetimepicker2" name="datetimepicker2" data-format="yyyy-MM-dd hh:mm" type="datetime"></input>
                    <textarea id="notes" name="notes" rows="4" cols="60" placeholder="Notes..."></textarea>   
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban fa-fw"></i>Close</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addMock">
      Launch demo modal
    </button>
@endsection
