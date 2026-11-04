<?php
/**
 * Contact form handler.
 *
 * Messages are stored as private posts so the form works without a mail server.
 * Delivery by email is attempted as well.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register a private inbox for form messages.
 */
function gp_register_message_type() {
	register_post_type(
		'gp_message',
		array(
			'labels'              => array(
				'name'          => __( 'Messages', 'group-portfolio' ),
				'singular_name' => __( 'Message', 'group-portfolio' ),
				'menu_name'     => __( 'Inbox', 'group-portfolio' ),
				'not_found'     => __( 'No messages yet.', 'group-portfolio' ),
				'search_items'  => __( 'Search messages', 'group-portfolio' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-email-alt',
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'capabilities'        => array(
				'create_posts' => 'do_not_allow',
			),
			'supports'            => array( 'title', 'editor' ),
			'rewrite'             => false,
			'query_var'           => false,
			'exclude_from_search' => true,
		)
	);
}
add_action( 'init', 'gp_register_message_type' );

/**
 * Inbox columns.
 *
 * @param array<string, string> $columns Columns.
 * @return array<string, string>
 */
function gp_message_columns( $columns ) {
	return array(
		'cb'         => isset( $columns['cb'] ) ? $columns['cb'] : '',
		'title'      => __( 'From', 'group-portfolio' ),
		'gp_email'   => __( 'Email', 'group-portfolio' ),
		'gp_subject' => __( 'Subject', 'group-portfolio' ),
		'date'       => isset( $columns['date'] ) ? $columns['date'] : __( 'Date', 'group-portfolio' ),
	);
}
add_filter( 'manage_gp_message_posts_columns', 'gp_message_columns' );

/**
 * Render an inbox column.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post id.
 */
function gp_message_column( $column, $post_id ) {
	if ( 'gp_email' === $column ) {
		echo esc_html( (string) get_post_meta( $post_id, 'gp_email', true ) );
	}

	if ( 'gp_subject' === $column ) {
		echo esc_html( (string) get_post_meta( $post_id, 'gp_subject', true ) );
	}
}
add_action( 'manage_gp_message_posts_custom_column', 'gp_message_column', 10, 2 );

/**
 * Redirect back to the contact section.
 *
 * @param string $code sent, invalid, or error.
 */
function gp_contact_redirect( $code ) {
	$allowed = array( 'sent', 'invalid', 'error' );

	if ( ! in_array( $code, $allowed, true ) ) {
		$code = 'error';
	}

	wp_safe_redirect( home_url( '/?contact=' . $code . '#contact' ) );
	exit;
}

/**
 * Store and try to email a contact message.
 */
function gp_handle_contact() {
	if ( ! isset( $_POST['gp_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['gp_contact_nonce'] ) ), 'gp_contact' ) ) {
		gp_contact_redirect( 'error' );
	}

	// Honeypot. Pretend the message was accepted.
	if ( ! empty( $_POST['gp_company'] ) ) {
		gp_contact_redirect( 'sent' );
	}

	$ip  = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
	$key = 'gp_contact_' . md5( $ip );

	if ( get_transient( $key ) ) {
		gp_contact_redirect( 'error' );
	}

	$name    = isset( $_POST['gp_name'] ) ? sanitize_text_field( wp_unslash( $_POST['gp_name'] ) ) : '';
	$email   = isset( $_POST['gp_email'] ) ? sanitize_email( wp_unslash( $_POST['gp_email'] ) ) : '';
	$subject = isset( $_POST['gp_subject'] ) ? sanitize_text_field( wp_unslash( $_POST['gp_subject'] ) ) : '';
	$message = isset( $_POST['gp_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['gp_message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === $subject || '' === $message ) {
		gp_contact_redirect( 'invalid' );
	}

	if ( mb_strlen( $name ) > 80 || mb_strlen( $subject ) > 140 || mb_strlen( $message ) > 4000 ) {
		gp_contact_redirect( 'invalid' );
	}

	$post_id = wp_insert_post(
		array(
			'post_type'    => 'gp_message',
			'post_status'  => 'private',
			'post_title'   => $name,
			'post_content' => $message,
		),
		true
	);

	if ( is_wp_error( $post_id ) || ! $post_id ) {
		gp_contact_redirect( 'error' );
	}

	update_post_meta( $post_id, 'gp_email', $email );
	update_post_meta( $post_id, 'gp_subject', $subject );

	set_transient( $key, 1, 30 );

	$to = sanitize_email( (string) gp_content_get( 'email', '' ) );

	if ( is_email( $to ) ) {
		$body    = "Name: {$name}\nEmail: {$email}\n\n{$message}";
		$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );
		wp_mail( $to, '[Portfolio] ' . $subject, $body, $headers );
	}

	gp_contact_redirect( 'sent' );
}
add_action( 'admin_post_nopriv_gp_contact', 'gp_handle_contact' );
add_action( 'admin_post_gp_contact', 'gp_handle_contact' );
