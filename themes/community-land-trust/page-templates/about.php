<?php
/**
 * The template for displaying about page.
 * Template Name: About
 *
 * @package CLT_Theme
 */

get_header(); ?>

<section class="about-us">

	<div class="about-header">
			<?php the_post_thumbnail(); ?>
	</div>

	<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="about-page-box">

						<div class="about-clt-logo">
								<img src="<?php echo CFS()->get( 'about_page_clt_logo' ); ?>"></img>
						</div>

						<?php the_content(); ?>

					</div>

      </article><!-- #post-## -->

	<?php endwhile; // End of the loop. ?>

	<div class="main-carousel">

		<?php $about_us_fields = CFS()->get( 'about_our_history_highlights' ); ?>

			<?php foreach ( $about_us_fields as $about_us_field ) : ?>
				
				<div class="carousel-cell">

						<h3 class='about-cfs-years'> 
							<?php echo $about_us_field['about_page_history_year']; ?> 
						</h3>

						<p class='about-cfs-description'>
							<?php echo $about_us_field['about_page_history_description']; ?>
						</p>

						<p class='about-cfs-extra-description'> 
							<?php echo $about_us_field['about_page_history_extra_description']; ?>
						</p>

				</div>	

			<?php
      	endforeach;
      ?>
			
		</div>

    <div class="button-container">
         <h2 class="more-info">Need More Information?</h2>

        <button class="mixin-button">
            <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) . "#contact-container"; ?>">
                Contact Us
            </a>
        </button>
    </div>
		

</section><!-- .about-us -->


<?php get_footer(); ?>