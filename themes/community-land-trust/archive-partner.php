<?php
/**
 * The template for displaying partners page.
 * Template Name: Partners
 *
 * @package CLT_Theme
 */

get_header(); 

    while ( have_posts() ) : the_post(); ?>
    
      <div class="partner-page-content">

          <?php the_content(); 

            wp_link_pages( array(
              'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
              'after'  => '</div>',
            ) );
            ?>
      </div><!-- .partner-page-content -->

    <?php endwhile; ?>

    <div class="contact-container">

      <p><?php 
        // 175 is the post id for the Partners page
        echo 'Connect with us to learn how! Contact CLT’s ' . esc_html( CFS()->get( 'partners_contact_position', 175 ) ) . ', ';
        echo esc_html( CFS()->get( 'partners_contact_name', 175 ) ) . ', at ';
        echo '<a href="mailto:' . esc_html( CFS()->get( 'partners_contact_email', 175 ) ) . '" >';
        echo esc_html( CFS()->get( 'partners_contact_email', 175 ) );
        echo '</a></p></div>';
      ?>
    
    <div class="main-carousel">

        <!-- @TODO: enqueue flickity script, add cells into here -->

    </div>


<?php get_footer(); ?>