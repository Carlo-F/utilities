//Google Maps API - traduce indirizzo in coordinate
function geocodeAddress(geocoder, resultsMap) {

    geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
        let newLat = results[0].geometry.location.lat();
        let newLng = results[0].geometry.location.lng();
        
        console.log(newLat);
        console.log(newLng);

    } else {
        alert('Ricerca indirizzo fallita. causa: ' + status);
    }
    });
}
