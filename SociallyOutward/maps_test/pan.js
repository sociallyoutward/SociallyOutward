$(function() {

	$('#ch').click(function(){map.panTo(chapelHill.getPosition());});


	$('#r').click(function(){map.panTo(raleigh.getPosition());});


	$('#d').click(function(){map.panTo(durham.getPosition());});


});