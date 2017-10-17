@extends('layout')

@section('title', 'My Profile')

@section('headjs')
    <!--script src='js/jquery.min.js'></script-->
    <script src='js/moment.min.js'></script>
    <script src='js/bootstrap-datetimepicker.min.js'></script>
@endsection


@section('content')
    <div class="main-area">
        
        @include('modal.updateMobile')

        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title"><strong>{{$member->name}}</strong> - {{$member->getPriRole()->role}}</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <div class="space-bottom-2" style="height: 20rem;">
                                    <div class="pull-left profilepic">
                                        <img class="img-responsive img-rounded" src="img/{{$member->name}}.jpg" alt="profile pic"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="text-left">
                                    <h4 style="margin-top: 0"><strong>Member Details</strong></h4>
                                    <p><strong>Call Sign: </strong>{{$member->callsign}}</p>
                                    <p><strong>Contact: </strong><a href="#" data-toggle="modal" data-target="#updateMob">{{$member->contact}}</a></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-1">
                                <div class="space-bottom-2">
                                    <p class="text-center"><strong>Silver Navs</strong></p>
                                    <img class="img-responsive center-block" src="/img/silver-compass.png" alt="compass">
                                    <p class="text-center" style="padding-top: 0.7rem;">{{$member->silvernavs}}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-1">
                                <div class="space-bottom-2">
                                    <p class="text-center"><strong>First Aid</strong></p>
                                    <img class="img-responsive center-block" src="/img/first-aid.png" alt="first aid">
                                    <p class="text-center" style="padding-top: 1rem;">{{$member->firstaid}}</p>
                                    <p class="text-center">
                                        <small>{{$member->firstaid_daysLeft}}</small>
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-1">
                                <div class="space-bottom-2">
                                    <p class="text-center"><strong>Fitness Test</strong></p>
                                    <img class="img-responsive center-block" src="/img/fitness.png" alt="fitness">
                                    <p class="text-center" style="padding-top: 1rem;">{{$member->fitness}}</p>
                                    <p class="text-center">
                                        <small>{{$member->fitness_daysLeft}}</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-1">
                                <div class="space-bottom-2">
                                    <p class="text-center"><strong>Water Safety</strong></p>
                                    <img class="img-responsive center-block" src="/img/water.png" alt="water">
                                    <p class="text-center" style="padding-top: 1rem;">{{$member->waterSafety}}</p>
                                    <p class="text-center">
                                        <small>{{$member->waterSafety_daysLeft}}</small>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <h4>Training Attendance This Year: {{$trainingPercent}}%</h4>
                            </div>
                        </div>



                        @if(Auth::user()->hasRole('Assessor'))
                            <div class="row">
                                <div class="col-sm-12">
                                    @include('partial.profile.admin')
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                inline: true,
                sideBySide: true,
                stepping: 15,
                format: ('YYYY-MM-DD HH:mm')
            });
        });
    </script>
@endsection