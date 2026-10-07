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

			<a class="arc-btn arc-btn--ghost arc-header__demo" href="<?php echo esc_url( $arc['header']['demo_url'] ); ?>"><?php echo esc_html( $arc['header']['demo'] ); ?></a>
			<a class="arc-btn arc-btn--primary" href="<?php echo esc_url( $arc['header']['start_url'] ); ?>"><?php echo esc_html( $arc['header']['start'] ); ?></a>

			<button class="arc-burger" type="button" aria-controls="arc-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'منو', 'arc-child' ); ?>">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>

<main id="main" class="arc-main">
