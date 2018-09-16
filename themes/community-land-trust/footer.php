<?php
/**
 * The template for displaying the footer.
 * Template Name: Footer
 * @package CLT_Theme
 */

$google_url = 'https://goo.gl/maps/CWEVh3JhZ7q';
$address = '220-1651 Commercial Dr Vancouver, BC V5L 3Y3';

$facebook_url = 'https://www.facebook.com/pages/Community-Land-Trust/144302426226897';
$twitter_url = 'https://twitter.com/CLTrust/media?lang=en';
$linkedin_url = 'https://www.linkedin.com/company/community-land-trust/';

$email = 'info@cltrust.ca';
$phone = '604-879-5111';
$phone_link = 'tel:+1' . str_replace( [ '-', ' ', '(', ')', '+1', '+' ], '', $phone);

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="main-footer">
        <div class="contact-info">
            <p class="contact-number">
                <i class="fas fa-phone"></i>
				<a href="<?php echo $phone_link ?>"><?php echo $phone; ?></a> 
            </p>
            <p class="email-address">
                <i class="fas fa-envelope"></i>
				<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            </p>
        </div>
        <div class="social-media">
            <a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="<?php echo $linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        </div>

        <div class="address">
            <a href="<?php echo $google_url ?>"
               target="_blank">
               <img class="footer-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-map.jpg"/>
            </a>
            <p><i class="fas fa-map-marker-alt"></i><?php echo $address; ?></p>
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
