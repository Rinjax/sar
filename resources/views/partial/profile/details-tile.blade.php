<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title"><strong>{{$member->name}}</strong> -
            @foreach($member->roles as $role){{$role->role .', '}}@endforeach</h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="space-bottom-2" style="height: 20rem;">
                    <div class="pull-left profilepic">
                        <img class="img-responsive img-rounded" src="img/profile/humans/{{$member->profile_pic}}" alt="profile pic"/>
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