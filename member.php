<?php
/**
 * Personal portfolio for one group member.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_member = gp_current_member();

if ( ! is_array( $gp_member ) || empty( $gp_member['name'] ) ) {
	get_template_part( '404' );
	return;
}

$gp_photo    = gp_image_uri( 'members', isset( $gp_member['photo'] ) ? $gp_member['photo'] : '' );
$gp_tone     = gp_member_tone( isset( $gp_member['tone'] ) ? $gp_member['tone'] : 'blue' );
$gp_links    = isset( $gp_member['links'] ) && is_array( $gp_member['links'] ) ? $gp_member['links'] : array();
$gp_skills   = isset( $gp_member['skills'] ) && is_array( $gp_member['skills'] ) ? $gp_member['skills'] : array();
$gp_about        = isset( $gp_member['about'] ) && is_array( $gp_member['about'] ) ? $gp_member['about'] : array();
$gp_groups       = isset( $gp_member['skill_groups'] ) && is_array( $gp_member['skill_groups'] ) ? $gp_member['skill_groups'] : array();
$gp_projects     = isset( $gp_member['projects'] ) && is_array( $gp_member['projects'] ) ? $gp_member['projects'] : array();
$gp_education    = isset( $gp_member['education'] ) && is_array( $gp_member['education'] ) ? $gp_member['education'] : array();
$gp_achievements = isset( $gp_member['achievements'] ) && is_array( $gp_member['achievements'] ) ? $gp_member['achievements'] : array();
$gp_email        = ! empty( $gp_member['email'] ) ? (string) $gp_member['email'] : (string) gp_content_get( 'email', '' );
$gp_others       = gp_content_get( 'members', array() );
$gp_others   = is_array( $gp_others ) ? $gp_others : array();
$gp_current  = gp_member_slug( $gp_member );

get_header();
?>
<main id="main">
	<section class="section member-hero"<?php echo $gp_about ? '' : ' id="about"'; ?>>
		<div class="container">
			<a class="text-link back-link" href="<?php echo esc_url( gp_section_url( 'team' ) ); ?>">
				<?php echo gp_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
				<?php esc_html_e( 'Back to the team', 'group-portfolio' ); ?>
			</a>

			<div class="member-hero-grid">
				<div class="member-portrait tone-<?php echo esc_attr( $gp_tone ); ?><?php echo $gp_photo ? ' has-photo' : ''; ?>">
					<div class="photo-art" aria-hidden="true">
						<span class="blob b1"></span>
						<span class="blob b2"></span>
						<span class="photo-ring"></span>
					</div>
					<?php if ( $gp_photo ) : ?>
						<img src="<?php echo esc_url( $gp_photo ); ?>" alt="<?php echo esc_attr( $gp_member['name'] ); ?>" decoding="async">
					<?php else : ?>
						<span class="monogram"><?php echo esc_html( gp_initials( $gp_member['name'] ) ); ?></span>
					<?php endif; ?>
				</div>

				<div class="member-intro">
					<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( 'Personal Portfolio', 'group-portfolio' ); ?></p>
					<h1><?php echo esc_html( $gp_member['name'] ); ?></h1>
					<?php if ( ! empty( $gp_member['role'] ) ) : ?>
						<p class="role"><?php echo esc_html( $gp_member['role'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $gp_member['tagline'] ) ) : ?>
						<p class="member-tagline"><?php echo esc_html( $gp_member['tagline'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $gp_member['bio'] ) ) : ?>
						<p class="lead"><?php echo esc_html( $gp_member['bio'] ); ?></p>
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
						<ul class="member-socials">
							<?php foreach ( $gp_links as $gp_link ) : ?>
								<?php
								if ( empty( $gp_link['url'] ) || empty( $gp_link['label'] ) ) {
									continue;
								}
								$gp_external = 0 === strpos( $gp_link['url'], 'http' );
								?>
								<li>
									<a href="<?php echo esc_url( $gp_link['url'] ); ?>"<?php echo $gp_external ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
										<?php echo gp_icon( isset( $gp_link['icon'] ) ? (string) $gp_link['icon'] : '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
										<?php echo esc_html( $gp_link['label'] ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<?php if ( $gp_about ) : ?>
		<section id="about" class="section section-alt">
			<div class="container">
				<div class="section-head reveal">
					<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( 'About', 'group-portfolio' ); ?></p>
					<h2><?php esc_html_e( 'About Me', 'group-portfolio' ); ?></h2>
				</div>
				<ul class="member-facts">
					<?php foreach ( $gp_about as $gp_fact ) : ?>
						<?php
						if ( empty( $gp_fact['label'] ) || empty( $gp_fact['text'] ) ) {
							continue;
						}
						?>
						<li class="reveal">
							<h3><?php echo esc_html( $gp_fact['label'] ); ?></h3>
							<p><?php echo esc_html( $gp_fact['text'] ); ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $gp_groups || $gp_skills ) : ?>
		<section id="skills" class="section<?php echo $gp_about ? '' : ' section-alt'; ?>">
			<div class="container">
				<div class="section-head reveal">
					<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( 'Expertise', 'group-portfolio' ); ?></p>
					<h2><?php esc_html_e( 'Skills', 'group-portfolio' ); ?></h2>
				</div>
				<?php if ( $gp_groups ) : ?>
				<div class="member-skills">
					<?php foreach ( $gp_groups as $gp_group ) : ?>
						<?php
						if ( empty( $gp_group['title'] ) ) {
							continue;
						}
						$gp_items = isset( $gp_group['items'] ) && is_array( $gp_group['items'] ) ? $gp_group['items'] : array();
						?>
						<article class="skill-card reveal">
							<?php if ( ! empty( $gp_group['icon'] ) ) : ?>
								<span class="skill-icon"><?php echo gp_icon( (string) $gp_group['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?></span>
							<?php endif; ?>
							<h3><?php echo esc_html( $gp_group['title'] ); ?></h3>
							<?php if ( $gp_items ) : ?>
								<ul class="chips">
									<?php foreach ( $gp_items as $gp_item ) : ?>
										<?php if ( '' === trim( (string) $gp_item ) ) { continue; } ?>
										<li><?php echo esc_html( $gp_item ); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
				<?php else : ?>
					<ul class="chips">
						<?php foreach ( $gp_skills as $gp_skill ) : ?>
							<?php if ( '' === trim( (string) $gp_skill ) ) { continue; } ?>
							<li><?php echo esc_html( $gp_skill ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $gp_projects ) : ?>
		<section id="projects" class="section<?php echo ( $gp_about || $gp_groups || $gp_skills ) ? ' section-alt' : ''; ?>">
			<div class="container">
				<div class="section-head reveal">
					<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( 'Work', 'group-portfolio' ); ?></p>
					<h2><?php esc_html_e( 'Projects and Contributions', 'group-portfolio' ); ?></h2>
				</div>
				<div class="member-projects">
					<?php foreach ( $gp_projects as $gp_project ) : ?>
						<?php
						if ( empty( $gp_project['title'] ) ) {
							continue;
						}
						$gp_tech = isset( $gp_project['tech'] ) && is_array( $gp_project['tech'] ) ? $gp_project['tech'] : array();
						?>
						<article class="member-project reveal">
							<h3><?php echo esc_html( $gp_project['title'] ); ?></h3>
							<?php if ( ! empty( $gp_project['role'] ) ) : ?>
								<p class="role"><?php echo esc_html( $gp_project['role'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $gp_project['text'] ) ) : ?>
								<p><?php echo esc_html( $gp_project['text'] ); ?></p>
							<?php endif; ?>
							<?php if ( $gp_tech ) : ?>
								<ul class="chips">
									<?php foreach ( $gp_tech as $gp_tech_item ) : ?>
										<?php if ( '' === trim( (string) $gp_tech_item ) ) { continue; } ?>
										<li><?php echo esc_html( $gp_tech_item ); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $gp_education ) : ?>
		<section id="education" class="section">
			<div class="container">
				<div class="section-head reveal">
					<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( 'Education', 'group-portfolio' ); ?></p>
					<h2><?php esc_html_e( 'Education', 'group-portfolio' ); ?></h2>
				</div>
				<div class="member-records">
					<?php foreach ( $gp_education as $gp_entry ) : ?>
						<?php if ( empty( $gp_entry['title'] ) && empty( $gp_entry['text'] ) ) { continue; } ?>
						<article class="member-record reveal">
							<?php if ( ! empty( $gp_entry['title'] ) ) : ?>
								<h3><?php echo esc_html( $gp_entry['title'] ); ?></h3>
							<?php endif; ?>
							<?php if ( ! empty( $gp_entry['meta'] ) ) : ?>
								<p class="role"><?php echo esc_html( $gp_entry['meta'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $gp_entry['text'] ) ) : ?>
								<p><?php echo esc_html( $gp_entry['text'] ); ?></p>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $gp_achievements ) : ?>
		<section id="achievements" class="section section-alt">
			<div class="container">
				<div class="section-head reveal">
					<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( 'Achievements', 'group-portfolio' ); ?></p>
					<h2><?php esc_html_e( 'Achievements', 'group-portfolio' ); ?></h2>
				</div>
				<div class="member-records">
					<?php foreach ( $gp_achievements as $gp_entry ) : ?>
						<?php if ( empty( $gp_entry['title'] ) && empty( $gp_entry['text'] ) ) { continue; } ?>
						<article class="member-record reveal">
							<?php if ( ! empty( $gp_entry['title'] ) ) : ?>
								<h3><?php echo esc_html( $gp_entry['title'] ); ?></h3>
							<?php endif; ?>
							<?php if ( ! empty( $gp_entry['meta'] ) ) : ?>
								<p class="role"><?php echo esc_html( $gp_entry['meta'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $gp_entry['text'] ) ) : ?>
								<p><?php echo esc_html( $gp_entry['text'] ); ?></p>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="section section-alt">
		<div class="container">
			<div class="section-head reveal">
				<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( 'The group', 'group-portfolio' ); ?></p>
				<h2><?php esc_html_e( 'Other members', 'group-portfolio' ); ?></h2>
			</div>
			<div class="team-grid member-others">
				<?php foreach ( $gp_others as $gp_other ) : ?>
					<?php
					if ( empty( $gp_other['name'] ) || gp_member_slug( $gp_other ) === $gp_current ) {
						continue;
					}
					$gp_other_photo = gp_image_uri( 'members', isset( $gp_other['photo'] ) ? $gp_other['photo'] : '' );
					$gp_other_tone  = gp_member_tone( isset( $gp_other['tone'] ) ? $gp_other['tone'] : 'blue' );
					?>
					<a class="member-mini reveal" href="<?php echo esc_url( gp_member_url( $gp_other ) ); ?>">
						<span class="member-mini-photo tone-<?php echo esc_attr( $gp_other_tone ); ?><?php echo $gp_other_photo ? ' has-photo' : ''; ?>">
							<?php if ( $gp_other_photo ) : ?>
								<img src="<?php echo esc_url( $gp_other_photo ); ?>" alt="" loading="lazy" decoding="async">
							<?php else : ?>
								<span class="monogram"><?php echo esc_html( gp_initials( $gp_other['name'] ) ); ?></span>
							<?php endif; ?>
						</span>
						<span class="member-mini-copy">
							<strong><?php echo esc_html( $gp_other['name'] ); ?></strong>
							<?php if ( ! empty( $gp_other['role'] ) ) : ?>
								<span><?php echo esc_html( $gp_other['role'] ); ?></span>
							<?php endif; ?>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="contact" class="section">
		<div class="container">
			<div class="section-head reveal">
				<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( 'Contact', 'group-portfolio' ); ?></p>
				<h2><?php esc_html_e( 'Get in Touch', 'group-portfolio' ); ?></h2>
				<p class="lead"><?php echo esc_html( sprintf( __( 'Send a message to %s, or reach the group from the landing page.', 'group-portfolio' ), $gp_member['name'] ) ); ?></p>
			</div>
			<?php if ( is_email( $gp_email ) ) : ?>
				<a class="contact-email" href="<?php echo esc_url( 'mailto:' . $gp_email ); ?>"><?php echo esc_html( $gp_email ); ?></a>
			<?php endif; ?>
			<?php if ( $gp_links ) : ?>
				<ul class="member-socials">
					<?php foreach ( $gp_links as $gp_link ) : ?>
						<?php
						if ( empty( $gp_link['url'] ) || empty( $gp_link['label'] ) ) {
							continue;
						}
						$gp_external = 0 === strpos( $gp_link['url'], 'http' );
						?>
						<li>
							<a href="<?php echo esc_url( $gp_link['url'] ); ?>"<?php echo $gp_external ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
								<?php echo gp_icon( isset( $gp_link['icon'] ) ? (string) $gp_link['icon'] : '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
								<?php echo esc_html( $gp_link['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
