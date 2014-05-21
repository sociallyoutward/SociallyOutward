var myCenter=new google.maps.LatLng(35.9333,-79.0333);
var map;
var chapelHill;
var durham;
var raleigh;
var circle;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:10,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

chapelHill=new google.maps.Marker({
  position:myCenter,
  });

chapelHill.setMap(map);

raleigh=new google.maps.Marker({
	position:new google.maps.LatLng(35.8189,-78.6447),
});

raleigh.setMap(map);

durham=new google.maps.Marker({
	position:new google.maps.LatLng(35.9886,-78.9072),
});

durham.setMap(map);

circle = new google.maps.Circle({
  center:myCenter,
  radius:5*1609.344,
  strokeColor:"#0000FF",
  strokeOpacity:0.8,
  strokeWeight:2,
  fillColor:"#0000FF",
  fillOpacity:0.4
});

circle.setMap(map);

}

google.maps.event.addDomListener(window, 'load', initialize);