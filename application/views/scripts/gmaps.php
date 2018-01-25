<script>
$(document).ready(function(){
	map = new GMaps({
		el: '#map',
		zoom: 16,
		lat: 14.608213,
		lng: 120.9733144
	});

	map.addMarker({
		lat: 14.608213,
		lng: 120.9733144,
		infoWindow: {
			content: ''
		}
	});
	$('#branch').change(function(){
		var lati = parseFloat($('#lat').val());
		var long = parseFloat($('#long').val());
		map = new GMaps({
			el: '#map',
			zoom: 16,
			lat: lati,
			lng: long
		});

		map.addMarker({
			lat: lati,
			lng: long,
			infoWindow: {
				content: '<p>HTML Content</p>'
			}
		});

	});
});
</script>
