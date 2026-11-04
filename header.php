<?php
/**
 * Site header and primary navigation.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gp_nav  = gp_content_get( 'nav', array() );
$gp_nav  = is_array( $gp_nav ) ? $gp_nav : array();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site">
	<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'group-portfolio' ); ?></a>
	<header class="site-header" data-header>
		<div class="container header-inner">
			<?php gp_the_logo(); ?>

			<button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="site-nav">
				<span class="sr-only" data-nav-label><?php esc_html_e( 'Open menu', 'group-portfolio' ); ?></span>
				<span class="nav-toggle-bars" aria-hidden="true"><span></span><span></span><span></span></span>
			</button>

			<nav id="site-nav" class="site-nav" data-nav aria-label="<?php esc_attr_e( 'Primary', 'group-portfolio' ); ?>">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'nav-list',
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
					?>
				<?php else : ?>
					<ul class="nav-list">
						<?php foreach ( $gp_nav as $gp_item ) : ?>
							<?php
							if ( empty( $gp_item['label'] ) || empty( $gp_item['hash'] ) ) {
								continue;
							}
							$gp_item_class = ! empty( $gp_item['cta'] ) ? 'nav-cta' : '';
							?>
							<li class="<?php echo esc_attr( $gp_item_class ); ?>">
								<a href="<?php echo esc_url( gp_section_url( $gp_item['hash'] ) ); ?>"><?php echo esc_html( $gp_item['label'] ); ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</nav>
		</div>
		<span class="scroll-progress" data-progress></span>
	</header>
