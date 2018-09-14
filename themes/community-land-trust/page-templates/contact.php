<?php
/**
 * The template for displaying Contact Us
 * Template Name: Contact
 * @package CLT_Theme
 */

get_header(); ?>

<div class="contact-us">
    <div id="primary" class="content-area">


        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </div><!-- .entry-header -->
        
            <section class="upper-content">
                <div class="contact-info">
                    <p class="contact-number">
                        <i class="fas fa-phone fa-rotate-180"></i>
						<?php echo CFS()->get( 'contact_number' ); ?>
                    </p>
                    <p class="email-address">
                        <i class="fas fa-envelope"></i>
						<?php echo CFS()->get( 'email' ); ?>
                    </p>
                    <p class="address">
                        <i class="fas fa-map-marker-alt"></i>
						<?php echo CFS()->get( 'location' ); ?>
                    </p>
                </div>
                <div class="map-container">
                    <div id="map-canvas"></div>
                </div>
            </section>
        </article><!-- #post-## -->

    </div>

    <div class="contact-container">
        <a id="contact-container"></a>

		<?php while ( have_posts() ) :
			the_post(); ?>

			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
			?>

		<?php endwhile; // End of the loop. ?>

    </div><!-- .contact-container -->

    <div class="featured-person">
        <div class="featured-person-photo">
            <img src="<?php echo CFS()->get( 'photo' ); ?>"/>
        </div>
        <div class="featured-person-content">
            <a href="mailto:info@cltrust.ca">
                <h2 class="featured-person-name"><?php echo CFS()->get( 'name' ); ?></h2>
            </a>
            <p class="featured-person-title"><?php echo CFS()->get( 'title' ); ?></p>
            <p><?php echo CFS()->get( 'description' ); ?></p>
        </div>
    </div>

</div><!-- #primary -->

<?php get_footer(); ?>
