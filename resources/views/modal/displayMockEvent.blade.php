
<!-- ModalMock -->
<div class="modal fade" id="modalMock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mockModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-condensed" id="assessorTable">
                            <thead>
                            <tr>
                                <th>Assessors:</th>
                                <th>Handler:</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="modalLocation">
                            <img class="pull-right" src="img/map_icon.png" alt="map_icon"/>
                            <div id="mockLocationName"></div>
                            <div id="mockLocationGrid"></div>
                            <div id="mockLocationPost"></div>
                        </div>
                        <textarea readonly id="mockNotes" name="notes" placeholder="Notes..."></textarea>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-striped table-condensed" id="mockAttendanceTable">
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
                <form method="POST" action="{!! route('attendMock') !!}">{{ csrf_field() }}
                    <input hidden id="mock_id" name="mock_id" value=""></input>
                    <input hidden id="mock_cal_type" name="cal_type" value=""></input>

                    @if ($bookButton)
                        <button type="submit" id="bookButton" name="calButton" value="book" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Book</button>
                    @endif

                    <button type="submit" id="mockAttendButton" name="calButton" value="attend" class="btn btn-primary"><i class="fa fa-check fa-fw"></i>Attend</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban fa-fw"></i>Close</button>
                </form>
            </div>
        </div>
    </div>
</div>