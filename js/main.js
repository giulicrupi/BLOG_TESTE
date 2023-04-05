


// chamada para slick js para fazer o carrosel funcionar
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
 responsive: [
      {
        breakpoint: 500,
        settings: {
        slidesToShow: 1,
        vertical: false,
        centerMode: false,
        
        }
      }
    ]   	
	});
});