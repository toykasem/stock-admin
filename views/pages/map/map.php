<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
		text-align: center;
      }

      #map {
        height: 500px;
        width: 600px;
      }
    </style>
  </head>
  <body>
  <div id="map"></div>
    <script>

      function initMap() {
			var mapOptions = {
			  center: {lat: 13.847860, lng: 100.604274},
			  zoom: 14,
			}
				
			var maps = new google.maps.Map(document.getElementById("map"),mapOptions);

			var marker, info;

			$.getJSON( "json.php", function( jsonObj ) {
					//*** loop
					$.each(jsonObj, function(i, item){
						marker = new google.maps.Marker({
						   position: new google.maps.LatLng(item.LAT, item.LNG),
						   map: maps,
						   title: item.location_name
						});

					  info = new google.maps.InfoWindow();

					  google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
						  info.setContent(item.location_name);
						  info.open(maps, marker);
						}
					  })(marker, i));

					}); // loop

			 });

		}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK3RgqSLy1toc4lkh2JVFQ5ipuRB106vU&callback=initMap" async defer></script>
  </body>
</html>