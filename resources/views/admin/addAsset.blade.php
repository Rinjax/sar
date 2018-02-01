@extends('layout')

@section('title', 'Asset Admin')


@section('content')

    <div class="main-area">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
                <form id="form" method="post" action="{!! route('timesheet.post')  !!}">{{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">Add New Asset</div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="name">Manufacturer:</label>
                                <input id="manufacturer" name="manufacturer" class="form-control"  type="text" placeholder="Motorola">
                            </div>

                            <div class="form-group">
                                <label for="name">Model:</label>
                                <input id="model" name="model" class="form-control"  type="text" placeholder="DP4801">
                            </div>

                            <div class="form-group">
                                <label for="name">Supplier:</label>
                                <select id="supplier" name="supplier" class="form-control">

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Purchase Price:</label>
                                <input id="purchasePrice" name="purchasePrice" class="form-control"  type="text" placeholder="Motorola">
                            </div>

                            <div class="form-group">
                                <label for="name">Purchase Date:</label>
                                <input id="purchaseDate" name="purchaseDate" class="form-control"  type="text" placeholder="Motorola">
                            </div>

                            <div class="form-group">
                                <label for="name">Assigned to Member:</label>
                                <input id="assignedMember" name="assignedMember" class="form-control"  type="text" placeholder="Motorola">
                            </div>

                            <div class="form-group">
                                <label for="name">SD Asset Numeber:</label>
                                <input id="assetNumber" name="assetNumber" class="form-control"  type="text" placeholder="Motorola">
                            </div>

                            <div class="form-group">
                                <label for="name">Serial Number:</label>
                                <input id="serialNumber" name="serialNumber" class="form-control"  type="text" placeholder="Motorola">
                            </div>

                            <div class="form-group">
                                <label for="name">Description:</label>
                                <input id="description" name="description" class="form-control"  type="text" placeholder="Motorola">
                            </div>


                        </div>
                        <div class="panel-footer">
                            <input type="submit" value="Save" class="btn btn-primary pull-right">
                            <a href="{!! route('calendar') !!}" class="btn btn-danger">Close</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

@endsection