$(function(){
	$('#post-button').click(function(){
		var title = $('#post-title').val();
		var content = $('#post-content').val();

		var posts = new Array();
		posts[0] = new Array();
		posts[0]['title']=title;
		posts[0]['content']=content;
		if(title=="")
		{
			$('#post-title').css( "border","solid thin red");
			if(content==""){
				$('#post-content').css( "border","solid thin red");
			}
			else{
				$('#post-content').css( "border","solid thin black");
			}
		}
		else if(content=="")
		{
			$('#post-title').css( "border","solid thin black");	
			$('#post-content').css( "border","solid thin red");
		}
		else{
		createPosts(posts,$('#myModal').data("tab"),$('#myModal').data("type"));

		$.ajax('addPost.php',
    	{
    		type: 'POST',
    		data:{title:title,content:content,type:$('#myModal').data("type")},
			cache: false,
			success: function (data) {},
			error: function (e) {console.log(e);}
     	});

		$('#myModal').modal('hide');
		}
	});
	$('.modal-toggle').click(function(){
			
			$('#myModal').data("type",$(this).data("type"));
			$('#myModal').data("tab",$(this).data("tab"));
			$('#post-title').css( "border","solid thin black");	
			$('#post-content').css( "border","solid thin black");	
	});
});

var createPosts = function(posts,tab,type){
	
	var feed = tab;

	for(var p in posts)
	{
		var newPost = $('<div id=\'postID'+p+'\' class=\'item\'></div>');
	    newPost.data['pId'] = p;
	    newPost.append('<p class="title">'+posts[p]['title']+'</p>');
	    newPost.append('<p class="content">'+posts[p]['content']+'</p>');
	    //feed.prepend(newPost);
	    containers[type].append(newPost).masonry('prepended',newPost);
	}

}