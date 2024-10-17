<div id="cord" class="cord" style="visibility:;"></div>
<section id="map" style="visibility:hidden; height:1px;"></section>
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
	
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAifKUM_566u7e4dpOKUjoVaplDlH3ZQqo&callback=initMap"></script>
	
	<script src="<?php $control->path('lib/script.js'); ?>"></script>
	
</body>
</html>