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
	    <?php echo CFS()->get( 'contact_number' ); ?>
        </p>
        <p class="email-address">
        <i class="fas fa-envelope"></i>
		<?php echo CFS()->get( 'email' ); ?>
        </p>
    </div>
    <div class="address">
    <a href="https://www.google.ca/maps?q=1651+commercial+drive&rlz=1C5CHFA_enJP803JP803&um=1&ie=UTF-8&sa=X&ved=0ahUKEwiB2ca5h7TdAhWprlQKHZVOC6QQ_AUICigB"
    target="_blank"><img class="footer-image" src="<?php echo CFS()->get( 'footer_map_image' );?>"/>
    <p><?php echo CFS()->get( 'location' );?></p>
    </div>
    <div class="social-media">
    <?php echo CFS()->get( 'facebook' );?>
    <?php echo CFS()->get( 'twitter' );?>
    <?php echo CFS()->get( 'linkedin' );?>



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
