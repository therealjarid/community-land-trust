<?php
/**
 * The template for displaying all single posts.
 * Template Name: Single Media
 * @package CLT_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">

		<div class="media-container">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php endif; ?>
				<div class="title-date">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php clt_posted_on(); ?>
				</div>
					</header><!-- .entry-header -->

					<div class="single-content-container">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // End of the loop. ?>
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
					'after'  => '</div>',
				) );
				?>
					</div><!-- end single-content-container -->
			</article><!-- #post-## -->

			<div class="social-links">
				<p class="share">Share:<a href="<?php echo $fblink['url']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a><a href="<?php echo $twlink['url']; ?>" target="_blank"><i class="fab fa-twitter"></i></a><a href="<?php echo $lilink['url']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></p>
					<?php $fblink = CFS()->get( 'facebook', 36 ); ?>
					<?php $twlink = CFS()->get( 'twitter', 36 ); ?>
					<?php $lilink = CFS()->get( 'linkedin', 36 ); ?>
				</div><!-- end of social-links -->

			<div class="email-container">
				<div class="email">
					<p>For Media Inquiries regarding Community Land Trust, Please Contact: <?php echo CFS()->get( 'email' ); ?></p>
				</div>
			</div> <!-- end of email-container --> 
				
			</div> <!-- end of media-container --> 
			<div class="navigation-links">
				<div class="left"><?php previous_post_link( '%link', '<i class="fas fa-arrow-left"></i>' ); ?></div>
				<div class="middle"><a href="<?php echo get_permalink( get_page_by_title( 'Portfolio' ) ) ?>">Portfolio</a></div>
				<div class="right"><?php next_post_link( '%link', '<i class="fas fa-arrow-right"></i>' ); ?></div>
			</div><!-- end of navigation-links -->
			
		</div><!-- #primary -->
		
		
		<?php get_footer(); ?>

