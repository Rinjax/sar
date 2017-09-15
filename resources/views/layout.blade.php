@extends('frame')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-lg-2">
                <nav class="navbar navbar-default navbar-fixed-side">
                    <div class="container">
                        <div class="navbar-header">
                            <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <img class="img-responsive img-circle menu-logo" alt="logo" src="img/SAR logo.png"/>
                            <div class="navbar-brand">SD Members Portal </div>
                        </div>
                        <div class="collapse navbar-collapse">
                            {!! $MyNavBar->asUl( array('class' => 'nav navbar-nav text-center')) !!}
                        <p class="navbar-text hidden-xs">
                            <strong>Made by</strong> Steve Temple
                        </p>
                    </div>
                </div>
            </nav>
        </div>
          
        <div class="col-sm-9 col-lg-10 main-pane">
            <div class="row content-header">
                @yield('title')
            </div>

            @include('common.flashMessages')

            <div id="content">
                @yield('content')
            </div>
        </div>
    </div>


@endsection
    

