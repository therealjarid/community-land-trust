
<?php
/**
 * The template for displaying single portfolio page. 
 *
 * @package CLT_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

          
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large' ); ?>
          <?php endif; ?>

          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

          <div class="entry-meta">
            <?php clt_posted_on(); ?> / <?php clt_comment_count(); ?> / <?php clt_posted_by(); ?>
          </div><!-- .entry-meta -->
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

        <footer class="entry-footer">
          <?php clt_entry_footer(); ?>
        </footer><!-- .entry-footer -->
      </article><!-- #post-## -->

			<?php the_post_navigation(); ?>


		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>