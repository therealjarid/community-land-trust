<?php
/**
 * The template for displaying Contact Us
 * Template Name: Contact
 * @package CLT_Theme
 */

get_header(); ?>

<section class="contact-us">
    <div class="banner-container">
        
    <div class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </div><!-- .entry-header -->
    <div class="offset-container">
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

    <div class="contact-container">
        <a id="contact-container"></a>
		<?php gravity_form( 1, true, true, false, null, false, null, true ); ?>
    </div><!-- .contact-container -->

    <div class="featured-person">
        <div class="featured-person-photo">
            <img src="<?php echo CFS()->get( 'photo' ); ?>"/>
        </div>
        <div class="featured-person-content">
        <!-- @TODO - mailto: link should be pulled dynamically -->
            <a href="<?php echo CFS()->get( 'email' ); ?>">
                <h2 class="featured-person-name"><?php echo CFS()->get( 'name' ); ?></h2>
            </a>
            <p class="featured-person-title"><?php echo CFS()->get( 'title' ); ?></p>
            <p><?php echo CFS()->get( 'description' ); ?></p>
        </div>
    </div>
    </div>
    </div>
</section><!-- #primary -->

<?php get_footer(); ?>
