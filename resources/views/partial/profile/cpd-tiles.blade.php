<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-body
                @if($member->navDays < 250 && $member->navDays > 100)cpd-panel-warning
                @elseif($member->navDays <= 100)cpd-panel-danger
                @endif">
                <p class="text-center"><strong>Navs</strong></p>
                <img class="img-responsive center-block" src="/img/silver-compass.png" alt="compass">
                <p class="text-center" style="padding-top: 0.7rem;">{{$member->navs}}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-warning">
            <div class="panel-body cpd-panel-danger">
                <p class="text-center"><strong>First Aid</strong></p>
                <img class="img-responsive center-block" src="/img/first-aid.png" alt="first aid">
                <p class="text-center" style="padding-top: 1rem;">{{$member->firstaid}}</p>
                <p class="text-center">
                    <small>{{$member->firstaid_daysLeft}}</small>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-success">
            <div class="panel-body">
                <p class="text-center"><strong>Fitness Test</strong></p>
                <img class="img-responsive center-block" src="/img/fitness.png" alt="fitness">
                <p class="text-center" style="padding-top: 1rem;">{{$member->fitness}}</p>
                <p class="text-center">
                    <small>{{$member->fitness_daysLeft}}</small>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div id="waterPanel" class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center"><strong>Water Safety</strong></p>
                        <img class="img-responsive center-block" src="/img/water.png" alt="water">
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center" style="padding-top: 1rem;">Completed on: {{$member->water}}</p>
                        <p class="text-center" style="font-size: 3rem;">
                            {{$member->waterDays}} Days
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>