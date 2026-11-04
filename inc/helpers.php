<?php
/**
 * Small template helpers.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Public URL for a theme image, if the file exists.
 *
 * @param string $folder   Either "members" or "projects".
 * @param string $filename File name only, no directories.
 * @return string
 */
function gp_image_uri( $folder, $filename ) {
	$filename = basename( (string) $filename );
	$folder   = ( 'projects' === $folder ) ? 'projects' : 'members';

	if ( '' === $filename || '.' === $filename || '..' === $filename ) {
		return '';
	}

	$path = get_template_directory() . '/assets/images/' . $folder . '/' . $filename;

	if ( ! is_readable( $path ) ) {
		return '';
	}

	return get_template_directory_uri() . '/assets/images/' . $folder . '/' . rawurlencode( $filename );
}

/**
 * Up to two initials from a display name.
 *
 * @param string $name Display name.
 * @return string
 */
function gp_initials( $name ) {
	$name = trim( wp_strip_all_tags( (string) $name ) );

	if ( '' === $name ) {
		return '•';
	}

	$parts = preg_split( '/\s+/u', $name );

	if ( ! is_array( $parts ) || empty( $parts ) ) {
		return '•';
	}

	$first = mb_strtoupper( mb_substr( $parts[0], 0, 1 ) );
	$last  = $parts[ count( $parts ) - 1 ];
	$words = array(
		'zero'  => '0',
		'one'   => '1',
		'two'   => '2',
		'three' => '3',
		'four'  => '4',
		'five'  => '5',
		'six'   => '6',
		'seven' => '7',
		'eight' => '8',
		'nine'  => '9',
	);
	$key   = mb_strtolower( $last );

	if ( isset( $words[ $key ] ) ) {
		return $first . $words[ $key ];
	}

	if ( 1 === count( $parts ) ) {
		return $first;
	}

	return $first . mb_strtoupper( mb_substr( $last, 0, 1 ) );
}

/**
 * Front-page section URL.
 *
 * @param string $hash Element id without the hash sign.
 * @return string
 */
function gp_section_url( $hash ) {
	$hash = preg_replace( '/[^a-z0-9_-]/i', '', (string) $hash );

	return home_url( '/#' . $hash );
}

/**
 * Allowed tones for member artwork.
 *
 * @param string $tone Requested tone.
 * @return string
 */
function gp_member_tone( $tone ) {
	$allowed = array( 'blue', 'violet', 'cyan', 'indigo' );
	$tone    = sanitize_html_class( (string) $tone );

	return in_array( $tone, $allowed, true ) ? $tone : 'blue';
}

/**
 * Theme logo image, when the file is present.
 *
 * @return string
 */
function gp_brand_logo_uri() {
	$path = get_template_directory() . '/assets/images/logo.png';

	if ( ! is_readable( $path ) ) {
		return '';
	}

	return get_template_directory_uri() . '/assets/images/logo.png';
}

/**
 * Header and footer logo.
 */
function gp_the_logo() {
	$name = (string) gp_content_get( 'group_name', get_bloginfo( 'name' ) );
	$logo = gp_brand_logo_uri();

	echo '<a class="logo' . ( '' !== $logo ? ' logo-image' : '' ) . '" href="' . esc_url( home_url( '/' ) ) . '">';

	if ( '' !== $logo ) {
		echo '<img class="logo-brand" src="' . esc_url( $logo ) . '" alt="' . esc_attr( $name ) . '">';
	} else {
		echo '<span class="logo-mark" aria-hidden="true"><span></span><span></span><span></span><span></span></span>';
		echo '<span class="logo-word">' . esc_html( $name ) . '</span>';
	}

	echo '</a>';
}
