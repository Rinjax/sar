<!-- Team Training Modal -->
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{!! route('addTraining') !!}">{{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><b>Add Training Event</b></h4>
                </div>
                <div class="modal-body">
                    <label for="location">Location:</label>
                    <select id="location" name="location" class="form-group">
                        @foreach($locations as $location)
                            <option value="{{$location->name}}">{{ $location->name }} </option>
                        @endforeach
                    </select>
                    <input hidden id="datetimepicker1" name="datetimepicker1" data-format="yyyy-MM-dd hh:mm" type="datetime"/>
                    <input hidden id="cal_type" name="cal_type" value="new"/>
                    <textarea id="notes" name="notes" placeholder="Notes..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>