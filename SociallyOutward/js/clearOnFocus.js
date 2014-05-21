$(document).ready(function(){
$(".linput").focus(function() {
    if (this.value == this.title) {
        $(this).val("");
    }
}).blur(function() {
    if (this.value == "") {
        $(this).val(this.title);
    }
});
});