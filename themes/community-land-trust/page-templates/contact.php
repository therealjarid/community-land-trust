<?php
/**
 * The template for displaying Contact Us 
 * Template Name: Contact
 * @package CLT_Theme
 */

get_header(); ?>
<section class="contact-us">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</section>


<?php get_footer(); ?>
