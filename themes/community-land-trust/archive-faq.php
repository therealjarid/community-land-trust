<?php get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_title( '<h3>', '</h3>' ); ?>
		
			</article>

	<?php endwhile; ?>

<?php get_footer(); ?>