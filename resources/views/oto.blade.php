@extends('layout')

@section('title', 'Training Officer (Dogs)')


@section('content')
    <div class="main-area">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center">Total of {{count($dogs)}} dogs in the team</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <table class="table table-responsive table-striped table-bordered">
                    <h3 class="text-center">All dogs</h3>
                    <tr>
                        <th>Name</th>
                        <th>Breed</th>
                        <th>Started</th>
                    </tr>
                    @foreach($dogs as $dog)
                        <tr>
                            <td>{{$dog->name}}</td>
                            <td>{{$dog->breed}}</td>
                            <td>{{$dog->start_program->format('d-m-Y')}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>


            <div class="col-md-3">
                <table class="table table-responsive table-striped table-bordered">
                    <h3 class="text-center">L1 dogs</h3>
                    <tr>
                        <th>Name</th>
                        <th>Next Assessment Due</th>
                    </tr>
                    @foreach($dogs as $dog)
                        @if ($dog->level == 1)
                            <tr>
                                <td>{{$dog->name}}</td>
                                <td>{{$dog->op_ticket_exp->format('d-m-Y')}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>

            <div class="col-md-3">
                <table class="table table-responsive table-striped table-bordered">
                    <h3 class="text-center">L2 dogs</h3>
                    <tr>
                        <th>Name</th>
                        <th>Ticket Expiry</th>
                    </tr>
                    @foreach($dogs as $dog)
                        @if ($dog->level == 2)
                            <tr>
                                <td>{{$dog->name}}</td>
                                <td>{{$dog->op_ticket_exp->format('d-m-Y')}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>

            <div class="col-md-3">
                <table class="table table-responsive table-striped table-bordered">
                    <h3 class="text-center">L3 dogs</h3>
                    <tr>
                        <th>Name</th>
                        <th>Ticket Expiry</th>
                    </tr>
                    @foreach($dogs as $dog)
                        @if ($dog->level == 3)
                            <tr>
                                <td>{{$dog->name}}</td>
                                <td>{{$dog->op_ticket_exp->format('d-m-Y')}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            @include('partial.oto.admin')
            {!! route('profile') !!}
        </div>
    </div>

@endsection
