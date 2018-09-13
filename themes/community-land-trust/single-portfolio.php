
<?php
/**
 * The template for displaying single portfolio page. 
 *
 * @package CLT_Theme
 */

get_header(); ?>

	<div class="single-portfolio-container">
           
    <div class="hero-container">
      <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(); ?>
      <?php endif; ?>
      
      <div class="title-container">
        <?php the_title( '<h1 class="portfolio-title">', '</h1>' ); ?>
      </div>
      
    </div>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="entry-content">

        <?php the_content(); ?>

      </div><!-- .entry-content -->

      <div class="fields-container">

          <!-- insert custom fields here -->

      </div>


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

        <?php the_post_navigation(); ?>

    </article><!-- #post-## -->

    <div class="more-info">

      <h2>Need More Info<span class="contraction">rmation</span>?</h2>

      <button class="cta-button">
          <a href="<?php echo get_permalink( get_page_by_title( 'Contact Us' ) ) . "#contact-container" ?>">Contact
        Us</a>
      </button>

    </div>

	</div><!-- #primary -->

<?php get_footer(); ?>