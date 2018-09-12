<?php
/**
 * The template for displaying the footer.
 * Template Name: Footer
 * @package CLT_Theme
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="main-footer">
    <div class="contact-info">
        <p class="contact-number">
        <i class="fas fa-phone"></i>
	    <?php echo CFS()->get( 'contact_number', 36 ); ?>
        </p>
        <p class="email-address">
        <i class="fas fa-envelope"></i>
		<?php echo CFS()->get( 'email', 36 ); ?>
        </p>
    </div>
    <div class="social-media">
    <?php $fblink = CFS()->get( 'facebook', 36 ) ;?>
    <?php $twlink = CFS()->get( 'twitter', 36 ) ;?>
    <?php $lilink = CFS()->get( 'linkedin', 36 ) ;?>
    <a href="<?php echo $fblink['url'];?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
    <a href="<?php echo $twlink['url'];?>" target="_blank"><i class="fab fa-twitter"></i></a>
    <a href="<?php echo $lilink['url'];?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    </div>

    <div class="address">
    <a href="https://www.google.ca/maps/place/1651+Commercial+Dr,+Vancouver,+BC+V5L+3Y3/@49.2699305,-123.0720043,17z/data=!3m1!4b1!4m5!3m4!1s0x5486714742e982d1:0x37a9dd95a9230540!8m2!3d49.269927!4d-123.0698156" target="_blank"><img class="footer-image" src="<?php echo CFS()->get( 'footer_map_image', 36 );?>"></a>
    <p><i class="fas fa-map-marker-alt"></i><?php echo CFS()->get( 'location', 36 );?></p>
    </div>
    </div>
    <div class="sub-footer">
        <div class="copyright">
			<?php $current_year = date( "Y" );
			echo( 'Copyright ' . '&copy; ' . $current_year . ' ' . 'Community Land Trust' ); ?>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
