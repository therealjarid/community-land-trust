
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

      <div class="flex-container">

        <div class="entry-content">

          <?php while ( have_posts() ) : the_post();

              the_content();
              
          endwhile; ?>

        </div><!-- .entry-content -->

        <div class="fields-container">

            <!-- custom fields only print if they're not empty -->
            <?php 
              $year = esc_html(substr(CFS()->get( 'year_completed' ), 0, 4));
              $size = esc_html(CFS()->get( 'property_size' ));
              $location = esc_html(CFS()->get( 'location' ));
              $budget = esc_html(CFS()->get( 'budget' ));
              $partners = CFS()->get( 'partners' );
              $link = CFS()->get( 'property_link' );

              if ( !empty( $year ) ) {
                echo '<p><span class="field-title year">Year Completed:</span> ' . $year . '</p>';
              }
              
              if ( !empty( $size ) ) {
                echo '<p><span class="field-title size">Property Size:</span> ' . $size . '</p>';
              }

              if ( !empty( $location ) ) {
                echo '<p><span class="field-title location">Location:</span> ' . $location . '</p>';
              }

              if ( !empty( $budget ) ) {
                echo '<p><span class="field-title budget">Budget:</span> ' . $budget . '</p>';
              }

              // check if any partners have been entered, if they have we print field-title
              if ( !empty( $partners ) ) {

                echo '<div class="field-title-container" >';

                // if more than one term print the plural
                if (count( $partners ) > 1) {
                  $last_partner = end($partners);
                  echo '<p class="field-title partners partner">Partners:</p><p> ';
                
                  foreach ($partners as $partner) {
                      echo $partner['partner'];
                      if ($partner !== $last_partner) {
                        echo ', ';
                      }
                  }

                  echo '</p>';

                // otherwise print singular
                } else {
                  // each partner gets pushed onto an array in the database, 
                  // even if the user deletes that field, its position in the
                  // array will continue to grow,
                  // so we have to grab the last element of this array even
                  // if the length is 1
                  $partner = end( $partners );
                  echo '<p class="field-title partners partner">Partner:</p><p> ' . $partner[ 'partner' ] . '</p>';
                }

                echo '</div>';
              }   
              
              if ( !empty( $link ) ) {
                echo '<a href="' . esc_url($link[ 'url' ]) . '" class="field-title link" >';
                echo the_title('Visit ', '') . '\'s Site' ;
                echo '</a>';
              }
            ?>

        </div>
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

        <div class="navigation-links">

            <div class="left"><?php previous_post_link( '%link', '<i class="fas fa-arrow-left"></i>' ); ?></div>
            <div class="middle"><a href="<?php echo esc_url(get_permalink( get_page_by_title( 'Portfolio' ) )) ?>">Portfolio</a></div>
            <div class="right"><?php next_post_link( '%link', '<i class="fas fa-arrow-right"></i>' ); ?></div>
          
        </div>


    </article><!-- #post-## -->

    <div class="more-info">

      <h2>Need More Info<span class="contraction">rmation</span>?</h2>

      <button class="cta-button">
          <a href="<?php echo get_permalink( get_page_by_title( 'Contact Us' ) ) . "#contact-container"; ?>">Contact Us</a>
      </button>

    </div>

	</div><!-- #primary -->

<?php get_footer(); ?>