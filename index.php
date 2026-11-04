<?php
/**
 * Fallback template.
 *
 * @package Group_Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="main" class="section">
	<div class="container prose">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class( 'entry-card' ); ?>>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="entry"><?php the_excerpt(); ?></div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<p class="lead"><?php esc_html_e( 'Nothing has been published here yet.', 'group-portfolio' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
