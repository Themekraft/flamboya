$(function(){
	$('#content').addClass("slideOutLeft");
	
	
if($('.fap-wrapper').hasClass("fap-open")){
	$('#content').animate({left:-200 + "px"}, 2000);
	$('#content').addClass("slideOutLeft");
}

});