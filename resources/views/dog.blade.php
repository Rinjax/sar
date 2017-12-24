@extends('layout')

@section('title', 'My Dog')


@section('content')
    <div class="main-area">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                @include('partial.dog.details')
            </div>
            <div class="col-xs-12 col-md-6">
                @if ($dog->level > 1)
                    @include('partial.dog.operational-ticket')
                @endif
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
