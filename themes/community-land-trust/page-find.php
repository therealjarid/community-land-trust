<?php 

/* Template Name: Find a Home */

get_header(); ?>

<section class="find-page-container">

	<?php the_post_thumbnail(); ?>

	<h1><?php the_title(); ?></h1>

	<?php echo get_post_field('post_content', $post->ID) ?>

	<div id="map-canvas"></div>

	<ul>
		<?php
			$terms = get_terms( array( 'taxonomy' => 'Portfolio Location',
									   'orderby'  => 'id' ) );
			foreach ( $terms as $term ) {
				$term_link = get_term_link( $term );
				// If there was an error, continue to the next term.
				if ( is_wp_error( $term_link ) ) {
					continue;
				}
				echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
				echo ' ';
			} ?>
	</ul>
	
	<div class="gravity-form">

		<h2>Let Us Help!</h2>


	</div>

</section>

<?php get_footer(); ?>