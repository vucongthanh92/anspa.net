// JavaScript Document
$(document).ready(function(){
	$("img.lazy").lazyload({
    	effect : "fadeIn"
	});
	$('.scroll-top').click(function () {
		$('body,html').animate({
		scrollTop: 0
		}, 800);
		return false;
	});
	$('.mobile_button').click(function(){
		$('#menu_mobile').toggle(400,'swing');
	});
	
});