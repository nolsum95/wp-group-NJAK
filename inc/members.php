<?php
/**
 * Individual member portfolio routes.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Stable URL slug for a member.
 *
 * @param array<string, mixed> $member Member data.
 * @return string
 */
function gp_member_slug( $member ) {
	if ( ! empty( $member['slug'] ) ) {
		return sanitize_title( (string) $member['slug'] );
	}

	return sanitize_title( isset( $member['name'] ) ? (string) $member['name'] : '' );
}

/**
 * Public URL for a member portfolio.
 *
 * @param array<string, mixed> $member Member data.
 * @return string
 */
function gp_member_url( $member ) {
	$slug = gp_member_slug( $member );

	if ( '' === $slug ) {
		return home_url( '/' );
	}

	return home_url( user_trailingslashit( 'member/' . $slug ) );
}

/**
 * Find one member by slug.
 *
 * @param string $slug Member slug.
 * @return array<string, mixed>|null
 */
function gp_get_member( $slug ) {
	$slug    = sanitize_title( (string) $slug );
	$members = gp_content_get( 'members', array() );

	if ( '' === $slug || ! is_array( $members ) ) {
		return null;
	}

	foreach ( $members as $member ) {
		if ( ! is_array( $member ) || empty( $member['name'] ) ) {
			continue;
		}

		if ( gp_member_slug( $member ) === $slug ) {
			return $member;
		}
	}

	return null;
}

/**
 * Member for the current request, when the URL is a member portfolio.
 *
 * @return array<string, mixed>|null
 */
function gp_current_member() {
	$slug = get_query_var( 'gp_member' );

	if ( ! is_string( $slug ) || '' === $slug ) {
		return null;
	}

	$member = gp_get_member( $slug );

	return is_array( $member ) ? $member : null;
}

/**
 * Register /member/{slug}/.
 */
function gp_member_rewrite() {
	add_rewrite_tag( '%gp_member%', '([^/]+)' );
	add_rewrite_rule( '^member/([^/]+)/?$', 'index.php?gp_member=$matches[1]', 'top' );
}
add_action( 'init', 'gp_member_rewrite' );

/**
 * Keep the member query variable.
 *
 * @param string[] $vars Query variables.
 * @return string[]
 */
function gp_member_query_vars( $vars ) {
	$vars[] = 'gp_member';
	return $vars;
}
add_filter( 'query_vars', 'gp_member_query_vars' );

/**
 * Flush rewrite rules once after the member route is added.
 */
function gp_member_flush_rewrites() {
	if ( '1' === get_option( 'gp_member_rewrite' ) ) {
		return;
	}

	flush_rewrite_rules( false );
	update_option( 'gp_member_rewrite', '1', false );
}
add_action( 'init', 'gp_member_flush_rewrites', 20 );

/**
 * A known member page is not a missing post.
 *
 * @param bool $preempt Whether to short-circuit 404 handling.
 * @return bool
 */
function gp_member_pre_handle_404( $preempt ) {
	if ( gp_current_member() ) {
		return true;
	}

	return $preempt;
}
add_filter( 'pre_handle_404', 'gp_member_pre_handle_404' );

/**
 * Do not send member URLs back to the home page.
 *
 * @param string|false $redirect Redirect target.
 * @return string|false
 */
function gp_member_redirect_canonical( $redirect ) {
	if ( get_query_var( 'gp_member' ) ) {
		return false;
	}

	return $redirect;
}
add_filter( 'redirect_canonical', 'gp_member_redirect_canonical' );

/**
 * Unknown member slugs are a 404.
 */
function gp_member_maybe_404() {
	$slug = get_query_var( 'gp_member' );

	if ( ! is_string( $slug ) || '' === $slug || gp_get_member( $slug ) ) {
		return;
	}

	global $wp_query;

	$wp_query->set_404();
	status_header( 404 );
	nocache_headers();
}
add_action( 'wp', 'gp_member_maybe_404' );

/**
 * Load the member template.
 *
 * @param string $template Current template path.
 * @return string
 */
function gp_member_template( $template ) {
	$slug = get_query_var( 'gp_member' );

	if ( ! is_string( $slug ) || '' === $slug ) {
		return $template;
	}

	if ( is_404() ) {
		$not_found = get_404_template();
		return $not_found ? $not_found : $template;
	}

	$member_template = locate_template( 'member.php' );

	return $member_template ? $member_template : $template;
}
add_filter( 'template_include', 'gp_member_template' );

/**
 * Mark member portfolio pages on the body.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function gp_member_body_class( $classes ) {
	if ( gp_current_member() ) {
		$classes[] = 'is-member';
	}

	return $classes;
}
add_filter( 'body_class', 'gp_member_body_class' );

/**
 * Whether a personal portfolio section has something to show.
 *
 * @param array<string, mixed> $member Member data.
 * @param string               $id     Section id.
 * @return bool
 */
function gp_member_section_ready( $member, $id ) {
	if ( ! is_array( $member ) ) {
		return false;
	}

	if ( 'about' === $id ) {
		return ! empty( $member['bio'] ) || ( ! empty( $member['about'] ) && is_array( $member['about'] ) );
	}

	if ( 'skills' === $id ) {
		return ( ! empty( $member['skills'] ) && is_array( $member['skills'] ) ) || ( ! empty( $member['skill_groups'] ) && is_array( $member['skill_groups'] ) );
	}

	if ( 'contact' === $id ) {
		return true;
	}

	return ! empty( $member[ $id ] ) && is_array( $member[ $id ] );
}

/**
 * Navigation for one member portfolio.
 *
 * Home returns to the group landing page. The other labels jump to sections on this page.
 *
 * @param array<string, mixed> $member Member data.
 * @return array<int, array<string, mixed>>
 */
function gp_member_nav( $member ) {
	$items = array(
		array(
			'label' => __( 'Home', 'group-portfolio' ),
			'url'   => home_url( '/' ),
		),
	);

	$sections = array(
		'about'        => __( 'About', 'group-portfolio' ),
		'skills'       => __( 'Skills', 'group-portfolio' ),
		'projects'     => __( 'Projects', 'group-portfolio' ),
		'education'    => __( 'Education', 'group-portfolio' ),
		'achievements' => __( 'Achievements', 'group-portfolio' ),
		'contact'      => __( 'Contact', 'group-portfolio' ),
	);

	foreach ( $sections as $id => $label ) {
		if ( ! gp_member_section_ready( $member, $id ) ) {
			continue;
		}

		$items[] = array(
			'label' => $label,
			'url'   => '#' . $id,
			'cta'   => 'contact' === $id,
		);
	}

	return $items;
}
