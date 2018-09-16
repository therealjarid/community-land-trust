<?php
/**
 * The template for displaying partners page.
 * Template Name: Partners
 *
 * @package CLT_Theme
 */

get_header(); ?>
    <div class="partners-page-container">

        <?php while ( have_posts() ) : the_post(); ?>
        
          <div class="partner-page-content">

              <?php the_content(); ?>

          </div><!-- .partner-page-content -->

        <?php endwhile; ?>
        
        <div class="flickity-container">
            <div class="main-carousel">

              <?php

                $query = new WP_Query( array( 'post_type' => 'Partner',
                                    ) );      

                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post();?>

                    <div class="carousel-cell">
                      <div class="partner-info">
                            <?php the_post_thumbnail();
                              the_content();?> 
                      </div>     
                      <div class="partner-meta">
                        <p><?php echo esc_html( CFS()->get( 'partner_info', false ) ); ?></p>
                        <p><?php echo esc_html( CFS()->get( 'partner_completion', false ) ); ?></p>
                      </div>

                    </div>
                  <?php endwhile;
                endif ?>
                
            </div>
        </div>

        <div class="contact-container">

          <p><?php echo esc_html( CFS()->get( 'contact_copy', 175 ) ); ?></p>
          <p><?php 
            // 175 is the post id for the Partners page
            echo 'Connect with us to learn how! Contact CLT’s ' . esc_html( CFS()->get( 'partners_contact_position', 175 ) ) . ', ';
            echo esc_html( CFS()->get( 'partners_contact_name', 175 ) ) . ', at ';
            echo '<a href="mailto:' . esc_html( CFS()->get( 'partners_contact_email', 175 ) ) . '" >';
            echo esc_html( CFS()->get( 'partners_contact_email', 175 ) );
            echo '</a></p></div>';
          ?>

  </div>

<?php get_footer(); ?>