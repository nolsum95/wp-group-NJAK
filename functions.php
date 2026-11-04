<?php
/**
 * Theme setup, assets, and document metadata.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require get_template_directory() . '/inc/site-data.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/icons.php';
require get_template_directory() . '/inc/artwork.php';
require get_template_directory() . '/inc/contact.php';

/**
 * Theme supports and menus.
 */
function gp_setup() {
	load_theme_textdomain( 'group-portfolio', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 80,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'group-portfolio' ),
			'footer'  => __( 'Footer Menu', 'group-portfolio' ),
		)
	);
}
add_action( 'after_setup_theme', 'gp_setup' );

/**
 * Front-end styles and behavior.
 */
function gp_assets() {
	$uri = get_template_directory_uri();
	$dir = get_template_directory();

	wp_enqueue_style(
		'gp-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'gp-main',
		$uri . '/assets/css/main.css',
		array( 'gp-fonts' ),
		filemtime( $dir . '/assets/css/main.css' )
	);

	wp_enqueue_script(
		'gp-main',
		$uri . '/assets/js/main.js',
		array(),
		filemtime( $dir . '/assets/js/main.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'gp_assets' );

/**
 * Early head tags: font connection, favicon, and the JS hook class.
 */
function gp_head() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	echo '<link rel="icon" href="' . esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ) . '" type="image/svg+xml">' . "\n";

	if ( is_front_page() ) {
		$description = gp_content_get( 'meta_description', '' );
		if ( is_string( $description ) && '' !== $description ) {
			echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
		}
	}

	echo "<script>document.documentElement.classList.add('js');</script>\n";
}
add_action( 'wp_head', 'gp_head', 1 );

/**
 * Use the editable group name in the browser title.
 *
 * @param array<string, string> $parts Title parts.
 * @return array<string, string>
 */
function gp_document_title( $parts ) {
	if ( is_front_page() ) {
		$parts['title']   = (string) gp_content_get( 'group_name', get_bloginfo( 'name' ) );
		$parts['tagline'] = (string) gp_content_get( 'tagline', '' );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'gp_document_title' );

/**
 * Content width used by embedded media.
 */
function gp_content_width() {
	$GLOBALS['content_width'] = 1160;
}
add_action( 'after_setup_theme', 'gp_content_width', 0 );
