<html>
  <head>
    <meta charset="utf-8" />
    <title>Search with a geocoding control</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@^3.0.9/dist/esri-leaflet.js"></script>
    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.3/dist/esri-leaflet-geocoder.css" crossorigin="" />
    <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.3/dist/esri-leaflet-geocoder.js" crossorigin=""></script>
    <style>
      html,
      body,
      #map {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #323232;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      const apiKey = "AAPKde2eee6641a8448d8105445ee448ea6euwsS1JY4v_evbWcDtAtbjq_0GJRwzaONGWe89efyUH1Kz0hkQRNOAL51hEI7yMJa";

      const map = L.map("map").setView([40.91, -96.63], 7);

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      const searchControl = L.esri.Geocoding.geosearch({
        position: "topright",
        placeholder: "Enter an address or place e.g. 1 York St",
        useMapBounds: false,
        providers: [
          L.esri.Geocoding.arcgisOnlineProvider({
            apikey: apiKey,
            nearby: {
              lat: -33.8688,
              lng: 151.2093
            }
          })
        ]
      }).addTo(map);

     const results = L.layerGroup().addTo(map);

      searchControl.on("results", function (data) {
        results.clearLayers();
        for (let i = data.results.length - 1; i >= 0; i--) {
          alert(data.results[i].latlng.lat+' '+data.results[i].latlng.lng);
          //results.addLayer(L.marker(data.results[i].latlng));
          //document.getElementById("coordenadas").value=data.results[i].latlng;
        }
      });
    </script>
    <input type="text" name="coordenadas" id="coordenadas" />
  </body>
</html>
