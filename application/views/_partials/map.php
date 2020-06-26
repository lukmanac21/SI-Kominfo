<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWR4K0m_9VINVwNbNVBn8HhcNlKvE4yhA&callback=initMap">
</script>
<script>
    function initMap() {
    var myLatlng = {lat: -7.91346, lng: 113.82145};

    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 15, center: myLatlng});

    // Create the initial InfoWindow.
    var infoWindow = new google.maps.InfoWindow(
        {content: 'Click the map to get Lat/Lng!', position: myLatlng});
    infoWindow.open(map);

    // Configure the click listener.
    map.addListener('click', function(mapsMouseEvent) {
        // Close the current InfoWindow.
        infoWindow.close();

        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
        infoWindow.setContent(mapsMouseEvent.latLng.toString());
        infoWindow.open(map);
    });
    }
</script>