@extends('layout')

@section('title', 'Training Locations')


@section('content')
    <div class="main-area">
        <div class="row">
            @foreach($locations as $location)
                <div class="col-xs-6 col-md-4 col-lg-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1 class="panel-title">{{$location->name}}</h1>
                        </div>
                        <div class="panel-body location-panel" style="background-image: url('{!! asset('/img/page_asset/topographic.jpg') !!}')">
                            <a href="#" style="display: inline-block; height: 100%; width: 100%;"><strong></strong></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="map" style="height: 50rem; width: 100%;"></div>
    </div>



@endsection


@section('scripts')
    <script type="text/javascript">
        function initMap() {
            var uluru = {lat: 50.923416, lng: -0.489931};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru,
                mapTypeId: 'satellite'

            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }

    </script>

            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_MAP_APIKEY') !!}&callback=initMap">
            </script>

@endsection