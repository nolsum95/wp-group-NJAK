<?php
/**
 * One-page portfolio.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main">
	<?php get_template_part( 'template-parts/hero' ); ?>
	<?php get_template_part( 'template-parts/about' ); ?>
	<?php get_template_part( 'template-parts/team' ); ?>
	<?php get_template_part( 'template-parts/skills' ); ?>
	<?php get_template_part( 'template-parts/projects' ); ?>
	<?php get_template_part( 'template-parts/contact' ); ?>
</main>
<?php
get_footer();
