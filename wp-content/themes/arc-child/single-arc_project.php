<?php
/**
 * Single project template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="arc-section">
		<div class="arc-container arc-container--narrow">
			<h1 class="arc-page__title"><?php the_title(); ?></h1>

			<?php $arc_project_terms = get_the_terms( get_the_ID(), 'arc_project_cat' ); ?>
			<?php if ( ! empty( $arc_project_terms ) && ! is_wp_error( $arc_project_terms ) ) : ?>
				<p class="arc-project__tag"><?php echo esc_html( $arc_project_terms[0]->name ); ?></p>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="arc-project__media"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>

			<div class="arc-page__content"><?php the_content(); ?></div>

			<div class="arc-section__foot">
				<a class="arc-btn arc-btn--ghost" href="<?php echo esc_url( arc_url( '/portfolio' ) ); ?>">
					<?php echo esc_html( 'fa' === arc_content()['locale'] ? 'همه نمونه‌کارها' : 'All projects' ); ?>
				</a>
			</div>
		</div>
	</section>
	<?php
endwhile;

get_footer();
