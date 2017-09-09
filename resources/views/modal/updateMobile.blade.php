<!-- Modal -->
<div id="updateMob" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="{!! route('updatemob.post') !!}" method="post">
                {!! csrf_field() !!}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Mobile Number</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="newMob">Mobile:</label>
                        <input type="text" class="form-control" id="newMob" name="newMob" placeholder="{{$member->contact}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="save" class="btn btn-default">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal End -->