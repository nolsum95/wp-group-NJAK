<?php
/**
 * Hero.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_hero = gp_content_get( 'hero', array() );
$gp_hero = is_array( $gp_hero ) ? $gp_hero : array();
?>
<section id="home" class="hero">
	<div class="container hero-grid">
		<div class="hero-copy">
			<?php if ( ! empty( $gp_hero['label'] ) ) : ?>
				<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php echo esc_html( $gp_hero['label'] ); ?></p>
			<?php endif; ?>
			<h1>
				<?php echo esc_html( isset( $gp_hero['title_lead'] ) ? $gp_hero['title_lead'] : '' ); ?>
				<?php if ( ! empty( $gp_hero['title_accent'] ) ) : ?>
					<br><span class="text-gradient"><?php echo esc_html( $gp_hero['title_accent'] ); ?></span>
				<?php endif; ?>
			</h1>
			<?php if ( ! empty( $gp_hero['text'] ) ) : ?>
				<p class="lead"><?php echo esc_html( $gp_hero['text'] ); ?></p>
			<?php endif; ?>
			<div class="hero-actions">
				<?php if ( ! empty( $gp_hero['primary_label'] ) ) : ?>
					<a class="btn btn-primary" href="<?php echo esc_url( gp_section_url( isset( $gp_hero['primary_hash'] ) ? $gp_hero['primary_hash'] : 'projects' ) ); ?>">
						<?php echo esc_html( $gp_hero['primary_label'] ); ?>
					</a>
				<?php endif; ?>
				<?php if ( ! empty( $gp_hero['secondary_label'] ) ) : ?>
					<a class="btn btn-ghost" href="<?php echo esc_url( gp_section_url( isset( $gp_hero['secondary_hash'] ) ? $gp_hero['secondary_hash'] : 'team' ) ); ?>">
						<?php echo esc_html( $gp_hero['secondary_label'] ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>

		<div class="hero-stage" aria-hidden="true">
			<div class="stage-glow"></div>
			<div class="stage-grid"></div>
			<div class="orbit orbit-a"><span></span></div>
			<div class="orbit orbit-b"><span></span></div>
			<div class="core">
				<svg class="core-svg" viewBox="0 0 200 200">
					<line x1="100" y1="100" x2="46" y2="52"></line>
					<line x1="100" y1="100" x2="156" y2="48"></line>
					<line x1="100" y1="100" x2="42" y2="150"></line>
					<line x1="100" y1="100" x2="158" y2="154"></line>
					<circle class="node-core" cx="100" cy="100" r="8"></circle>
					<circle class="node" cx="46" cy="52" r="5"></circle>
					<circle class="node" cx="156" cy="48" r="5"></circle>
					<circle class="node" cx="42" cy="150" r="5"></circle>
					<circle class="node" cx="158" cy="154" r="5"></circle>
				</svg>
				<p><?php echo esc_html( (string) gp_content_get( 'group_name', '' ) ); ?></p>
			</div>
			<div class="float-card float-code">
				<div class="window-dots"><span></span><span></span><span></span></div>
				<p><span class="tok-k">const</span> work = team.<span class="tok-f">build</span>();</p>
			</div>
			<div class="float-card float-meta">
				<strong>04</strong>
				<span><?php esc_html_e( 'IT students', 'group-portfolio' ); ?></span>
			</div>
		</div>
	</div>
</section>
