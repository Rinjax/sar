@extends('layout')

@section('title', 'My Profile')

@section('headjs')
    <!--script src='js/jquery.min.js'></script-->
    <script src='js/moment.min.js'></script>
    <script src='js/bootstrap-datetimepicker.min.js'></script>
@endsection


@section('content')
    <div class="main-area">
        
        @include('modal.updateMobile')

        
        <div class="row">
            <div class="col-md-6">
                @include('partial.profile.details-tile')
            </div>


            <div class="col-md-6">
                @include('partial.profile.cpd-tiles')
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                @include('partial.profile.stats-tile')
            </div>

            <div class="col-md-6">
                @include('partial.profile.equipment-tile')
            </div>
        </div>
    </div>
@endsection





@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                inline: true,
                sideBySide: true,
                stepping: 15,
                format: ('YYYY-MM-DD HH:mm')
            });
        });
    </script>

@endsection