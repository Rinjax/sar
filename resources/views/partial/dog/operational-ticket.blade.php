<div class="panel panel-primary">
    <div class="panel-body
                        @if($dog->ticketDays < 250 && $dog->ticketDays > 100)cpd-panel-warning
                        @elseif($dog->ticketDays <= 100)cpd-panel-danger
                        @endif">
        <div class="row vertical-align-col">
            <div class="col-xs-12 col-sm-6">
                <p class="text-center"><h3 class="text-center">Operational Ticket</h3></p>
                <img class="img-responsive center-block" src="/img/certificatesm.png" alt="water">
            </div>
            <div class="col-xs-12 col-sm-6">
                <h4 class="text-center">Completed
                    on: {{\Carbon\Carbon::parse($dog->operational_date)->format('d / m / Y')}}</h4>
                <h3 class="text-center" style="font-size: 2rem;">
                    {{$dog->ticketDays}} Days
                </h3>
            </div>
        </div>
    </div>
</div>