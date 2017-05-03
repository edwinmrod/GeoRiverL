@extends('layouts.app')

@section('content')
    <section class="content-header">
	
	 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
   	 <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
        <h1 class="pull-left">Mapa</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('locations.create') !!}">Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
			
			 <div id="mapid" style="width: 1100px; height: 585px;"></div>
		 <script>
			var mamp = L.map('mapid').setView([4.5988, -74.080], 5); // ([lat, lng], zoom)
			L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
				maxZoom: 18,
				attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
							'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
							'Imagery © <a href="http://mapbox.com">Mapbox</a>',
				id: 'mapbox.streets'
			}).addTo(mamp);
			var popup = L.popup();
			function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent("Esta ubicado en la  " + e.latlng.toString())
				.openOn(mamp);
	}
			mamp.on('click', onMapClick);
		</script>

		@foreach($locations as $location)
			<script>
				var coordinate = '{!!$location->coordinate!!}';
				var arr = coordinate.split(" ");
				L.marker([arr[0],arr[1]]).addTo(mamp);
			</script>
		@endforeach
			
                
				
				
            </div>
        </div>
    </div>
@endsection

	
