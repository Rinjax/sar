@extends('layout')

@section('title', 'Training Officer (Humans)')


@section('content')
    <div class="main-area">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive center-table-text">
                    <tr>
                        <th>Member</th>
                        <th>Water</th>
                        <th>First Aid</th>
                        <th>Fitness</th>
                        <th>Navs</th>
                    </tr>
                    @foreach($members as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>{{$member->waterDays}}</td>
                            <td>{{$member->firstaidDays}}</td>
                            <td>{{$member->fitnessDays}}</td>
                            <td>{{$member->navsDays}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

