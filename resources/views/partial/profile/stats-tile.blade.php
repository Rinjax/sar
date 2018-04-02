<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">My Stats</h1>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-6">
                {!! $chart->html() !!}
            </div>
            <div class="col-xs-6">
                {!! $chart2->html() !!}
            </div>
        </div>
    </div>
</div>