<?php
/**
 * The template for displaying about page.
 * Template Name: Partners
 *
 * @package CLT_Theme
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

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

<span>Connect with us to learn how! Contact CLT’s <?php echo CFS()->get( 'partners_contact_position' ); ?></span>
<span>, <?php echo CFS()->get( 'partners_contact_name' ); ?><span>
<span>, at <?php echo CFS()->get( 'partners_contact_email' ); ?></span>


<?php get_footer(); ?>