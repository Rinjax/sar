<!-- Modal - MOCK  -->
<div class="modal fade" id="AddMemberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{!! route('addMember') !!}">{{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Member</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input id="name" name="name" class="form-control"  type="text" placeholder="Jon Smith">
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact Mobile:</label>
                                <input id="contact" name="contact" class="form-control" type="tel" placeholder="07123456789">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input id="email" name="email" class="form-control" type="email" placeholder="jon.smith@searchdogssussex.com">
                            </div>

                            <div class="form-group">
                                <label for="contact">Call Sign:</label>
                                <select id="callsign" name="callsign" class="form-control">
                                    @foreach($freeCallsigns as $callsign)
                                        <option value="{{$callsign}}">{{$callsign}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row space-bottom-3">
                                <hr>
                                <h4 class="text-center">Assign Roles</h4>
                                @foreach ($roles as $role)
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-check" style="padding-top: 1rem; padding-left: 30%; font-size: 1.3rem;">
                                            <label class="form-check-label">
                                                <input id="{{$role->id}}" name="rolesarray[]" type="checkbox" class="form-check-input" value="{{$role->id}}">
                                                <small>{{$role->role}}</small>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>



                            <div class="row space-bottom-2">
                                <div class="col-xs-12">
                                    <div class="form-check" style="padding-top: 1rem;">
                                        <label class="form-check-label">
                                            <input id="dogCheckbox" type="checkbox" class="form-check-input" name="includeDog" onclick="incDog">
                                            Include Dog
                                        </label>
                                    </div>
                                </div>
                            </div>

                            @include('modal.addDog')

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban fa-fw"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')


@stop