$(document).ready(function(){
$("#submitButton").click(function(){
  
  var w =$( window ).width();
  var hw = w/2;
  $("#inner").animate({left:-hw},"slow");
  $("#vertdiv").animate({left:"2px"},"slow");
}); 
}); 