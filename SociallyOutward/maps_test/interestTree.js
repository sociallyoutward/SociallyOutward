var interestTree;


$.ajax('interestTree.php',   
        	{
        		type: 'GET',
    			cache: false,
    			success: function (data) {populate($.parseJSON(data));},
    			error: function () {alert('Error receiving JSON');}
         	});

var populate = function(iTree)
{
	interestTree = iTree;
	for(var i = 0; i<interestTree[1].length;i++)
	{
		
		var button = $('<button/>',
    	{
        text: interestTree[interestTree[1][i]][0],
        id: interestTree[1][i],
        click: function () {clearNfill(this.id,1);}
   		});
   		$('#div1').append(button);
	}
}

var clearNfill = function(interest,comingFrom)
{
	console.log("interest: "+ interest[0]+" coming from: "+comingFrom);
	var appendToMe;
	if(comingFrom==1)
	{
		appendToMe = $('#div2');
		$('#div2').html('');
		$('#div3').html('');
		$('#div4').html('');
	}
	else if(comingFrom==2)
	{
		appendToMe = $('#div3');
		$('#div3').html('');
		$('#div4').html('');
	}
	else
	{
		appendToMe = $('#div4');
		$('#div4').html('');
	}
	comingFrom++;
	for(var i = 1; i<interestTree[interest].length;i++)
	{
		
		if(interestTree[interestTree[interest][i]][1]!=null)
		{
			var button = $('<button/>',
	    	{
	        text: interestTree[interestTree[interest][i]][0],
	        id:interestTree[interest][i],
	        click: function () { clearNfill(this.id,comingFrom); }
	   		});
	   		appendToMe.append(button);
   		}
   		else
   		{
   			console.log(onMap);
   			var button = $('<button/>',
	    	{
	        text: interestTree[interestTree[interest][i]][0],
	        id:interestTree[interest][i],
	        click: function () {onoff(this.id);} //filter will go here
	   		});
	   		appendToMe.append(button);
   		}
	}
}

var onoff = function(interestID)
{
	if(onMap[interestID])
	{
		if(onMap[interestID][0]==true)
		{
		onMap[interestID][0]=false;

		for(var i in onMap[interestID])
		{
			if(i!=0)
			{
				onMap[interestID][i].setMap(null);
			}
		}
		console.log(onMap[interestID]);
		}
		else if(onMap[interestID][0]==false)
		{
		onMap[interestID][0]=true;
		for(var i in onMap[interestID])
		{
			if(i!=0)
			{
				onMap[interestID][i].setMap(map);
			}
		}
		}

	}
	else
	{
		onMap[interestID]= new Array();
		onMap[interestID][0] = true;
		filter(interestID);
	}
}

