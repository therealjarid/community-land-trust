<?php
/**
 * The template for displaying partners page.
 * Template Name: Partners
 *
 * @package CLT_Theme
 */

get_header(); ?>

    <!-- fetching content from page Partners from the backend -->
      <?php
            // query for the partners page
            $your_query = new WP_Query( 'pagename=partners' );
            while ( $your_query->have_posts() ) : $your_query->the_post();
              the_content();
            endwhile;
            wp_reset_postdata();
            ?>

      <?php
          while ( have_posts() ) : the_post(); ?>

            <?php the_post_thumbnail(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                  <img class="logo" src="<?php echo CFS()->get( 'about_page_clt_logo' ); ?>"></img>

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


    <span>Connect with us to learn how! Contact CLT’s
		  <?php echo CFS()->get( 'partners_contact_position', 175 ); ?></span>
    <span>,
      <?php
      // 175 is the post id for the Partners page
      echo CFS()->get( 'partners_contact_name', 175 ); ?><span>
    <span>, at <?php echo CFS()->get( 'partners_contact_email', 175 ); ?></span>


<?php get_footer(); ?>