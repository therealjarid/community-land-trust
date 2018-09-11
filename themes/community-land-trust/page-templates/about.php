
<?php
/**
 * The template for displaying about page.
 * Template Name: About
 * 
 * @package CLT_Theme
 */

get_header(); ?>

<section class="about-us">

    <?php the_post_thumbnail(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      
          <div class="entry-content">
              <?php the_content(); ?>
              <?php
                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
                  'after'  => '</div>',
                ) );
              ?>
           </div><!-- .entry-content -->
    </article><!-- #post-## -->

	<?php endwhile; // End of the loop. ?>

</section><!-- .about-us -->


<?php get_footer(); ?>