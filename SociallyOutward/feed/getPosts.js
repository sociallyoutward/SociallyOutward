var getPosts = function(postType)
{
	$.ajax('getPosts.php',
    	{
    		type: 'GET',
    		data:{postType:postType},
			cache: false,
			success: function (data) {createPosts(JSON.parse(data));},
			error: function () {alert('Error');}
     	});
}