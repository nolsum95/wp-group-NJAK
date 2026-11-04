<?php
/**
 * Contact section.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_contact = gp_content_get( 'contact', array() );
$gp_contact = is_array( $gp_contact ) ? $gp_contact : array();
$gp_socials = gp_content_get( 'socials', array() );
$gp_socials = is_array( $gp_socials ) ? $gp_socials : array();
$gp_email   = (string) gp_content_get( 'email', '' );
$gp_state   = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
?>
<section id="contact" class="section">
	<div class="container contact-grid">
		<div class="reveal">
			<?php if ( ! empty( $gp_contact['label'] ) ) : ?>
				<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php echo esc_html( $gp_contact['label'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $gp_contact['title'] ) ) : ?>
				<h2><?php echo esc_html( $gp_contact['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $gp_contact['text'] ) ) : ?>
				<p class="lead"><?php echo esc_html( $gp_contact['text'] ); ?></p>
			<?php endif; ?>
			<?php if ( is_email( $gp_email ) ) : ?>
				<a class="contact-email" href="<?php echo esc_url( 'mailto:' . $gp_email ); ?>"><?php echo esc_html( $gp_email ); ?></a>
			<?php endif; ?>
			<ul class="social-list">
				<?php foreach ( $gp_socials as $gp_social ) : ?>
					<?php
					if ( empty( $gp_social['url'] ) || empty( $gp_social['label'] ) ) {
						continue;
					}
					?>
					<li>
						<a href="<?php echo esc_url( $gp_social['url'] ); ?>" target="_blank" rel="noopener noreferrer">
							<?php echo gp_icon( isset( $gp_social['icon'] ) ? (string) $gp_social['icon'] : '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
							<span><?php echo esc_html( $gp_social['label'] ); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<form class="contact-form reveal" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="gp_contact">
			<?php wp_nonce_field( 'gp_contact', 'gp_contact_nonce' ); ?>
			<p class="hp" aria-hidden="true">
				<label for="gp-company"><?php esc_html_e( 'Company', 'group-portfolio' ); ?></label>
				<input id="gp-company" type="text" name="gp_company" tabindex="-1" autocomplete="off">
			</p>

			<?php if ( 'sent' === $gp_state ) : ?>
				<p class="form-notice" role="status" data-contact-status><?php esc_html_e( 'Thank you. Your message has been received.', 'group-portfolio' ); ?></p>
			<?php elseif ( 'invalid' === $gp_state ) : ?>
				<p class="form-notice is-error" role="alert" data-contact-status><?php esc_html_e( 'Please check every field and try again.', 'group-portfolio' ); ?></p>
			<?php elseif ( 'error' === $gp_state ) : ?>
				<p class="form-notice is-error" role="alert" data-contact-status><?php esc_html_e( 'The message could not be sent. Please use the email address instead.', 'group-portfolio' ); ?></p>
			<?php endif; ?>

			<div class="form-grid">
				<div class="form-row">
					<div class="field">
						<label for="gp-name"><?php esc_html_e( 'Name', 'group-portfolio' ); ?></label>
						<input id="gp-name" name="gp_name" type="text" required maxlength="80" autocomplete="name">
					</div>
					<div class="field">
						<label for="gp-email"><?php esc_html_e( 'Email', 'group-portfolio' ); ?></label>
						<input id="gp-email" name="gp_email" type="email" required maxlength="100" autocomplete="email">
					</div>
				</div>
				<div class="field">
					<label for="gp-subject"><?php esc_html_e( 'Subject', 'group-portfolio' ); ?></label>
					<input id="gp-subject" name="gp_subject" type="text" required maxlength="140">
				</div>
				<div class="field">
					<label for="gp-message"><?php esc_html_e( 'Message', 'group-portfolio' ); ?></label>
					<textarea id="gp-message" name="gp_message" required maxlength="4000" rows="6"></textarea>
				</div>
				<button class="btn btn-primary" type="submit"><?php esc_html_e( 'Send Message', 'group-portfolio' ); ?></button>
			</div>
		</form>
	</div>
</section>
