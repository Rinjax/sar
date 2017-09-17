@extends('frame')

@section('body')

    <div class="row">
        <div class="col-xs-12 text-center">
            <h1 style="padding-top: 2rem;">Opps! something went wrong</h1>
            <h1>404 error</h1>
            <h2>{{ $exception->getMessage() }}</h2>
            <h3>Could find what was requested</h3>
            <img class="center-block" src="/img/dog-poop.jpg" alt="404">
        </div>
    </div>

@stop