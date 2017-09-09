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
                                <input id="name" name="name" class="form-control"  type="text" placeholder="Jon Smith"></input>
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact Mobile:</label>
                                <input id="contact" name="contact" class="form-control" type="tel" placeholder="07123456789"></input>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input id="email" name="email" class="form-control" type="email" placeholder="jon.smith@searchdogssussex.com"></input>
                            </div>

                            <div class="form-group">
                                <label for="contact">Call Sign:</label>
                                <select id="callsign" name="callsign" class="form-control">
                                    @foreach($freeCallsigns as $callsign)
                                        <option value="{{$callsign}}">{{$callsign}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-5">
                                    <div class="role-select-box">
                                        <select multiple="multiple" id='lstBox1' class="form-control">
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-2">
                                    <div class="role-select-arrows text-center">
                                        <button type="button" id="btnAllRight" value="" class="btn btn-default"><span class="fa fa-angle-double-down" style="font-size: 2.2rem;"></span></button>
                                        <input type="button" id="btnRight" value=">" class="btn btn-default" />
                                        <input type="button" id="btnLeft" value="<" class="btn btn-default" />
                                        <input type="button" id="btnAllLeft" value="<<" class="btn btn-default" />
                                    </div>
                                </div>


                                <div class="col-xs12 col-md-5">
                                    <div class="role-select-box">
                                        <select multiple="multiple" id='lstBox2' class="form-control">

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-check" style="padding-top: 1rem;">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Include Dog
                                </label>
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