<?php
/**
 * Skills section.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_skills = gp_content_get( 'skills', array() );
$gp_skills = is_array( $gp_skills ) ? $gp_skills : array();
$gp_groups = gp_content_get( 'skill_groups', array() );
$gp_groups = is_array( $gp_groups ) ? $gp_groups : array();
?>
<section id="skills" class="section">
	<div class="container">
		<div class="section-head reveal">
			<?php if ( ! empty( $gp_skills['label'] ) ) : ?>
				<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php echo esc_html( $gp_skills['label'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $gp_skills['title'] ) ) : ?>
				<h2><?php echo esc_html( $gp_skills['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $gp_skills['text'] ) ) : ?>
				<p class="lead"><?php echo esc_html( $gp_skills['text'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="skills-grid">
			<?php foreach ( $gp_groups as $gp_group ) : ?>
				<?php
				if ( empty( $gp_group['title'] ) ) {
					continue;
				}
				$gp_items = isset( $gp_group['items'] ) && is_array( $gp_group['items'] ) ? $gp_group['items'] : array();
				?>
				<article class="skill-card reveal">
					<div class="skill-icon" aria-hidden="true">
						<?php echo gp_icon( isset( $gp_group['icon'] ) ? (string) $gp_group['icon'] : '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
					</div>
					<h3><?php echo esc_html( $gp_group['title'] ); ?></h3>
					<?php if ( ! empty( $gp_group['text'] ) ) : ?>
						<p><?php echo esc_html( $gp_group['text'] ); ?></p>
					<?php endif; ?>
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
	</div>
</section>
