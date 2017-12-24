<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title"><strong>{{$dog->name}}</strong></h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="space-bottom-1">
                    <img class="img-responsive img-rounded"
                         src="/img/profile/dogs/{{$dog->profile_pic}}" alt="dog pic"/>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="text-left">
                    <h4 style="margin-top: 0"><strong>Dog Details</strong></h4>
                    <p>Breed: <strong>{{$dog->breed}}</strong></p>
                    <p>Level: <strong>{{$dog->level}}</strong></p>
                    <p>
                        Status: <span class="
                            @if($dog->status == 'Training')text-status-purple
                            @elseif($dog->status == 'Operational')text-status-green
                            @elseif($dog->status == 'Non-Operational')text-status-red
                            @endif
                        ">{{$dog->status}}</span>
                    </p>
                    <p>Started:
                        <strong>{{\Carbon\Carbon::parse($dog->started)->format('d / m / Y')}}</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>