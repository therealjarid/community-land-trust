<?php
/**
 * The template for displaying all single posts.
 *
 * @package CLT_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">

		<div class="media-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>
			<div class="title-date">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php clt_posted_on(); ?>
			</div>
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
        </div><!-- end single-content-container -->
		</article><!-- #post-## -->
		
		<div class="navigation-links">
			<?php previous_post_link( '%link', '&larr;' ); ?>
			<a href="<?php echo get_permalink( get_page_by_title( 'Portfolio' ) ) ?>">Portfolio</a>
			<?php next_post_link( '%link', '&rarr;' ); ?>
		</div>
		</div> <!-- end of media-container --> 

</div><!-- #primary -->


<?php get_footer(); ?>

