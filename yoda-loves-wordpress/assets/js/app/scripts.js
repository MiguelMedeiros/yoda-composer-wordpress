
// Efeitos de hover funcionar nos devices mobile
$('a').on("touchend", function (e) {
      'use strict';
      var link = $(this);
      if (link.hasClass('hover')) {
            return true;
      }else {
            link.addClass('hover');
            $('a').not(this).removeClass('hover');
            return true;
      }
});

// Efeito Scroll
var animate = {
	'time': 500,
	'randMin': 1000,
	'randMax': 1200
};
var defaults = {
	'randMin': 1500,
	'randMax': 1500,
	'time':	1000
};
$(function() {
	var settings = $.extend(defaults, animate);
	$('.scroll_links').click(function(e) {
		e.preventDefault();
		var obj = $(this);
		var time = settings.time;
		if(obj.hasClass('rand')) {
			time = rand(settings.randMin, settings.randMax);
		} else {
			var result = /time[0-9]+/.exec(obj.attr('class'));
			if(result)
				time = parseInt(new String(result).replace('time', ''));
		}
		$('html, body').animate({
			scrollTop: $(obj.attr('href')).offset().top - 150
		}, time);
	});
});

$('.dropdown').hover(function() {
     $(this).find('.dropdown-menu').fadeIn();
}, function() {
     $(this).find('.dropdown-menu').fadeOut();
});
