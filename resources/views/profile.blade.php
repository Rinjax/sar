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
            <div class="col-md-12">
                <h1>brrrr</h1>
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