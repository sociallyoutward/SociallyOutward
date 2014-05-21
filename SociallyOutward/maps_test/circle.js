$(function() {

	$('#one').click(function(){changeCircle(1);});


	$('#five').click(function(){changeCircle(5);});


	$('#ten').click(function(){changeCircle(10);});


});

var changeCircle = function(numMiles){

	var curCenter = map.getCenter();

	circle.setCenter(curCenter);

	circle.setRadius(numMiles*1609.344);


}