var myCenter=new google.maps.LatLng(35.913149,-79.055836);
var map;
var onMap = new Array();
var mousedown;
var circle;


function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:18,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  zoomControl: true,
  scaleControl: true
  };


map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

google.maps.event.addListener(map,'center_changed', function() {
    if (!mousedown) {
        for(var i in onMap)
        {
          filter(i);
        }
    }            
});

google.maps.event.addListener(map, 'mousedown', function() {
    mousedown = true;
});

google.maps.event.addListener(map, 'mouseup', function() {
    mousedown = false;
});


}

google.maps.event.addDomListener(window, 'load', initialize);