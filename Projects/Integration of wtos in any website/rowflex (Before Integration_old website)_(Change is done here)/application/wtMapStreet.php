<?

  global $address;
  
 
 ?>
 
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
function initialize() {
  geocoder = new google.maps.Geocoder();
  geocoder.geocode( { 'address': '<?   echo $address; ?>'}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {


  var fenway = results[0].geometry.location;
  var mapOptions = {
    center: fenway,
    zoom: 14,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(
      document.getElementById('map-canvas'), mapOptions);
  var panoramaOptions = {
    position: fenway,
    pov: {
      heading: 34,
      pitch: 10
    }
  };
  var panorama = new  google.maps.StreetViewPanorama(document.getElementById('pano'),panoramaOptions);
  map.setStreetView(panorama);

 }
        });


}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <div id="map-canvas" style="width: 400px; height: 300px; display:none;"></div>
    <div id="pano" style="position:absolute; left:0px; top: 0px; width: 100%; height: 100%;"></div>
 