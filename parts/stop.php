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
    <script>
        let map;
        let geocoder;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8
            });
            geocoder = new google.maps.Geocoder();
        }

        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const location = document.getElementById('location').value;
            geocodeAddress(location);
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
    </script>
	----->
</body>
</html>