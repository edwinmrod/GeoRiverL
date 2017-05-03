<!DOCTYPE html>
<html lang="en">
    <head>
	

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>



	 	 
  
       
    

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
			
            .top-left {
                position: absolute;
                left: 0px;
                top: 0px;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
				#map {
			width: 600px;
			height: 400px;
		}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                    <a href="{{ url('/login') }}">Iniciar Sesión</a>

                    <a href="{{ url('/register') }}">Registrarse</a>
                </div>
            @endif

            <div class="content">
			
			 <div class="top-left">
                    
					
					<img src="http://www.aerocivil.gov.co/cea/RelacionesInter/PublishingImages/Paginas/ConveniosInterinstitucionales/Universidad%20El%20Bosque.jpg" class="img-circle">
                </div>
                <div class="title m-b-md">
                    GeoRiver
				
                </div>

                <div class="links">
                  <div id='map' style="width: 1255px; height: 585px;"></div>

<script>
	var cities = new L.LayerGroup();
@foreach($locations as $location)
	//L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.').addTo(cities),
    var coordinate = '{!!$location->coordinate!!}';
	var arr = coordinate.split(" ");
    L.marker([arr[0],arr[1]]).bindPopup('{!!$location->nameLocation!!}').addTo(cities);
@endforeach
	var mbAttr = 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

	var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
		streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});

	var map = L.map('map', {
		center: [4.5988, -74.080],
		zoom: 5,
		layers: [grayscale, cities]
	});

	var baseLayers = {
		"Grayscale": grayscale,
		"Streets": streets
	};

	var overlays = {
		"Cities": cities
	};

	L.control.layers(baseLayers, overlays).addTo(map);
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
    </body>
</html>
