<!-- Modal - MOCK  -->
<div class="modal fade" id="addMockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{!! route('addMock') !!}">{{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Mock Assessment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="location">Location:</label>
                            <select id="location" name="location" class="form-group">
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{ $location->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="location">Assessor 1:</label>
                            <select id="assessor1" name="assessor1" class="form-group">
                                <option value="{{Auth::id()}}">{{Auth::user()->name}} </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="location">Assessor 2:</label>
                            <select id="assessor2" name="assessor2" class="form-group">
                                @foreach($assessors2 as $assessor)
                                    <option value="{{$assessor->id}}">{{ $assessor->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <input hidden id="cal_type" name="cal_type" value="Mock Assessment">
                    <input hidden class="js-datetimepicker" id="datetimepicker" name="datetimepicker" data-format="yyyy-MM-dd hh:mm" type="datetime">
                    <textarea id="notes" name="notes" rows="4" cols="60" placeholder="Notes..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban fa-fw"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Save</button>

                </div>
            </form>
        </div>
    </div>
</div>