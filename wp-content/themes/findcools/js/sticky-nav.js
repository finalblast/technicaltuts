jQuery(document).ready(function($) {
	$(window).scroll(function(e){
		$el = $('#top-bar');
		if ( $(window).width() > 600) {
			if ($(this).scrollTop() > 250 && $el.css('position') != 'fixed'){
				$el.addClass("fixedMenu");
				$('.scroll-top').show('slow');
			}
			else if ($(this).scrollTop() < 250 && $el.css('position') == 'fixed'){
				$el.removeClass("fixedMenu");
				$('.scroll-top').hide('slow');
			}
		}
		else {
			$el.removeClass("fixedMenu");
			$('.scroll-top').hide('slow');
		}
	});
});