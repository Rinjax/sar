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
                        <th>Remove</th>
                    </tr>
                    @foreach($permission->members as $member)
                        <tr class="text-left">
                            <td><img class="img-circle img-responsive center-block" src="img/profile/humans/{{$member->profile_pic}}" alt="Human" style="max-height: 5rem;"></td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->callsign}}</td>
                            <td>
                                <a href="#" id="rm_{{$member->id}}_{{$permission->id}}" class="btn btn-danger js-btn-remove"><span class="glyphicon glyphicon-remove"></span></a>
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

            var id = $(this).attr('id').replace('add_','');

            $('#permision_id').val(id);

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '{{url('/permission-members')}}/' + id,
                success: function(responseData){
                    for(var key in responseData){
                    }
                    $.each(responseData, function (k,v){
                        $('#members-list').append('<option value="'+v.id+'">'+v.name+'</option>');
                    });
                }
            });
        });
    </script>

    <script>
        // function on modal close to clear out the data from the last displayed
        $(document).on('hide.bs.modal','#AddPermissionModal', function () {
            $('#members-list').children('option').remove();
        });
    </script>

    <script>
        $('.js-btn-remove').click(function(){

            var id = $(this).attr('id').replace('rm_','');

            $(this).closest('tr').remove();

            $.ajax({
                type: 'POST',
                dataType: 'text',
                url: '{{url('/permission-member/remove')}}',
                data: {'id' : id},
                success: function(){
                    console.log('success function fired');
                    //$(this).closest('tr').remove(); scope of this not correct.
                }
            });
        });
    </script>
@endsection