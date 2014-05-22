$.ajax('jPT.php',
    	{
    		type: 'GET',
			cache: false,
			success: function (data) {parseJSON(data);},
			error: function () {alert('Error receiving JSON');}
     	}); 


var parseJSON = function(myJSONResult)
{
var idList = new Array();
console.log(myJSONResult.results.length);
for (i = 0; i < myJSONResult.results.length; i++) {
  idList[i] = myJSONResult.results[i].id;
}

$.ajax('dbTest.php',
    	{
    		type: 'GET',
    		data:{idList:JSON.stringify(idList)},
			cache: false,
			success: function (data) {console.log(data);},
			error: function () {alert('DB error');}
     	}); 


}