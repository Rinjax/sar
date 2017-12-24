<div class="row flex-same-height">
    <div class="col-xs-12 col-md-2">
        <div class="panel panel-info" style="background-color: #ffa10a;">

            <div class="panel-body text-center">
                <strong>No. Members</strong>
                <div style="font-size: 4rem;">
                    <span class="glyphicon glyphicon-user"></span>
                    {{\App\Models\member::where('active', 1)->count()}}
                </div>

            </div>
        </div>
    </div>



    <div class="col-xs-12 col-md-2">
        <div class="panel panel-info" style="background-color: #ffa10a;">

            <div class="panel-body text-center">
                <strong>No. Operational Members</strong>
                <div style="font-size: 4rem;">
                    <span class="glyphicon glyphicon-user"></span>
                    {{\App\Models\member::where('status', 'Operational')->where('active',1)->count()}}
                </div>

            </div>
        </div>
    </div>



    <div class="col-xs-12 col-md-2">
        <div class="panel panel-info" style="background-color: #ffa10a;">

            <div class="panel-body text-center">
                <strong>No. Non Operational Members</strong>
                <div style="font-size: 4rem;">
                    <span class="glyphicon glyphicon-user"></span>
                    {{\App\Models\member::where('active', 1)->where('status', 'Training')->count()}}
                </div>

            </div>
        </div>
    </div>



    <div class="col-xs-12 col-md-2">
        <div class="panel panel-info" style="background-color: #952af1;">

            <div class="panel-body text-center">
                <strong>No. Dogs</strong>
                <div style="font-size: 4rem;">
                    <span class="fa fa-paw"></span>
                    {{\App\Models\dog::where('active', 1)->count()}}
                </div>

            </div>
        </div>
    </div>



    <div class="col-xs-12 col-md-2">
        <div class="panel panel-info" style="background-color: #952af1;">

            <div class="panel-body text-center">
                <strong>No. Operational Dogs</strong>
                <div style="font-size: 4rem;">
                    <span class="fa fa-paw"></span>
                    {{\App\Models\dog::where('status', 'Operational')->where('active',1)->count()}}
                </div>

            </div>
        </div>
    </div>



    <div class="col-xs-12 col-md-2">
        <div class="panel panel-info" style="background-color: #952af1;">

            <div class="panel-body text-center">
                <strong>No. Non Operational Dogs</strong>
                <div style="font-size: 4rem;">
                    <span class="fa fa-paw"></span>
                    {{\App\Models\dog::where('active', 1)->where('status', 'Training')->count()}}
                </div>

            </div>
        </div>
    </div>
</div>