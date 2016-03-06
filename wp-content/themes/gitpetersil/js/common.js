$(document).ready(function() {

    //Слайдер О Гиле
    $('.gil-bxslider').bxSlider({
		pagerCustom: '#bx-pager-scheme',
		mode: 'fade',
		prevText: '<i class="fa fa-angle-left"></i>',
		nextText: '<i class="fa fa-angle-right"></i>'
	});

		$("#menu-button").click(function() {
		$(".menu").slideToggle();
	});

		$('.popup').magnificPopup({
	         removalDelay: 300,
	         mainClass: 'mfp-fade'
		});

	
});