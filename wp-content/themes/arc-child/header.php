<?php
/**
 * Site header — sticky navigation, brand mark, language switch and CTAs.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$arc = arc_content();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		/* Applied before paint so the stored theme does not flash. */
		(function () {
			try {
				var stored = window.localStorage.getItem('arc-theme');
				if (stored === 'light' || stored === 'dark') {
					document.documentElement.setAttribute('data-theme', stored);
				}
			} catch (e) {}
		})();
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'arc-body' ); ?>>
<?php wp_body_open(); ?>

<a class="arc-skip" href="#main"><?php echo esc_html( 'fa' === $arc['locale'] ? 'پرش به محتوا' : 'Skip to content' ); ?></a>

<header class="arc-header">
	<div class="arc-container arc-header__inner">
		<a class="arc-logo" href="<?php echo esc_url( arc_url( '/' ) ); ?>">
			<span class="arc-logo__mark" aria-hidden="true">A</span>
			<span class="arc-logo__text"><?php echo esc_html( $arc['brand'] ); ?></span>
		</a>

		<nav class="arc-nav" id="arc-nav" aria-label="<?php esc_attr_e( 'منوی اصلی', 'arc-child' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'arc-nav__list',
					'fallback_cb'    => 'arc_nav_fallback',
					'depth'          => 2,
				)
			);
			?>
			<div class="arc-nav__mobile-actions">
				<a class="arc-btn arc-btn--primary arc-btn--block" href="<?php echo esc_url( $arc['header']['start_url'] ); ?>"><?php echo esc_html( $arc['header']['start'] ); ?></a>
			</div>
		</nav>

		<div class="arc-header__actions">
			<div class="arc-lang" role="group" aria-label="<?php esc_attr_e( 'انتخاب زبان', 'arc-child' ); ?>">
				<?php foreach ( arc_language_links() as $code => $lang ) : ?>
					<a
						class="arc-lang__item<?php echo ! empty( $lang['current_lang'] ) ? ' is-active' : ''; ?>"
						href="<?php echo esc_url( $lang['url'] ); ?>"
						hreflang="<?php echo esc_attr( $code ); ?>"
						<?php echo ! empty( $lang['current_lang'] ) ? 'aria-current="true"' : ''; ?>
					><?php echo esc_html( 'fa' === $code ? 'FA' : 'EN' ); ?></a>
				<?php endforeach; ?>
			</div>

			<button
				class="arc-theme-toggle"
				type="button"
				data-arc-theme-toggle
				aria-pressed="false"
				aria-label="<?php echo esc_attr( 'fa' === $arc['locale'] ? 'تغییر حالت روشن و تاریک' : 'Toggle dark and light mode' ); ?>"
			>
				<svg class="arc-theme-toggle__icon arc-theme-toggle__icon--sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true" focusable="false">
					<circle cx="12" cy="12" r="4"></circle>
					<path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"></path>
				</svg>
				<svg class="arc-theme-toggle__icon arc-theme-toggle__icon--moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
					<path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"></path>
				</svg>
			</button>

			<a class="arc-btn arc-btn--ghost arc-header__demo" href="<?php echo esc_url( $arc['header']['demo_url'] ); ?>"><?php echo esc_html( $arc['header']['demo'] ); ?></a>
			<a class="arc-btn arc-btn--primary" href="<?php echo esc_url( $arc['header']['start_url'] ); ?>"><?php echo esc_html( $arc['header']['start'] ); ?></a>

			<button class="arc-burger" type="button" aria-controls="arc-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'منو', 'arc-child' ); ?>">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>

<main id="main" class="arc-main">
