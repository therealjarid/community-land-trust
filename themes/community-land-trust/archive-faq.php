<?php get_header(); ?>

<div class="faq-header">

	<h1>Frequently Asked Questions</h1>

</div>

<?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_title( '<h2>', '</h2>' ); ?>

      <div class="faq-answers">
				
					<?php the_content(); ?>

					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
						'after'  => '</div>',
					) );
					?>

      </div><!-- end of .faq-answers -->

  </article>

<?php endwhile; ?>

<?php get_footer(); ?>