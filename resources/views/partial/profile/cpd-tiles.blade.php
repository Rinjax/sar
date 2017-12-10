<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-body
            @if($member->navDays < 250 && $member->navDays > 100)cpd-panel-warning
            @elseif($member->navDays <= 100)cpd-panel-danger
            @endif">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center"><strong>Navs</strong></p>
                        <img class="img-responsive center-block" src="/img/silver-compass.png" alt="water">
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center" style="padding-top: 1rem;">Completed on: {{$member->navs}}</p>
                        <p class="text-center" style="font-size: 2rem;">
                            {{$member->navsDays}} Days
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-body
            @if($member->firstaidDays < 250 && $member->firstaidDays > 100)cpd-panel-warning
                @elseif($member->firstaidDays <= 100)cpd-panel-danger
                @endif">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center"><strong>First Aid</strong></p>
                        <img class="img-responsive center-block" src="/img/first-aid.png" alt="water">
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center" style="padding-top: 1rem;">Completed on: {{$member->firstaid}}</p>
                        <p class="text-center" style="font-size: 2rem;">
                            {{$member->firstaidDays}} Days
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-body
            @if($member->firnessDays < 250 && $member->fitnessDays > 100)cpd-panel-warning
            @elseif($member->fitnessDays <= 100)cpd-panel-danger
            @endif">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center"><strong>Fitness</strong></p>
                        <img class="img-responsive center-block" src="/img/fitness.png" alt="water">
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center" style="padding-top: 1rem;">Completed on: {{$member->fitness}}</p>
                        <p class="text-center" style="font-size: 2rem;">
                            {{$member->fitnessDays}} Days
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-body
            @if($member->waterDays < 250 && $member->waterDays > 100)cpd-panel-warning
                @elseif($member->waterDays <= 100)cpd-panel-danger
                @endif">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center"><strong>Water Safety</strong></p>
                        <img class="img-responsive center-block" src="/img/water.png" alt="water">
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center" style="padding-top: 1rem;">Completed on: {{$member->water}}</p>
                        <p class="text-center" style="font-size: 2rem;">
                            {{$member->waterDays}} Days
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>