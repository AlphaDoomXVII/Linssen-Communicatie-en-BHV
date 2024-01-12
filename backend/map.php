<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Simple Click Events</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      function initMap() {
        const myLatlng = { lat: -25.363, lng: 131.044 };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: myLatlng,
        });
        const marker = new google.maps.Marker({
          position: myLatlng,
          map,
          title: "Click to zoom",
        });

        map.addListener("center_changed", () => {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(() => {
            map.panTo(marker.getPosition());
          }, 3000);
        });
        marker.addListener("click", () => {
          map.setZoom(8);
          map.setCenter(marker.getPosition());
        });
      }

      window.initMap = initMap;
    </script>
    <style>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      /* 
       * Always set the map height explicitly to define the size of the div element
       * that contains the map. 
       */
      #map {
        height: 100%;
      }

      /*
       * Optional: Makes the sample page fill the window.
       */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>

    <!--
     The 'defer' attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=INSERT_YOUR_API_KEY&callback=initMap&v=weekly"
      defer
    ></script>
  </body>
</html>