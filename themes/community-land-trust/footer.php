<?php
/**
 * The template for displaying the footer.
 *
 * @package CLT_Theme
 */

?>

			</div><!-- #content -->
			<footer id="colophon" class="site-footer container" role="contentinfo">
				<div class="light-footer">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : ?>
				<?php endif;?>
				</div>
				<div class="dark-footer">
				<div class="copyright">
				<?php $current_year = date("Y");
				echo ('Copyright ' . '&copy; ' . $current_year . ' ' . 'Community Land Trust' );?>
				</div>
				</div>
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
