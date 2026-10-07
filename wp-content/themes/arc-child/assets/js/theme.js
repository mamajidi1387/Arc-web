/**
 * Arc theme behaviour — mobile navigation toggle.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var burger = document.querySelector('.arc-burger');
		var nav = document.getElementById('arc-nav');

		if (!burger || !nav) {
			return;
		}

		burger.addEventListener('click', function () {
			var open = nav.classList.toggle('is-open');
			burger.setAttribute('aria-expanded', open ? 'true' : 'false');
		});

		nav.addEventListener('click', function (event) {
			if (event.target.tagName === 'A') {
				nav.classList.remove('is-open');
				burger.setAttribute('aria-expanded', 'false');
			}
		});
	});
})();
