<?php
/**
 * Arc Child theme — setup, assets and hooks.
 *
 * The theme renders the Arc landing design (dark, purple/blue gradients,
 * Persian RTL + English LTR). Page content is built with Elementor.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Current language slug ('fa' | 'en') for the built-in landing copy.
 */
function arc_lang() {
	if ( function_exists( 'pll_current_language' ) ) {
		$lang = pll_current_language();
		if ( $lang ) {
			return $lang;
		}
	}
	return 0 === strpos( get_locale(), 'fa' ) ? 'fa' : 'en';
}

/**
 * URL of a page in the active language.
 *
 * Paths are given as the default-language slug (e.g. "services"); the Polylang
 * translation of that page is returned when another language is active. Slugs
 * cannot be shared across languages in Polylang free (that is a Pro feature),
 * so resolving through the translation keeps every link pointing at the right
 * page in either language.
 */
function arc_url( $path = '/' ) {
	$path = trim( $path, '/' );
	$lang = arc_lang();

	if ( '' === $path ) {
		return function_exists( 'pll_home_url' ) ? pll_home_url( $lang ) : home_url( '/' );
	}

	static $cache = array();
	$cache_key = $lang . '|' . $path;
	if ( isset( $cache[ $cache_key ] ) ) {
		return $cache[ $cache_key ];
	}

	$page = get_page_by_path( $path, OBJECT, 'page' );

	if ( $page && 'fa' !== $lang && function_exists( 'pll_get_post' ) ) {
		$translation = pll_get_post( $page->ID, $lang );
		if ( $translation ) {
			$page = get_post( $translation );
		}
	}

	$url = $page ? get_permalink( $page ) : home_url( '/' . $path . '/' );

	return $cache[ $cache_key ] = $url;
}

/**
 * Language switcher links (Polylang when available).
 */
function arc_language_links() {
	if ( function_exists( 'pll_the_languages' ) ) {
		$langs = pll_the_languages( array( 'raw' => 1 ) );
		if ( ! empty( $langs ) ) {
			return $langs;
		}
	}
	return array(
		'fa' => array( 'slug' => 'fa', 'name' => 'فارسی', 'url' => home_url( '/' ), 'current_lang' => 'fa' === arc_lang() ),
		'en' => array( 'slug' => 'en', 'name' => 'English', 'url' => home_url( '/en/' ), 'current_lang' => 'en' === arc_lang() ),
	);
}

require_once get_stylesheet_directory() . '/inc/content.php';

/**
 * Theme supports and navigation locations.
 */
function arc_child_setup() {
	load_child_theme_textdomain( 'arc-child', get_stylesheet_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary'          => __( 'منوی اصلی', 'arc-child' ),
			'footer_services'  => __( 'فوتر — خدمات', 'arc-child' ),
			'footer_resources' => __( 'فوتر — منابع', 'arc-child' ),
		)
	);
}
add_action( 'after_setup_theme', 'arc_child_setup' );

/**
 * Fonts, stylesheet and behaviour script.
 */
function arc_child_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'arc-fonts',
		'https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700;800;900&family=Manrope:wght@400;500;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'arc-theme', get_stylesheet_directory_uri() . '/assets/css/theme.css', array( 'arc-fonts' ), $version );
	wp_enqueue_script( 'arc-theme', get_stylesheet_directory_uri() . '/assets/js/theme.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'arc_child_assets' );

/**
 * Sandbox preview only.
 *
 * The dev site is served through a proxy with an explicit WP_HOME
 * (see docker-compose.base44.yml), so WordPress' canonical redirect would
 * bounce internal health-check requests to the public URL. Disabled only when
 * BASE44_PREVIEW_MODE is exactly "1"; unset or any other value keeps the
 * normal behaviour.
 */
if ( '1' === getenv( 'BASE44_PREVIEW_MODE' ) ) {
	add_filter( 'redirect_canonical', '__return_false' );
}

/**
 * Language-aware home page title (the site tagline is stored once).
 */
function arc_document_title( $parts ) {
	if ( ! is_front_page() ) {
		return $parts;
	}

	$parts['title'] = 'en' === arc_lang()
		? 'Arc — Software development, web design & business growth'
		: 'Arc — توسعه نرم‌افزار، طراحی سایت و توسعه کسب‌وکار';
	$parts['tagline'] = '';

	return $parts;
}
add_filter( 'document_title_parts', 'arc_document_title' );

/**
 * Fallback navigation when no WP menu is assigned to the 'primary' location.
 */
function arc_nav_fallback() {
	$content = arc_content();
	echo '<ul class="arc-nav__list">';
	foreach ( $content['nav'] as $item ) {
		printf(
			'<li class="menu-item"><a href="%s">%s</a></li>',
			esc_url( $item['url'] ),
			esc_html( $item['label'] )
		);
	}
	echo '</ul>';
}
