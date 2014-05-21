var direction="up";
var amount=1;
var completed=0;
var panLat=0.0013034039953438992;
var panLng=0.0016093254089355469;
//var radius=70;
var select;



$(function(){
    $('#next').click(function(){nextSquare();});
});

$.ajax('interestTree.php',   
            {
                type: 'GET',
                cache: false,
                success: function (data) {createDropDown($.parseJSON(data));},
                error: function () {alert('Error receiving JSON');}
            });

var createDropDown = function(interestTree)
{
    select = $('<select></select>');
    for(var i in interestTree)
    {   
        if(interestTree[i][1]==null)
        {
            var option = $('<option value='+i+'>'+interestTree[i][0]+'</option>');
            select.append(option);
        }
    }
}


//Calculate Pan Distance
var calculatePan = function()
{
    var bounds = map.getBounds();
    var swPoint = bounds.getSouthWest();
    var nePoint = bounds.getNorthEast();
    var difLat = Math.abs(swPoint.lat()-nePoint.lat());
    var difLng = Math.abs(swPoint.lng()-nePoint.lng());
    var proximitymeter = google.maps.geometry.spherical.computeDistanceBetween(swPoint, nePoint);
    var radius = proximitymeter/2;
    console.log(radius);
    console.log(difLng);

    return radius;
}



var nextSquare = function()
{
    //addSquare();
    $('#toAdd').html("");
    //move();
    getPlaces();
} 

var addSquare = function()
{
    var rectangle = new google.maps.Rectangle({
    strokeColor:'#FF0000',
    strokeOpacity: 0.35,
    fillColor: '#FF0000',
    fillOpacity: 0.35,
    map: map,
    bounds: map.getBounds()
    });
}

var move = function()
{
    c = map.getCenter();
    
    lat=c.lat();
    lng=c.lng();
    if(direction=="up")
    {
        console.log("up");
        panLoc = new google.maps.LatLng(lat+panLat,lng);
        circle.setCenter(panLoc);
        map.panTo(panLoc);
        completed++;
        if(amount==completed)
        {
            completed=0;
            direction="right";
        }
    }
    else if(direction=="right")
    {
        console.log("right");
        panLoc = new google.maps.LatLng(lat,lng+panLng);
        circle.setCenter(panLoc);
        map.panTo(panLoc);
        completed++;
        if(amount==completed)
        {
            completed=0;
            amount++;
            direction="down";
        }
    }
    else if(direction=="down")
    {
        console.log("down");
        panLoc = new google.maps.LatLng(lat-panLat,lng);
        circle.setCenter(panLoc);
        map.panTo(panLoc);
        completed++;
        if(amount==completed)
        {
            completed=0;
            direction="left";
        }
    }
    else if(direction=="left")
    {
        console.log("left");
        panLoc = new google.maps.LatLng(lat,lng-panLng);
        circle.setCenter(panLoc);
        map.panTo(panLoc);
        completed++;
        if(amount==completed)
        {
            completed=0;
            amount++;
            direction="up";
        }
    }

}

var getPlaces = function()
{
    var radius = calculatePan();
    console.log(radius);
    $.ajax('jPT.php',   
         {
             type: 'GET',
             data: {radius:radius,clat:map.getCenter().lat(),clng:map.getCenter().lng()},
             cache: false,
             success: function (data) {parseJSON(data);},
             error: function () {alert('Error receiving JSON');}
             });


}


var parseJSON = function(myJSONResult)
{
    var idList = new Array();
    for (i = 0; i < myJSONResult.results.length; i++) {
      idList.push([myJSONResult.results[i].id,myJSONResult.results[i].name]);

        var postingDiv=$('#toAdd');
        var div = $('<div></div>');
        div.attr("id",myJSONResult.results[i].id);
        var name = $('<span>'+myJSONResult.results[i].name+'</span>');
        div.append(name);
        var s = select.clone();
        s.attr("class",myJSONResult.results[i].id);
        div.append(s);
        var dbbutton = $('<button/>',
            {
                text:'Add to Database',
                id:myJSONResult.results[i].id,
                click: function () {addToDB(this.id); } //filter will go here
            });
        var addbutton = $('<button/>',
            {
                text:'+',
                id:myJSONResult.results[i].id,
                click: function () {addInterest(this.id); } //filter will go here
            });
        var deletebutton = $('<button/>',
            {
                text:'X',
                id:myJSONResult.results[i].id,
                click: function () {deletePlace(this.id); } //filter will go here
            });

        div.append(addbutton);
        div.append(dbbutton);
        div.append(deletebutton);
        postingDiv.append(div);
    }
    plotPlaces(myJSONResult);
    if(myJSONResult.next_page_token)
    {
        setTimeout(function(){nextPage(myJSONResult.next_page_token)}, 1000);
    }   
}

var nextPage = function(npt,interestID)
{
    $.ajax('jPT.php',   
            {
                type: 'GET',
                data: {next:npt},
                cache: false,
                success: function (data) {parseJSON(data);},
                error: function () {alert('Error receiving JSON');}
            });
}

var addInterest = function(placeID)
{
    var s = "";
    s = select.clone();
    s.attr("class",placeID);
    if($("select."+placeID).length<3)
        $("select."+placeID+":last").after(s);
    else
        alert("Max of 3 interests per place.");
}

var deletePlace = function(placeID)
{

    $("div#"+placeID).remove();
}

var addToDB = function(placeID)
{
    var interests = new Array();

    $("select."+placeID).each(function(){
        interests.push($(this).val());
    });
    $.ajax('placeEntry.php',   
         {
             type: 'POST',
             data: {placeID:placeID,interest:JSON.stringify(interests)},
             cache: false,
             success: function (data) {success(data)},
             error: function (data) {duplicateDelete(data);}
             });
}

var success = function(placeID)
{
    $('#'+placeID).html('Place added.');
    $('#'+placeID).css("color","green");
}

var duplicateDelete = function(placeID)
{
    $('#'+placeID.responseText).html('Place already added, duplicate removed.');
    $('#'+placeID.responseText).css("color","red");
}

var plotPlaces = function(placeList)
{
    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    for (i = 0; i < placeList.results.length-1; i++)
    {
        var ref = placeList.results[i].reference;

        var request = {
            reference: ref
        };

        service.getDetails(request, function(place, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                var marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location
                });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
            }
        });
    }
}  
