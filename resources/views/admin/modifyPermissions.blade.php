@extends('layout')

@section('title', 'Permission Admin')


@section('content')

    @include('modal.addPermission')

    <div class="main-area">
        @foreach($permissions as $permission)
            <div class="panel panel-primary" style="margin-bottom: 9rem">
                <div class="panel-heading" style="padding-bottom: 2rem">
                    <div>
                        <p class="panel-title text-center">
                            Permission: <strong>{{$permission->permission}}</strong>
                            <a href="#" id="add_{{$permission->id}}" data-toggle="modal" data-target="#AddPermissionModal" class="btn btn-success pull-right js-btn-add">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </p>

                    </div>

                </div>


                <table class="table table-stripped center-table-text">
                    <tr>
                        <th>Img</th>
                        <th>Name</th>
                        <th>CallSign</th>
                        <th>#</th>
                    </tr>
                    @foreach($permission->members as $member)
                        <tr class="text-left">
                            <td><img class="img-circle img-responsive center-block" src="img/profile/humans/{{$member->profile_pic}}" alt="Human" style="max-height: 5rem;"></td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->callsign}}</td>
                            <td>
                                <a href="#" id="rm_{{$member->id}}" class="btn btn-danger js-btn-remove"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        @endforeach
    </div>

@endsection



@section('scripts')
    <script>
        $('.js-btn-add').click(function () {

            var membersList = $.get('{{url('/test')}}');

            $(this).attr('id')

            $.each(membersList, function (k, v) {
                console.log(membersList);
                $('#members-list').append('<option value="element.id">element.name</option>');
            });

        });
    </script>
@endsection