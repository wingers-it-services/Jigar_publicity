function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, handleGeolocationError, {
            timeout: 10000,
            enableHighAccuracy: true
        });
    } else {
        console.log('Geolocation is not supported by this browser.');
        // Let the form submit even if geolocation is not supported
    }
}

function showPosition(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    // Set the hidden input fields with the latitude and longitude values
    document.getElementById('latitude').value = latitude;
    document.getElementById('longitude').value = longitude;
}

function handleGeolocationError(error) {
    // Handle geolocation error
    console.log('Geolocation error:', error.message);

    // You can choose to add some UI feedback here if needed
}
