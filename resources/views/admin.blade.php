@extends('layout')

@section('title', 'My Profile')

@section('headjs')
    <!--script src='js/jquery.min.js'></script-->
    <script src='js/moment.min.js'></script>
    <script src='js/bootstrap-datetimepicker.min.js'></script>
@endsection


@section('content')
    <div class="main-area">

        @include('modal.addMember')
        @include('common.flashMessages')


        <div class="row">
            <div class="col-md-12">
                <h3>Admin Section</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddMemberModal">Add Member</button>
            </div>
        </div>
    </div>
@stop