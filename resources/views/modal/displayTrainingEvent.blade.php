<!-- ModalEvent (training) -->
<div class="modal fade" id="modalEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="modalLocation">
                            <div id="locationName"></div>
                            <div id="locationGrid"></div>
                            <div id="locationPost"></div>
                        </div>
                        <textarea readonly id="notes" name="notes" placeholder="Notes..."></textarea>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-striped table-condensed" id="attendanceTable">
                            <thead>
                            <tr>
                                <th>Attending:</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{!! route('attendEvent') !!}">{{ csrf_field() }}
                    <input hidden id="cal_id" name="cal_id" value=""></input>
                    <input hidden id="cal_type" name="cal_type" value=""></input>

                    @if (Auth::user()->hasPermission('Mock Assessor'))
                        <a href="{!! url('/modifyEvent/') !!}/" class="btn btn-primary pull-left js-modify-btn"><span class="icon-pencil"></span> Modify</a>
                        <a href="{!! url('/timesheet/') !!}/" class="btn btn-primary pull-left js-timesheet-btn"><span class="icon-stopwatch"></span> Timesheet</a>
                    @endif
                    <button type="submit" id="calAttendButton" name="calButton" value="attend" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Attend</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban fa-fw"></i>Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
