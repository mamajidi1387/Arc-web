<?php
/**
 * Site footer — brand column, service/resource links and contact details.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$arc    = arc_content();
$footer = $arc['footer'];
?>
</main>

<footer class="arc-footer">
	<div class="arc-container">
		<div class="arc-footer__grid">
			<div class="arc-footer__brand">
				<a class="arc-logo" href="<?php echo esc_url( arc_url( '/' ) ); ?>">
					<span class="arc-logo__mark" aria-hidden="true">A</span>
					<span class="arc-logo__text"><?php echo esc_html( $arc['brand'] ); ?></span>
				</a>
				<p class="arc-footer__blurb"><?php echo esc_html( $footer['blurb'] ); ?></p>
				<div class="arc-social" aria-hidden="true">
					<a href="<?php echo esc_url( arc_url( '/contact' ) ); ?>" class="arc-social__item">in</a>
					<a href="<?php echo esc_url( arc_url( '/contact' ) ); ?>" class="arc-social__item">ig</a>
					<a href="<?php echo esc_url( arc_url( '/contact' ) ); ?>" class="arc-social__item">x</a>
				</div>
			</div>

			<nav class="arc-footer__col" aria-label="<?php esc_attr_e( 'خدمات', 'arc-child' ); ?>">
				<h3 class="arc-footer__title"><?php echo esc_html( 'fa' === $arc['locale'] ? 'خدمات' : 'Services' ); ?></h3>
				<ul>
					<?php foreach ( $footer['services'] as $link ) : ?>
						<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<nav class="arc-footer__col" aria-label="<?php esc_attr_e( 'منابع', 'arc-child' ); ?>">
				<h3 class="arc-footer__title"><?php echo esc_html( 'fa' === $arc['locale'] ? 'منابع' : 'Resources' ); ?></h3>
				<ul>
					<?php foreach ( $footer['resources'] as $link ) : ?>
						<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<div class="arc-footer__col">
				<h3 class="arc-footer__title"><?php echo esc_html( 'fa' === $arc['locale'] ? 'تماس' : 'Contact' ); ?></h3>
				<ul>
					<li><a href="mailto:<?php echo esc_attr( $footer['contact']['email'] ); ?>"><?php echo esc_html( $footer['contact']['email'] ); ?></a></li>
					<li><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $footer['contact']['phone'] ) ); ?>"><?php echo esc_html( $footer['contact']['phone'] ); ?></a></li>
					<li><?php echo esc_html( $footer['contact']['address'] ); ?></li>
				</ul>
				<a class="arc-btn arc-btn--primary arc-btn--sm" href="<?php echo esc_url( $arc['cta']['url'] ); ?>"><?php echo esc_html( $arc['cta']['button'] ); ?></a>
			</div>
		</div>

		<div class="arc-footer__bottom">
			<p><?php echo esc_html( $footer['copyright'] ); ?></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
