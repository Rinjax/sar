@extends('layout')

@section('title', 'File System')


@section('content')
    <div class="main-area">
        <div class="row">
            <div class="col-xs-12">
                <form id="fileUpload" action="{!! route('filesystem.upload.policevet') !!}" class="dropzone"></form>{!! csrf_field() !!}
            </div>
        </div>
    </div>

    <nav>

    </nav>
@endsection



@section('scripts')
<script>
    Dropzone.options.fileUpload = {
        headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
        success: function (file, response) {
            console.log('fire');
            $(".dz-success-mark svg").css("background", "green").addClass('img-circle');
            $(".dz-success-mark").fadeTo("slow", 1);

        }
    }

</script>
@endsection