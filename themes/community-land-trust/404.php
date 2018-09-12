<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CLT_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="container">
					<div class="text-wrap">
				<header class="page-header">
					<h1 class="page-title"><?php echo esc_html( '404' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php echo esc_html( "We're not sure what you're looking for, but we'll get you home safely!" ); ?></p>
				</div><!-- .page-content -->
				<a href="<?php echo get_home_url(); ?>">
            <button class="mixin-button-404">Back Home</button>
				</a>
				</div>
				</div><!-- .container -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
