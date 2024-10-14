
<div class="profile-header text-center mt-5 pt-5">
	<h1>Google Map and Search</h1>
</div>
<!----------
<section id="map"></section>

<div class="container search-section">
	<h2 class="text-center">Search Location</h2>
	<form id="search-form">
		<div class="form-group">
			<input type="text" class="form-control" id="location" placeholder="Enter a location">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Search</button>
	</form>
</div>
------>


    <div id="map" style="height: 400px; width: 100%;"></div>

    <script>
      let map;

      function initMap() {
        // Check if Geolocation is supported
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            // Initialize Google Map centered on user's location
            const location = { lat: lat, lng: lng };
            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 12,
              center: location
            });

            // Place a marker on the user's location
            new google.maps.Marker({
              position: location,
              map: map
            });

          }, function(error) {
            console.log("Geolocation error: " + error.message);
          });
        } else {
          console.log("Geolocation is not supported by this browser.");
        }
      }
    </script>