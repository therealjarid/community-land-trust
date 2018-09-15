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
				<a href="tel:+16048795111">604-879-5111</a> 
            </p>
            <p class="email-address">
                <i class="fas fa-envelope"></i>
				<a href="mailto:info@cltrust.ca">info@cltrust.ca</a>
            </p>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com/pages/Community-Land-Trust/144302426226897" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/CLTrust/media?lang=en" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/company/community-land-trust/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        </div>

        <div class="address">
            <a href="https://www.google.ca/maps/place/1651+Commercial+Dr,+Vancouver,+BC+V5L+3Y3/@49.2699305,-123.0720043,17z/data=!3m1!4b1!4m5!3m4!1s0x5486714742e982d1:0x37a9dd95a9230540!8m2!3d49.269927!4d-123.0698156"
               target="_blank">
               <!-- @TODO: hard code image and delete comment when finished -->
               <img class="footer-image" src="/Assets/images/footer-map.jpg">
            </a>
            <p><i class="fas fa-map-marker-alt"></i>220-1651 Commercial Dr Vancouver, BC V5L 3Y3</p>
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
