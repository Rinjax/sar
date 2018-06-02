@extends('layout')

@section('title', 'Equipment Officer')


@section('content')

    <div class="main-area">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h3 class="text-center">Assests</h3>
                <table class="table table-striped center-table-text">
                    <tr>
                        <th>Asset#</th>
                        <th>Serial#</th>
                        <th>Item</th>
                        <th>Member</th>
                    </tr>
                    @foreach($equipment as $equip)
                        <tr>
                            <td>{{$equip->asset_number}}</td>
                            <td>{{$equip->serial_number}}</td>
                            <td>{{$equip->product->item}}</td>
                            <td>{{$equip->member->name}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="col-sm-12 col-md-6">
                <h3 class="text-center">Stock</h3>
                <table class="table table-striped center-table-text">
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Item</th>
                        <th>Qty</th>
                    </tr>
                    @foreach($stock as $st)
                        <tr>
                            <td>{{$st->product->manufacturer}}</td>
                            <td>{{$st->product->model}}</td>
                            <td>{{$st->product->item}}</td>
                            <td>{{$st->qty}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

@endsection
