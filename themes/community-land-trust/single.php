<?php
/**
 * The template for displaying all single posts.
 *
 * @package CLT_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <div class="single-content-container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; // End of the loop. ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
			?>
        </div><!-- end partner-container -->
    </article><!-- #post-## -->
    <div class="navigation-links">
		<?php previous_post_link( '&laquo; %link', 'Previous Property', true ); ?>
		<?php next_post_link( '%link &raquo;', 'Next Property', true ); ?>
    </div>


</div><!-- #primary -->


<?php get_footer(); ?>

