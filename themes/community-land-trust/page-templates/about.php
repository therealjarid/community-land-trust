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

            <img class="logo" src="<?php echo CFS()->get( 'about_us_logo' ); ?>"></img>

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

    <div class="about-page-highlights">

			<?php $about_us_fields = CFS()->get( 'about_us_loop' ); ?>


			<?php foreach ( $about_us_fields as $about_us_field ) {
            echo "<h3 class='about-cfs-years'>" . $about_us_field['about_us_years'] . "</h3>";
            echo "<p class='about-cfs-description'>" . $about_us_field['about_us_description'] . "</p>";
            echo "<p class='about-cfs-extra-description'>" . $about_us_field['about_us_extra_description'] . "</p>";
			}
			?>
    </div>

	<?php endwhile; // End of the loop. ?>

</section><!-- .about-us -->


<?php get_footer(); ?>