@extends('layout')

@section('title', 'Training Officer (Humans)')


@section('content')
    <div class="main-area">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive">
                    <tr>
                        <th>Member</th>
                        <th>First Aid</th>
                        <th>Fitness</th>
                        <th>Navs</th>
                        <th>Water Safety</th>
                    </tr>
                    @foreach($members as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>{{$member->firstaid}}</td>
                            <td>{{$member->fitness}}</td>
                            <td>{{$member->silvernavs}}</td>
                            <td>{{$member->waterSafety}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

