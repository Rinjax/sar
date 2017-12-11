@extends('layout')

@section('title', 'Dashboard')


@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="panel">
                <table class="table center-table-text">
                    <tr class="" style="background-color: #7f7f7f">
                        <th>Pic</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Call Sign</th>
                    </tr>
                    @foreach($members as $member)
                        <tr>
                            <td>
                                <img class="img-circle img-responsive center-block" src="img/profile/humans/{{$member->profile_pic}}" alt="Human" style="max-height: 7rem;">
                            </td>
                            <td>{{$member->name}}</td>
                            <td>role</td>
                            <td>{{$member->callsign}}</td>
                        </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>


@endsection
