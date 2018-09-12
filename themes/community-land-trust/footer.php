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
        <i class="fas fa-phone fa-rotate-180"></i>
	    <?php echo CFS()->get( 'contact_number', 36 ); ?>
        </p>
        <p class="email-address">
        <i class="fas fa-envelope"></i>
		<?php echo CFS()->get( 'email', 36 ); ?>
        </p>
    </div>
    <div class="social-media">
    <?php echo CFS()->get( 'facebook' );?>
    <?php echo CFS()->get( 'twitter' );?>
    <?php echo CFS()->get( 'linkedin' );?>
    </div>

    <div class="address">
    <img class="footer-image" <?php echo CFS()->get( 'footer_map_image' );?>>
    <p><i class="fas fa-map-marker-alt"></i><?php echo CFS()->get( 'location' );?></p>

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
