google.maps.event.addDomListener(window, 'load', init);

function init() {
    var mapOptions = {
        zoom: 15,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(44.940455, 34.083381), // New York
        styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#424b5b"},{"weight":2},{"gamma":"1"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#545b6b"},{"gamma":"0"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#1c223a"},{"gamma":"1"},{"weight":"10"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#666c7b"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#545b6b"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#424a5b"},{"lightness":"0"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#666c7b"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2e3546"}]}]
    };
    var mapElement = document.getElementById('map');
    var map = new google.maps.Map(mapElement, mapOptions);
    // Let's also add a marker while we're at it
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(44.940455, 34.083381),
        map: map,
        title: 'X-Records!'
    });
}