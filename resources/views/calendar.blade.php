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

    @include('common.flashMessages')
    <!-- ModalEvent (training) -->
    <div class="modal fade" id="modalEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
           
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="modalLocation">
                                <div id="locationName"></div>
                                <div id="locationGrid"></div>
                                <div id="locationPost"></div>
                            </div>
                            <textarea id="notes" name="notes" placeholder="Notes..."></textarea>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-striped table-condensed" id="attendanceTable">
                                <thead>
                                    <tr>
                                        <th>Attending:</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>                   
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{!! route('attendEvent') !!}">{{ csrf_field() }}
                        <input hidden id="cal_id" name="cal_id" value=""></input>              
                        <button type="submit" id="calAttendButton" name="calButton" value="attend" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Attend</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban fa-fw"></i>Close</button>                      
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    
    
    <!-- ModalMock -->
    <div class="modal fade" id="modalMock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="row">
                <div class="col-xs-12">
                    <section class="alerts">
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {!! session()->get('success')!!}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {!! session()->get('error') !!}
                            </div>
                        @endif

                        @if(session()->has('calevent.expired'))
                            <div class="alert alert-danger" role="alert">
                                {!! session()->get('calevent.expired') !!}
                            </div>
                        @endif
                    </section>
                </div>
            </div>

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="mockModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-condensed" id="assessorTable">
                                <thead>
                                    <tr>
                                        <th>Assessor:</th>
                                        <th>Handler:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--tr class="">
                                        <td>Paul Green</td>
                                        <td>Darren Yeates</td>
                                    </tr-->
                                </tbody>                   
                            </table>   
                            <div class="modalLocation">
                                <img class="pull-right" src="img/map_icon.png" alt="map_icon"/>
                                <div id="mockLocationName"></div>
                                <div id="mockLocationGrid"></div>
                                <div id="mockLocationPost"></div>
                                
                            </div> 
                            <textarea id="mockNotes" name="notes" placeholder="Notes..."></textarea>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-striped table-condensed" id="mockAttendanceTable">
                                <thead>
                                    <tr>
                                        <th>Attending:</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>                   
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{!! route('attendMock') !!}">{{ csrf_field() }}
                        <input hidden id="mock_id" name="mock_id" value=""></input>
                        @if ($bookButton)
                        <button type="submit" id="bookButton" name="calButton" value="book" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Book</button>
                        @endif
                        
                        <button type="submit" id="mockAttendButton" name="calButton" value="attend" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Attend</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban fa-fw"></i>Close</button>                      
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Calendar -->
    <div class='' id='calendar'></div>
@endsection
