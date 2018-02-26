@extends('layout')

@section('title', 'Training Locations')


@section('content')
    <div class="main-area">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 id="map_title"class="panel-title">Training Locations</h1>
                    </div>
                    <div class="panel-body">
                        <div id="map"  style="height: 70rem; margin: -15px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script type="text/javascript">
        function initMap(lat, long) {

            console.log(typeof lat);

            lat = (lat == null) || (typeof lat == 'undefined') ?  51.0497069 : lat;
            long = (long == null) || (typeof long == 'undefined') ?  -0.2028727 : long;

            console.log(lat, long);

            var point = {lat: lat, lng: long};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: point
                //mapTypeId: 'map'

            });

            @foreach($locations as $location)
                @if($location->lat)
                    var marker{{$location->id}} = new google.maps.Marker({
                        position: {lat: {!! $location->lat !!}, lng: {!! $location->lng !!}},
                        map: map,
                        animation: google.maps.Animation.DROP,
                        title: "{{$location->name}}",
                        zIndex: {{$location->id}}
                    });

                    var content = `@include('partial.locations.pin_content')`;

                    var infowindow{{$location->id}} = new google.maps.InfoWindow({
                        content: content
                    });

                    marker{{$location->id}}.addListener('click', function() {
                        infowindow{{$location->id}}.open(map, marker{{$location->id}});
                    });
                @endif
            @endforeach

        }

    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={!! env('GOOGLE_MAP_APIKEY') !!}&callback=initMap">
    </script>

    <script>
        $('.js-btn-map').click(function () {

            var mapid = $(this).attr('id').replace('loc_','');

            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: "http://dev.searchdogs.com/traininglocations/" + mapid,
                success: function(responseData){
                    initMap(responseData.lat, responseData.lng);
                    console.log(responseData);
                    $('#map_title').text(responseData.name);
                    $('#map_postcode').text("Postcode: " + responseData.postcode);
                    $('#map_grid').text("Grid Ref: " + responseData.gridRef);
                    $('#map_notes').text("Notes: " + responseData.notes);

                }
            });
        });
    </script>

@endsection