<div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -37.82, lng: 144.94},
          zoom: 10
        });
      }
    </script>