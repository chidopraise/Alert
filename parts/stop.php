<?php
	if($fetcher->page_name != "geolocate"){
		echo"<style>
			div{
				background:#d4a024;
			}
		</style>";
	}
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php $control->path('lib/script.js'); ?>"></script>
	
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAifKUM_566u7e4dpOKUjoVaplDlH3ZQqo&callback=initMap"></script>
	<!-------
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZH-tILL3tpuv0Qn_WalVu65rIaeGiJNM&callback=initMap&libraries=places" async defer></script>
	----->
    <script>
    let map;
    let geocoder;

    function initMap() {
        // Get the current location of the user and set as the center of the map
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const currentPosition = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                map = new google.maps.Map(document.getElementById('map'), {
                    center: currentPosition,
                    zoom: 13
                });

                new google.maps.Marker({
                    map: map,
                    position: currentPosition,
                    title: "Your location"
                });

            }, function() {
                handleLocationError(true, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, map.getCenter());
        }
        geocoder = new google.maps.Geocoder();
    }

    function handleLocationError(browserHasGeolocation, pos) {
        alert(browserHasGeolocation ? "Error: The Geolocation service failed." : "Error: Your browser doesn't support geolocation.");
    }

    document.getElementById('search-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const location = document.getElementById('location').value;

        // Check if input is an IP address or longitude/latitude
        if (validateIpAddress(location)) {
            // Fetch location from IP address using an external API
            getLocationFromIP(location);
        } else if (validateCoordinates(location)) {
            const [lat, lng] = location.split(',').map(Number);
            map.setCenter({ lat: lat, lng: lng });
            new google.maps.Marker({
                map: map,
                position: { lat: lat, lng: lng }
            });
        } else {
            // Assume it's a name/address
            geocodeAddress(location);
        }
    });

    function geocodeAddress(location) {
        geocoder.geocode({ 'address': location }, function(results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function validateIpAddress(ip) {
        const ipRegex = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
        return ipRegex.test(ip);
    }

    function validateCoordinates(coords) {
        const latLngRegex = /^-?\d+(\.\d+)?,-?\d+(\.\d+)?$/;
        return latLngRegex.test(coords);
    }

    function getLocationFromIP(ip) {
        // Replace 'API_KEY' with your actual IP geolocation API key
        fetch(`https://ipapi.co/${AIzaSyAifKUM_566u7e4dpOKUjoVaplDlH3ZQqo}/json/`)
            .then(response => response.json())
            .then(data => {
                const location = { lat: parseFloat(data.latitude), lng: parseFloat(data.longitude) };
                map.setCenter(location);
                new google.maps.Marker({
                    map: map,
                    position: location,
                    title: `Location for IP: ${ip}`
                });
            })
            .catch(error => {
                alert("Failed to retrieve location from IP address: " + error);
            });
    }
</script>

	
</body>
</html>