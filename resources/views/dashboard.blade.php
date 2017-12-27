@extends('layout')

@section('title', 'Dashboard')


@section('content')

    <div class="main-area">

        @include('partial.dashboard.count-tiles')

        <div class="row">
            <div class="col-xs-12 col-md-6">
                @include('partial.dashboard.member-table')
            </div>
            <div class="col-xs-12 col-md-6">
                @include('partial.dashboard.dog-table')
            </div>
        </div>

    </div>




@endsection
