var createPosts = function(posts,tab,type){
	
	var feed = tab;

	for(var p in posts)
	{
		var newPost = $('<div id=\'postID'+p+'\' class=\'item\'></div>');
	    newPost.data['pId'] = p;
	    newPost.append('<p class="title">'+posts[p]['title']+'</p>');
	    newPost.append('<p class="content">'+posts[p]['content']+'</p>');
	    //feed.prepend(newPost);
	    console.log(containers);
	    containers[type].append(newPost);
	}

}