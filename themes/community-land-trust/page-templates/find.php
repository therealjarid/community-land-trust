<?php

/* Template Name: Find a Home */

get_header(); ?>

    <section class="find-page-container">

		<?php the_post_thumbnail(); ?>

        <div class="find-header-container">
			<h1><?php the_title(); ?></h1>
		</div>

		<?php echo get_post_field( 'post_content', $post->ID ) ?>

        <div class="map-and-buttons">

            <div id="map-canvas"></div>

            <ul class="locations-menu">
				<?php
				$terms = get_terms( array(
					'taxonomy' => 'Portfolio Location',
					'orderby'  => 'id'
				) );
				foreach ( $terms as $term ) {
					$term_link = get_term_link( $term );
					// If there was an error, continue to the next term.
					if ( is_wp_error( $term_link ) ) {
						continue;
					}
					echo '<li><button class="fetch-property" data-id="' . $term->term_id . '" >' . $term->name . '</button></li>';
					echo ' ';
				} ?>
            </ul>

            <p class="error-message">Please refresh the page and try again.</p>

        </div>

        <div class="find-form-container">

			<?php
			echo '<h2>' . CFS()->get( 'sign_up_cta' ) . '</h2>';
			echo '<p>' . CFS()->get( 'sign_up_copy' ) . '</p>';
			?>

            <div class="find-form">
            </div>

            <button class="cta-button">Next</button>

        </div>

        <div class="more-info">
            <h2>Need More Info<span class="contraction">rmation</span>?</h2>
            <a href="<?php echo get_permalink( get_page_by_title( 'Contact Us' ) ) ?>">
                <button class="cta-button">Contact Us</button>
            </a>
        </div>

    </section>

<?php get_footer(); ?>