<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Location Example</title>
</head>
<body>
    <h1>Your Location</h1>

    <p id="latitude">Latitude: </p>
    <p id="longitude">Longitude: </p>

    <script>
        // Check if the browser supports Geolocation
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Update the HTML elements with the obtained coordinates
                    document.getElementById("latitude").innerText += latitude;
                    document.getElementById("longitude").innerText += longitude;
                    
                }, 
                function(error) {
                    console.error("Error getting location:", error.message);
                },
                { enableHighAccuracy: true } // Request higher accuracy
            );
        } else {
            alert("Geolocation is not supported by your browser.");
        }
    </script>
</body>
</html>
