$(function(){

	$('#clear-posts').click(function(){deletePosts();});
	
});


var deletePosts = function(){

	$.ajax('deletePosts.php',
    	{
    		type: 'GET',
			cache: false,
			success: function (data) {clearDivs();},
			error: function (e) {console.log(e);}
     	});

}

var clearDivs = function(){
	$('#type1').html("");
	$('#type2').html("");
	$('#type3').html("");
}