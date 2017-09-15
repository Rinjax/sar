@extends('layout')

@section('title', 'My Dog')


@section('content')
    <div class="main-area">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">{{$name}}</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="space-bottom-1">
                                    <img class="img-responsive img-rounded" src="/img/{{$name}}.jpg" alt="dog pic"/>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="text-left">
                                    <p>Breed: <strong>{{$breed}}</strong></p>
                                    <p>Level: <strong>{{$level}}</strong></p>
                                    <p>Started: <strong>{{$start}}</strong></p>
                                </div>
                            </div>
                            
                            @if ($level > 1)
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



        @if ($level == 1)
            <div class="row">
                <div class="col-md-12">
                    <div class="tabel table-responsive">
                        <h4>Assessment Schedule:</h4>
                        General time line guide
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                <th class="text-center">Stage 1</th>
                                <th class="text-center">Stage 2</th>
                                <th class="text-center">Stage 3</th>
                                <th class="text-center">Stage 4</th>
                                <th class="text-center">Stage 5</th>
                                <th class="text-center">Stage 6</th>
                            </tr>
                            <tr>
                                <td class="text-center">{{ $stage1 }}</td>
                                <td class="text-center">{{ $stage2 }}</td>
                                <td class="text-center">{{ $stage3 }}</td>
                                <td class="text-center">{{ $stage4 }}</td>
                                <td class="text-center">{{ $stage5 }}</td>
                                <td class="text-center">{{ $stage6 }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endif


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
                        <td>{{ $assessment->location }}</td>
                        <td>{{ $assessment->d }}</td>
                        <td>{{ $assessment->passed ? 'yes':'no' }}</td>
                        <td>{{ $assessment->comment }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>   
        </div>
    </div>

@endsection
