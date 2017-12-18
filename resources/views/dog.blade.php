@extends('layout')

@section('title', 'My Dog')


@section('content')
    <div class="main-area">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title"><strong>{{$dog->name}}</strong></h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="space-bottom-1">
                                    <img class="img-responsive img-rounded" src="/img/profile/dogs/{{$dog->profile_pic}}" alt="dog pic"/>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="text-left">
                                    <h4 style="margin-top: 0"><strong>Dog Details</strong></h4>
                                    <p>Breed: <strong>{{$dog->breed}}</strong></p>
                                    <p>Level: <strong>{{$dog->level}}</strong></p>
                                    <p>Started: <strong>{{\Carbon\Carbon::parse($dog->started)->format('d / m / Y')}}</strong></p>
                                </div>
                            </div>
                            
                            @if ($dog->level > 1)
                            <div class="col-md-2">
                                <div class="panel panel-success">
                                    <div class="panel-heading text-center">
                                        <h3 class="panel-title">Ticket Expiry:</h3>
                                    </div>
                                    <div class="panel-body text-center">
                                        <p><small>Days Left: {{$ticket_days}}</small></p>
                                        <p class="ticket"><strong>{{$ticket_exp}}</strong></p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            @else

                            @endif
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="dogassessmenttable">
                <h3>Assessment History:</h3>
                <table class="table table-striped table-bordered">
                    <tr class="text-center">
                        <th>Assessment</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Passed</th>
                        <th>Comments</th>
                    </tr>

                    @foreach ($assessments as $assessment)
                    <tr>
                        <td>{{ $assessment->type }}</td>
                        <td>{{ $assessment->calendar->location->name }}</td>
                        <td class="text-center">{{\Carbon\Carbon::parse($assessment->calendar->start)->format('d / m / Y')  }}</td>
                        <td class="text-center">{{ $assessment->passed ? 'yes':'no' }}</td>
                        <td>{{ $assessment->comment }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>   
        </div>
    </div>

@endsection
