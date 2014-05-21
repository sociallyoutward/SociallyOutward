$(document).ready(function () {

$('#s form').on('submit', function (e) {
e.preventDefault();
var speed = $(this).find('#speed').val();

changeSpeed(parseFloat(speed));
});

$('#g form').on('submit', function (e) {
e.preventDefault();

var iG = $('#innerGuide').is(':checked');
var cG = $('#centerGuide').is(':checked');
var oG = $('#outerGuide').is(':checked');

iGuide = iG;
cGuide = cG;
oGuide = oG;

toggleGuide(iG,cG,oG);
});

$('#r form').on('submit', function (e) {
e.preventDefault();
var radius = $(this).find('#radius').val();
changeRadius(radius);
toggleGuide(iGuide,cGuide,oGuide);
});

$('#t form').on('submit', function (e) {
e.preventDefault();
var newText = $(this).find('#textInput').val();
bubbleCalc(currBubbles,radius,newText);
});




});

