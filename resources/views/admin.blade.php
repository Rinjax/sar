@extends('layout')

@section('title', 'My Profile')

@section('headjs')
    <!--script src='js/jquery.min.js'></script-->
    <script src='js/moment.min.js'></script>
    <script src='js/bootstrap-datetimepicker.min.js'></script>
    <script src='js/addMemberIncDog.js'></script>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#datetimepickerDog').datetimepicker({
                inline: true,
                sideBySide: true,
                stepping: 15,
                format: ('YYYY-MM-DD')
            });
        });
    </script>
@endsection

@section('content')
    <div class="main-area">

        @include('modal.addMember')


        <div class="row">
            <div class="col-md-12">
                <h3>Admin Section</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddMemberModal">Add Member</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Admin Section</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adjustRoles">Add roles</button>
            </div>
        </div>
    </div>

@endsection






