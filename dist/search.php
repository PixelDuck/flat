<?php
/**
 * Search results
 *
 * Handles search results made using the site search engine.
 *
 * @package Flat
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	return;
}

get_header();
?>
	<?php flat_hook_search_before(); ?>
	<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'flat' ), get_search_query() ); ?></h1>
	<div id="content" class="site-content" role="main">
		<?php flat_hook_search_top(); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php the_posts_pagination( array( 'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'flat' ), 'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'flat' ) ) ); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>

		<?php flat_hook_search_bottom(); ?>
	</div>
	<?php flat_hook_search_after(); ?>
<?php get_footer(); ?>