<?php
/**
 * Site footer.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_name    = (string) gp_content_get( 'group_name', get_bloginfo( 'name' ) );
$gp_footer  = gp_content_get( 'footer', array() );
$gp_footer  = is_array( $gp_footer ) ? $gp_footer : array();
$gp_member_page = gp_current_member();
$gp_nav         = is_array( $gp_member_page ) ? gp_member_nav( $gp_member_page ) : gp_content_get( 'nav', array() );
$gp_nav         = is_array( $gp_nav ) ? $gp_nav : array();
$gp_socials = gp_content_get( 'socials', array() );
$gp_socials = is_array( $gp_socials ) ? $gp_socials : array();
$gp_email   = (string) gp_content_get( 'email', '' );
$gp_note    = isset( $gp_footer['note'] ) ? (string) $gp_footer['note'] : 'Designed and Developed by %s | 4th Year Information Technology Students';
?>
	<footer class="site-footer">
		<div class="container">
			<div class="footer-grid">
				<div class="footer-brand">
					<?php gp_the_logo(); ?>
					<?php if ( ! empty( $gp_footer['summary'] ) ) : ?>
						<p class="footer-summary"><?php echo esc_html( $gp_footer['summary'] ); ?></p>
					<?php endif; ?>
					<ul class="footer-socials">
						<?php if ( is_email( $gp_email ) ) : ?>
							<li>
								<a class="icon-btn" href="<?php echo esc_url( 'mailto:' . $gp_email ); ?>">
									<?php echo gp_icon( 'mail' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
									<span class="sr-only"><?php esc_html_e( 'Email', 'group-portfolio' ); ?></span>
								</a>
							</li>
						<?php endif; ?>
						<?php foreach ( $gp_socials as $gp_social ) : ?>
							<?php
							if ( empty( $gp_social['url'] ) || empty( $gp_social['label'] ) ) {
								continue;
							}
							?>
							<li>
								<a class="icon-btn" href="<?php echo esc_url( $gp_social['url'] ); ?>" target="_blank" rel="noopener noreferrer">
									<?php echo gp_icon( isset( $gp_social['icon'] ) ? (string) $gp_social['icon'] : '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
									<span class="sr-only"><?php echo esc_html( $gp_social['label'] ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div>
					<h2 class="footer-title"><?php esc_html_e( 'Explore', 'group-portfolio' ); ?></h2>
					<?php if ( has_nav_menu( 'footer' ) ) : ?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'container'      => false,
								'menu_class'     => 'footer-links',
								'fallback_cb'    => false,
								'depth'          => 1,
							)
						);
						?>
					<?php else : ?>
						<ul class="footer-links">
							<?php foreach ( $gp_nav as $gp_item ) : ?>
								<?php
								if ( empty( $gp_item['label'] ) ) {
									continue;
								}
								if ( ! empty( $gp_item['url'] ) ) {
									$gp_item_url = $gp_item['url'];
								} elseif ( ! empty( $gp_item['hash'] ) ) {
									$gp_item_url = gp_section_url( $gp_item['hash'] );
								} else {
									continue;
								}
								?>
								<li><a href="<?php echo esc_url( $gp_item_url ); ?>"><?php echo esc_html( $gp_item['label'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>

				<div>
					<h2 class="footer-title"><?php esc_html_e( 'Contact', 'group-portfolio' ); ?></h2>
					<ul class="footer-links">
						<?php if ( is_email( $gp_email ) ) : ?>
							<li><a href="<?php echo esc_url( 'mailto:' . $gp_email ); ?>"><?php echo esc_html( $gp_email ); ?></a></li>
						<?php endif; ?>
						<?php foreach ( $gp_socials as $gp_social ) : ?>
							<?php
							if ( empty( $gp_social['url'] ) || empty( $gp_social['label'] ) ) {
								continue;
							}
							?>
							<li><a href="<?php echo esc_url( $gp_social['url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $gp_social['label'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="footer-bottom">
				<p><?php echo esc_html( sprintf( $gp_note, $gp_name ) ); ?></p>
				<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $gp_name ); ?></p>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
