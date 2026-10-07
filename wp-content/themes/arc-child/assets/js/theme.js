/**
 * Arc theme behaviour — mobile navigation toggle and dark/light switch.
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

	document.addEventListener('DOMContentLoaded', function () {
		var toggle = document.querySelector('[data-arc-theme-toggle]');
		var root = document.documentElement;

		if (!toggle) {
			return;
		}

		function isLight() {
			return root.getAttribute('data-theme') === 'light';
		}

		function sync() {
			toggle.setAttribute('aria-pressed', isLight() ? 'true' : 'false');
		}

		toggle.addEventListener('click', function () {
			var theme = isLight() ? 'dark' : 'light';
			root.setAttribute('data-theme', theme);

			try {
				window.localStorage.setItem('arc-theme', theme);
			} catch (e) {}

			sync();
		});

		sync();
	});
})();
