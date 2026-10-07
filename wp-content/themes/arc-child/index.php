<?php
/**
 * Default template — archive and single post fallback.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<section class="arc-section">
	<div class="arc-container arc-container--narrow">
		<?php if ( have_posts() ) : ?>
			<h1 class="arc-page__title">
				<?php
				if ( is_search() ) {
					printf( esc_html__( 'نتایج جستجو برای: %s', 'arc-child' ), esc_html( get_search_query() ) );
				} elseif ( is_archive() ) {
					echo esc_html( wp_strip_all_tags( get_the_archive_title() ) );
				} else {
					echo esc_html( get_bloginfo( 'name' ) );
				}
				?>
			</h1>

			<div class="arc-post-list">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article class="arc-card arc-card--static">
						<h2 class="arc-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="arc-card__text"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
					</article>
					<?php
				endwhile;
				?>
			</div>

			<div class="arc-section__foot"><?php the_posts_pagination(); ?></div>
		<?php else : ?>
			<h1 class="arc-page__title"><?php esc_html_e( 'چیزی پیدا نشد', 'arc-child' ); ?></h1>
			<p class="arc-section__subtitle"><?php esc_html_e( 'محتوای مورد نظر یافت نشد.', 'arc-child' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
