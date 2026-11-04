<?php
/**
 * Projects section.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_projects = gp_content_get( 'projects', array() );
$gp_projects = is_array( $gp_projects ) ? $gp_projects : array();
$gp_items    = gp_content_get( 'project_items', array() );
$gp_items    = is_array( $gp_items ) ? $gp_items : array();
?>
<section id="projects" class="section section-alt">
	<div class="container">
		<div class="section-head reveal">
			<?php if ( ! empty( $gp_projects['label'] ) ) : ?>
				<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php echo esc_html( $gp_projects['label'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $gp_projects['title'] ) ) : ?>
				<h2><?php echo esc_html( $gp_projects['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $gp_projects['text'] ) ) : ?>
				<p class="lead"><?php echo esc_html( $gp_projects['text'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="project-grid">
			<?php foreach ( $gp_items as $gp_project ) : ?>
				<?php
				if ( empty( $gp_project['title'] ) ) {
					continue;
				}
				$gp_image = gp_image_uri( 'projects', isset( $gp_project['image'] ) ? $gp_project['image'] : '' );
				$gp_style = isset( $gp_project['style'] ) ? sanitize_html_class( $gp_project['style'] ) : 'interface';
				$gp_url   = ! empty( $gp_project['url'] ) ? $gp_project['url'] : '';
				$gp_href  = $gp_url ? $gp_url : gp_section_url( 'projects' );
				$gp_tech  = isset( $gp_project['tech'] ) && is_array( $gp_project['tech'] ) ? $gp_project['tech'] : array();
				$gp_new   = $gp_url && 0 === strpos( $gp_url, 'http' );
				?>
				<article class="project-card reveal">
					<div class="project-media" data-style="<?php echo esc_attr( $gp_style ); ?>">
						<?php if ( $gp_image ) : ?>
							<img src="<?php echo esc_url( $gp_image ); ?>" alt="<?php echo esc_attr( $gp_project['title'] ); ?>" loading="lazy" decoding="async">
						<?php else : ?>
							<?php echo gp_project_art( $gp_style ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme artwork. ?>
						<?php endif; ?>
					</div>
					<div class="project-body">
						<h3><?php echo esc_html( $gp_project['title'] ); ?></h3>
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
						<?php if ( ! empty( $gp_project['button'] ) ) : ?>
							<a class="text-link" href="<?php echo esc_url( $gp_href ); ?>"<?php echo $gp_new ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
								<?php echo esc_html( $gp_project['button'] ); ?>
								<?php echo gp_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static theme icon. ?>
							</a>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
