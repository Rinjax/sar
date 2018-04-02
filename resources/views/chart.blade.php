@extends('layout')

@section('title', 'Training Officer (Dogs)')


@section('content')
    <div class="main-area">
        <div class="row">
            {!! $chart->html() !!}
        </div>
    </div>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection
