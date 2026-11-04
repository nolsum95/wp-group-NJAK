<?php
/**
 * Not found template.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main" class="section">
	<div class="container not-found">
		<p class="eyebrow"><span class="eyebrow-line" aria-hidden="true"></span><?php esc_html_e( '404', 'group-portfolio' ); ?></p>
		<h1><?php esc_html_e( 'This page is not on the map.', 'group-portfolio' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'The link may be outdated. The portfolio is still available from the home page.', 'group-portfolio' ); ?></p>
		<p class="hero-actions">
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'group-portfolio' ); ?></a>
		</p>
	</div>
</main>
<?php
get_footer();
