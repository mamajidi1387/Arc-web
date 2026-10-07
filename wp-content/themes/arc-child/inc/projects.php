<?php
/**
 * Projects — the "پروژه‌ها / Projects" content type.
 *
 * Add a project (title, image, text, category) in WP admin and it appears
 * automatically in every place the theme lists projects: the "Recent work"
 * section of the landing page and the portfolio page grid. Until projects are
 * added, the built-in demo items from inc/content.php are shown instead.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the project post type and its category taxonomy.
 */
function arc_register_projects() {
	register_post_type(
		'arc_project',
		array(
			'labels'          => array(
				'name'                  => 'پروژه‌ها',
				'singular_name'         => 'پروژه',
				'menu_name'             => 'پروژه‌ها',
				'add_new'               => 'افزودن پروژه',
				'add_new_item'          => 'افزودن پروژه جدید',
				'edit_item'             => 'ویرایش پروژه',
				'new_item'              => 'پروژه جدید',
				'view_item'             => 'مشاهده پروژه',
				'search_items'          => 'جستجوی پروژه',
				'not_found'             => 'پروژه‌ای یافت نشد',
				'not_found_in_trash'    => 'پروژه‌ای در زباله‌دان نیست',
				'featured_image'        => 'تصویر پروژه',
				'set_featured_image'    => 'انتخاب تصویر پروژه',
				'remove_featured_image' => 'حذف تصویر پروژه',
				'use_featured_image'    => 'استفاده به‌عنوان تصویر پروژه',
			),
			'public'          => true,
			'show_in_rest'    => true,
			'menu_icon'       => 'dashicons-portfolio',
			'menu_position'   => 21,
			'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'     => false,
			'rewrite'         => array( 'slug' => 'projects' ),
		)
	);

	register_taxonomy(
		'arc_project_cat',
		'arc_project',
		array(
			'labels'            => array(
				'name'          => 'دسته‌های پروژه',
				'singular_name' => 'دسته پروژه',
				'add_new_item'  => 'افزودن دسته پروژه',
				'edit_item'     => 'ویرایش دسته پروژه',
				'search_items'  => 'جستجوی دسته پروژه',
				'all_items'     => 'همه دسته‌ها',
			),
			'public'            => true,
			'show_in_rest'      => true,
			'hierarchical'      => false,
			'show_admin_column' => true,
		)
	);
}
add_action( 'init', 'arc_register_projects' );

/**
 * Projects to show in the portfolio sections, newest first.
 *
 * @param int $limit Maximum number of projects (0 for all).
 * @return array Normalised project rows.
 */
function arc_get_projects( $limit = 3 ) {
	if ( ! post_type_exists( 'arc_project' ) ) {
		return array();
	}

	$posts = get_posts(
		array(
			'post_type'      => 'arc_project',
			'posts_per_page' => $limit > 0 ? $limit : -1,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'date'       => 'DESC',
			),
		)
	);

	$projects = array();

	foreach ( $posts as $post ) {
		$terms = wp_get_post_terms( $post->ID, 'arc_project_cat', array( 'fields' => 'names' ) );
		$text  = trim( $post->post_excerpt );

		if ( '' === $text ) {
			$text = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_content ) ), 22, '…' );
		}

		$projects[] = array(
			'title' => get_the_title( $post ),
			'tag'   => is_array( $terms ) && $terms ? $terms[0] : '',
			'text'  => $text,
			'url'   => get_permalink( $post ),
			'image' => get_the_post_thumbnail_url( $post, 'medium_large' ),
		);
	}

	return $projects;
}

/**
 * Print the project card grid.
 *
 * @param array $args {
 *     @type int $limit   Number of projects to show (0 for all). Default 3.
 *     @type int $columns Grid columns. Default 3.
 * }
 */
function arc_render_projects( $args = array() ) {
	$args     = wp_parse_args(
		$args,
		array(
			'limit'   => 3,
			'columns' => 3,
		)
	);
	$content  = arc_content();
	$projects = arc_get_projects( (int) $args['limit'] );

	// Nothing published yet — fall back to the built-in demo items.
	if ( empty( $projects ) ) {
		foreach ( $content['portfolio']['items'] as $item ) {
			$projects[] = array(
				'title' => $item['title'],
				'tag'   => $item['tag'],
				'text'  => '',
				'url'   => $content['portfolio']['all_url'],
				'image' => '',
			);
		}
	}

	if ( empty( $projects ) ) {
		return;
	}

	printf( '<div class="arc-grid arc-grid--%d">', (int) $args['columns'] );

	foreach ( $projects as $project ) {
		?>
		<a class="arc-work" href="<?php echo esc_url( $project['url'] ); ?>">
			<span class="arc-work__thumb" aria-hidden="true">
				<?php if ( ! empty( $project['image'] ) ) : ?>
					<img src="<?php echo esc_url( $project['image'] ); ?>" alt="" loading="lazy" decoding="async">
				<?php endif; ?>
			</span>
			<?php if ( ! empty( $project['tag'] ) ) : ?>
				<span class="arc-work__tag"><?php echo esc_html( $project['tag'] ); ?></span>
			<?php endif; ?>
			<span class="arc-work__title"><?php echo esc_html( $project['title'] ); ?></span>
			<?php if ( ! empty( $project['text'] ) ) : ?>
				<span class="arc-work__text"><?php echo esc_html( $project['text'] ); ?></span>
			<?php endif; ?>
		</a>
		<?php
	}

	echo '</div>';
}

/**
 * Whether the current page is the portfolio page (in either language).
 */
function arc_is_portfolio_page() {
	if ( ! is_page() ) {
		return false;
	}

	$current = get_permalink();
	$target  = arc_url( '/portfolio' );

	return $current && $target && untrailingslashit( $current ) === untrailingslashit( $target );
}

/**
 * Admin hints so the upload form is self-explanatory.
 */
function arc_project_title_placeholder( $text, $post ) {
	return 'arc_project' === $post->post_type ? 'نام پروژه' : $text;
}
add_filter( 'enter_title_here', 'arc_project_title_placeholder', 10, 2 );

function arc_project_admin_notice() {
	$screen = get_current_screen();

	if ( ! $screen || 'arc_project' !== $screen->post_type ) {
		return;
	}

	printf(
		'<div class="notice notice-info"><p>%s</p></div>',
		esc_html( 'تصویر پروژه را در «تصویر پروژه» و متن آن را در ویرایشگر وارد کنید. پس از انتشار، پروژه به‌صورت خودکار در بخش «پروژه‌های اخیر» صفحه اصلی و صفحه نمونه‌کارها نمایش داده می‌شود.' )
	);
}
add_action( 'admin_notices', 'arc_project_admin_notice' );
