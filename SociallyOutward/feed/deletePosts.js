$(function(){

	$('#clear-posts').click(function(){deletePosts();});
	
});


var deletePosts = function(){

	$.ajax('deletePosts.php',
    	{
    		type: 'GET',
			cache: false,
			success: function (data) {$("#type1").html("");},
			error: function (e) {console.log(e);}
     	});

}