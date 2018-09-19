<?php
/**
 * The template for displaying Contact Us
 * Template Name: Contact
 * @package CLT_Theme
 */

get_header(); ?>

<section class="contact-us container">
    <div class="banner-container">
    <div class="entry-header">
            <h2 class="entry-title"><?php the_title(); ?></h2>
        </div><!-- .entry-header -->
         <section class="upper-content">
            <div class="contact-info">
                <!-- custom fields only print if they're not empty -->
				<?php
				$phone   = CFS()->get( 'contact_number' );
				$email   = CFS()->get( 'email' );
				$address = CFS()->get( 'location' );
 				if ( ! empty( $phone ) ) {
					echo '<p class="contact-number"><i class="fas fa-phone fa-rotate-180"></i> ' . $phone . '</p>';
				}
 				if ( ! empty( $email ) ) {
					echo '<p class="email-address"><i class="fas fa-envelope"></i><a href="' . $email['url'] . '">' . $email['text'] . '</a></p>';
				}
 				if ( ! empty( $address ) ) {
					echo '<p class="address"><i class="fas fa-map-marker-alt"></i> ' . $address . '</p>';
				}
				?>
            </div>
            <div class="map-container">
                <iframe class='map-canvas' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2603.3414459373917!2d-123.07200428431096!3d49.26992697932999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5486714742e982d1%3A0x37a9dd95a9230540!2s1651+Commercial+Dr%2C+Vancouver%2C+BC+V5L+3Y3!5e0!3m2!1sen!2sca!4v1537329033399" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </section>
    </div> <!-- end of banner container -->
    <div class="offset-container">
        <div class="contact-container">
            <a id="contact-container"></a>
			<?php gravity_form( 1, true, true, false, null, false, null, true ); ?>
        </div><!-- .contact-container -->

        <div class="featured-person">
            <div class="featured-person-photo">
                <img src="<?php echo esc_html( CFS()->get( 'photo' ) ); ?>"/>
            </div>
            <div class="featured-person-content">
                <a href="<?php echo $email['url']; ?>">
                    <h2 class="featured-person-name"><?php echo esc_html( CFS()->get( 'name' ) ); ?></h2></a>
                <p class="featured-person-title"><?php echo esc_html( CFS()->get( 'title' ) ); ?></p>
                <p><?php echo esc_html( CFS()->get( 'description' ) ); ?></p>
            </div>
        </div> <!-- end of featured-person -->

    </div> <!-- end of offset -->
</section><!-- #primary -->

<?php get_footer(); ?>

