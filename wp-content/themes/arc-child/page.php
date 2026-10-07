<?php
/**
 * Single page template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

while ( have_posts() ) :
	the_post();
	$arc_is_portfolio = arc_is_portfolio_page();
	?>
	<section class="arc-section">
		<div class="arc-container<?php echo $arc_is_portfolio ? '' : ' arc-container--narrow'; ?>">
			<h1 class="arc-page__title"><?php the_title(); ?></h1>
			<div class="arc-page__content"><?php the_content(); ?></div>
			<?php if ( $arc_is_portfolio ) : ?>
				<?php arc_render_projects( array( 'limit' => 0, 'columns' => 3 ) ); ?>
			<?php endif; ?>
		</div>
	</section>
	<?php
endwhile;

get_footer();
