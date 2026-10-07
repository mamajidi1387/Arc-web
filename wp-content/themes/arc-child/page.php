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
	?>
	<section class="arc-section">
		<div class="arc-container arc-container--narrow">
			<h1 class="arc-page__title"><?php the_title(); ?></h1>
			<div class="arc-page__content"><?php the_content(); ?></div>
		</div>
	</section>
	<?php
endwhile;

get_footer();
