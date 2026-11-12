<?php
/**
 * Team section.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_team    = gp_content_get( 'team', array() );
$gp_team    = is_array( $gp_team ) ? $gp_team : array();
$gp_members = gp_content_get( 'members', array() );
$gp_members = is_array( $gp_members ) ? $gp_members : array();
?>
<section id="team" class="section section-alt">
	<div class="container">
		<div class="section-head center reveal">
			<?php if ( ! empty( $gp_team['label'] ) ) : ?>
				<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php echo esc_html( $gp_team['label'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $gp_team['title'] ) ) : ?>
				<h2><?php echo esc_html( $gp_team['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $gp_team['text'] ) ) : ?>
				<p class="lead"><?php echo esc_html( $gp_team['text'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="team-grid">
			<?php foreach ( $gp_members as $gp_member ) : ?>
				<?php
				if ( empty( $gp_member['name'] ) ) {
					continue;
				}
				$gp_photo = gp_image_uri( 'members', isset( $gp_member['photo'] ) ? $gp_member['photo'] : '' );
				$gp_tone  = gp_member_tone( isset( $gp_member['tone'] ) ? $gp_member['tone'] : 'blue' );
				$gp_links = isset( $gp_member['links'] ) && is_array( $gp_member['links'] ) ? $gp_member['links'] : array();
				$gp_skills = isset( $gp_member['skills'] ) && is_array( $gp_member['skills'] ) ? $gp_member['skills'] : array();
				?>
				<article class="member-card reveal">
					<a class="member-card-link" href="<?php echo esc_url( gp_member_url( $gp_member ) ); ?>">
						<span class="sr-only"><?php echo esc_html( sprintf( __( 'Get to know %s', 'group-portfolio' ), $gp_member['name'] ) ); ?></span>
					</a>
					<div class="member-photo tone-<?php echo esc_attr( $gp_tone ); ?><?php echo $gp_photo ? ' has-photo' : ''; ?>">
						<div class="photo-art" aria-hidden="true">
							<span class="blob b1"></span>
							<span class="blob b2"></span>
							<span class="photo-ring"></span>
						</div>
						<?php if ( $gp_photo ) : ?>
							<img src="<?php echo esc_url( $gp_photo ); ?>" alt="" loading="lazy" decoding="async">
						<?php else : ?>
							<span class="monogram"><?php echo esc_html( gp_initials( $gp_member['name'] ) ); ?></span>
						<?php endif; ?>
						<span class="member-bubble" aria-hidden="true"><?php esc_html_e( 'Get to know me!', 'group-portfolio' ); ?></span>
					</div>
					<div class="member-body">
						<h3><?php echo esc_html( $gp_member['name'] ); ?></h3>
						<?php if ( ! empty( $gp_member['role'] ) ) : ?>
							<p class="role"><?php echo esc_html( $gp_member['role'] ); ?></p>
						<?php endif; ?>
						<?php if ( ! empty( $gp_member['bio'] ) ) : ?>
							<p class="bio"><?php echo esc_html( $gp_member['bio'] ); ?></p>
						<?php endif; ?>
						<?php if ( $gp_skills ) : ?>
							<ul class="chips" aria-label="<?php esc_attr_e( 'Skills', 'group-portfolio' ); ?>">
								<?php foreach ( $gp_skills as $gp_skill ) : ?>
									<?php if ( '' === trim( (string) $gp_skill ) ) { continue; } ?>
									<li><?php echo esc_html( $gp_skill ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if ( $gp_links ) : ?>
							<ul class="member-links">
								<?php foreach ( $gp_links as $gp_link ) : ?>
									<?php
									if ( empty( $gp_link['url'] ) || empty( $gp_link['label'] ) ) {
										continue;
									}
									$gp_external = 0 === strpos( $gp_link['url'], 'http' );
									?>
									<li>
										<a class="icon-btn" href="<?php echo esc_url( $gp_link['url'] ); ?>"<?php echo $gp_external ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
											<?php echo gp_icon( isset( $gp_link['icon'] ) ? (string) $gp_link['icon'] : '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
											<span class="sr-only"><?php echo esc_html( $gp_link['label'] ); ?></span>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
