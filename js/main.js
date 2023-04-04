$(document).ready(function(){
	$('.posts').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.posts-nav'
	});
	$('.posts-nav').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		vertical: true,
	   asNavFor: '.posts',
	   centerMode: false,
	   focusOnSelect: true,
		prevArrow: ".thumb-prev",
   	nextArrow: ".thumb-next",
	});
});