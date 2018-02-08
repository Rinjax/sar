<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">Equipment</h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-responsive center-table-text">
                    <tr>
                        <th>Asset#</th>
                        <th>Item</th>
                        <th>Manufacturer</th>
                        <th>Model</th>
                        <th>Img</th>
                    </tr>
                    @foreach($member->assets as $asset)
                        <tr>
                            <td>{{$asset->asset_number}}</td>
                            <td>{{$asset->product->item}}</td>
                            <td>{{$asset->product->manufacturer}}</td>
                            <td>{{$asset->product->model}}</td>
                            <td><img class="img-circle img-responsive center-block" src="img/products/{{$asset->product->img}}" alt="#" style="max-height: 6rem;"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>