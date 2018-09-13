
<?php
/**
 * The template for displaying single portfolio page. 
 *
 * @package CLT_Theme
 */

get_header(); ?>

	<div class="single-portfolio-container">

		<?php while ( have_posts() ) : the_post(); ?>

          
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="hero-container">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail(); ?>
          <?php endif; ?>

          <?php the_title( '<h1 class="portfolio-title">', '</h1>' ); ?>

        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php the_content(); ?>
          <?php
            wp_link_pages( array(
              'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
              'after'  => '</div>',
            ) );
            ?>
      
            
            <div class="main-carousel">

            <?php
            $portfolio_gallery = CFS()->get( 'portfolio_gallery' );

              foreach ( $portfolio_gallery as $gallery_image ) {
                
                $image = $gallery_image['portfolio_gallery_image'];
                  echo "<div class='carousel-cell'>
                        <img src='{$image}'>
                        </div>";
                }

              ?>

            </div> 

              

        </div><!-- .entry-content -->
      </article><!-- #post-## -->

			<?php the_post_navigation(); ?>


		<?php endwhile; // End of the loop. ?>

	</div><!-- #primary -->


<?php get_footer(); ?>