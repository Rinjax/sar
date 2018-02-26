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
@endsection



@section('scripts')
<script>
    Dropzone.options.fileUpload = {
        headers: {'X-CSRF-Token': $('input[name="_token"]').val()}
    }
</script>
@endsection