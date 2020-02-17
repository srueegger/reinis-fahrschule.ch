(function($) {
	'use strict';

	/* Marquee / Lauftext konfigurieren und starten */
	var mq = $('.marquee').marquee({
		pauseOnHover: true,
		startVisible: true,
		direction: 'left',
		duplicated: true,
		gap: 0,
		duration: 10000
	});

})(jQuery);