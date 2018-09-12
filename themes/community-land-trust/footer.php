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
