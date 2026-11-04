<?php
/**
 * About section.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_about   = gp_content_get( 'about', array() );
$gp_about   = is_array( $gp_about ) ? $gp_about : array();
$gp_pillars = gp_content_get( 'pillars', array() );
$gp_pillars = is_array( $gp_pillars ) ? $gp_pillars : array();
$gp_members = gp_content_get( 'members', array() );
$gp_count   = is_array( $gp_members ) ? count( $gp_members ) : 0;
?>
<section id="about" class="section">
	<div class="container about-grid">
		<div class="reveal">
			<?php if ( ! empty( $gp_about['label'] ) ) : ?>
				<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php echo esc_html( $gp_about['label'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $gp_about['title'] ) ) : ?>
				<h2><?php echo esc_html( $gp_about['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $gp_about['text'] ) ) : ?>
				<p class="lead"><?php echo esc_html( $gp_about['text'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $gp_about['link'] ) ) : ?>
				<a class="text-link" href="<?php echo esc_url( gp_section_url( isset( $gp_about['hash'] ) ? $gp_about['hash'] : 'team' ) ); ?>">
					<?php echo esc_html( $gp_about['link'] ); ?>
					<?php echo gp_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
				</a>
			<?php endif; ?>
		</div>

		<div class="about-panel reveal">
			<div class="about-panel-head">
				<span><?php esc_html_e( 'The group', 'group-portfolio' ); ?></span>
				<strong><?php echo esc_html( str_pad( (string) $gp_count, 2, '0', STR_PAD_LEFT ) ); ?></strong>
			</div>
			<ul class="pillars">
				<?php foreach ( $gp_pillars as $gp_pillar ) : ?>
					<li>
						<?php if ( ! empty( $gp_pillar['number'] ) ) : ?>
							<span><?php echo esc_html( $gp_pillar['number'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $gp_pillar['title'] ) ) : ?>
							<h3><?php echo esc_html( $gp_pillar['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( ! empty( $gp_pillar['text'] ) ) : ?>
							<p><?php echo esc_html( $gp_pillar['text'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
