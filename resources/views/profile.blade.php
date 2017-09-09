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
        @include('common.flashMessages')

        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title"><strong>{{$member->name}}</strong> - {{$member->getPriRole()->role}}</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                <div class="space-bottom-2" style="height: 20rem;">
                                    <div class="pull-left profilepic">
                                        <img class="img-responsive img-rounded" src="img/{{$member->name}}.jpg" alt="profile pic"/>
                                    </div>
                                    <div class="text-left">
                                        <p>Call Sign: <strong>{{$member->callsign}}</strong></p>
                                        <p>Contact: <a href="#" data-toggle="modal" data-target="#updateMob"><strong>{{$member->contact}}</strong></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-1">
                                <div class="space-bottom-2">
                                    <img class="img-responsive center-block" src="/img/silver-compass.png" alt="compass">
                                    <h4 class="text-center"> Completed: {{$silvernavs}}</h4>    
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-1">
                                <div class="space-bottom-2">
                                    <img class="img-responsive center-block" src="/img/first-aid.png" alt="first aid">
                                    <h4 class="text-center">Expires on: {{$firstaid}}</h4>
                                    <p class="text-center">
                                        <small>{{$daysLeft1}} days left</small>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-1">
                                <div class="space-bottom-2">
                                    <img class="img-responsive center-block" src="/img/fitness.png" alt="fitness">
                                    <h4 class="text-center">Expires on: {{$fitness}}</h4>
                                    <p class="text-center">
                                        <small>{{$daysLeft3}} days left</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-1">
                                <div class="space-bottom-2">
                                    <img class="img-responsive center-block" src="/img/water.png" alt="water">
                                    <h4 class="text-center">Expires on: {{$water}}</h4>
                                    <p class="text-center">
                                        <small>{{$daysLeft2}} days left</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
        <div class="col-md-3">
                <h4>Team Roles Assigned:</h4>
                <table class="table table-striped table-bordered">
                    @foreach($member->roles as $role)
                    <tr>
                        <td>{{ $role->role }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>


        <div class="row">
            @include('partial.profile.admin')
            {!! route('profile') !!}
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