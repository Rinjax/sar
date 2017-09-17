@extends('frame')

@section('headcss')

    <link rel="stylesheet" href="/css/login.css"/>

@endsection


@section('body')

    <div class="flex-container login-background">
        <div class="flex-item login-banner">
            <div class="row space-bottom-3">
                <div class="col-xs 12 text-center">
                    <h1><b>Search Dogs Sussex</b></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <img class="pull-right img-responsive hidden-xs" src="/img/chihu.jpg" alt="dog">
                </div>
                <div class="col-xs-4">
                    <img class="center-block img-responsive" src="/img/round-logo.png" alt="dog" style="padding-bottom: 2rem;">
                </div>
                <div class="col-xs-4">
                    <img class="pull-left img-responsive hidden-xs" src="/img/chihu.jpg" alt="dog">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p class="text-center">
                        <a href="{!! Route('login') !!}" class="btn btn-loz">Login</a>
                    </p>

                </div>
            </div>
        </div>
    </div>

@endsection