var center;
var lat;
var lng;
var radius;
var filter = function(interestID)
{
    var bounds = map.getBounds();
    var swPoint = bounds.getSouthWest();
    var nePoint = bounds.getNorthEast();
    var proximitymeter = google.maps.geometry.spherical.computeDistanceBetween(swPoint, nePoint);

    radius = proximitymeter/2;

    center = map.getCenter();
    lat = center.lat();
    lng = center.lng();

    $.ajax('maps_test/jPT.php',   
        	{
        		type: 'GET',
                interestID:interestID,
                data: {radius:radius,clat:lat,clng:lng},
    			cache: false,
    			success: function (data) {parseJSON(data,this.interestID);},
    			error: function () {alert('Error receiving JSON');}
         	});
    } 


var parseJSON = function(myJSONResult,interestID)
{
var idList = new Array();
for (i = 0; i < myJSONResult.results.length; i++) {
  idList[i] = myJSONResult.results[i].id;
}
$.ajax('maps_test/dbCheck.php',
    	{
    		type: 'GET',
            jsonResult:myJSONResult,
            interestID:interestID,
    		data:{idList:JSON.stringify(idList),interestID:interestID},
			cache: false,
			success: function (data) {plotPlaces(data,this.jsonResult,this.interestID)},
			error: function () {alert('DB error');}
     	}); 
}

var plotPlaces = function(interestList,placeList,interestID)
{
    console.log(interestList);

    for(var index in interestList)
    {
        var ref = placeList.results[index].reference;
        var placeID = placeList.results[index].id;
        createMarker(ref,interestID,placeID);
    }
    if(placeList.next_page_token)
    {
       setTimeout(function(){nextPage(placeList.next_page_token,interestID)}, 700);
    }   
}

var createMarker = function(ref,interestID,placeID)
{
    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    var request = {
            reference: ref
        };

        if(onMap[interestID][placeID]==null)
        {
        service.getDetails(request, function(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                var marker = new google.maps.Marker({
                    position: place.geometry.location
                });
                
                
                if(onMap[interestID][0]!=false)
                {
                    marker.setMap(map);
                }
                onMap[interestID][placeID] = marker;

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(place.name);
                    infowindow.open(map, this);
                });
                }
            });
        }
}

var nextPage = function(npt,interestID)
{
    $.ajax('maps_test/jPT.php',   
            {
                type: 'GET',
                data: {next:npt},
                interestID:interestID,
                cache: false,
                success: function (data) {parseJSON(data,this.interestID);},
                error: function () {alert('Error receiving JSON');}
            });
}