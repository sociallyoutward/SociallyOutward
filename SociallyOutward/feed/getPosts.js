var getPosts = function(postType,tab)
{
	$.ajax('getPosts.php',
    	{
    		type: 'GET',
    		tab:tab,
    		data:{postType:postType},
			cache: false,
			success: function (data) {createPosts(JSON.parse(data),this.tab);},
			error: function () {alert('Error');}
     	});
}