<?php
/**
 * The template for displaying archive pages.
 * Template Name: Media
 *
 * @package CLT_Theme
 */

get_header(); ?>

<main id="main" class="site-main" role="main">

    <header class="page-header">

				<img src="<?php echo get_the_post_thumbnail_url(34); ?>"/>

		</header><!-- .page-header -->
	
								<!-- checking all the categories and their array positions
										<?php
										$categories = get_categories();
										var_dump( $categories );
								?>-->

		<!-- "Press Releases" category title, and Loop through posts only from this category -->	
		<div class="media-heading-box">
				<h1 class="media-page-headings">
						<?php
							$categories = get_categories();
							if ( ! empty( $categories ) ) {
								echo esc_html( $categories[1]->name );
							}
						?>
				</h1>
		</div>

		<?php 
		// Never use query_posts( 'cat=2' ); 
		$press_args = array( 'cat' => '2' );
		$press_posts = get_posts( $press_args );?> 
		
		<div class="main-carousel">
			<?php foreach ( $press_posts as $post ) : setup_postdata( $post );?> 
			
				<div class="carousel-cell">
						<?php 
							$press_id = $post->ID;
							echo get_the_post_thumbnail($press_id);
						?>

						<?php echo clt_posted_on();?>
						<a href="<?php echo get_permalink() ?>">
							<?php 	echo $post->post_title; ?>
						</a>
				</div>
			<?php endforeach; wp_reset_postdata();?>
		</div> 
			

	<!-- "CLT in the News" category title, and Loop through posts only from this category -->
	<div class="media-heading-box">
			<h1 class="media-page-headings">
					<?php
						$categories = get_categories();
						if ( ! empty( $categories ) ) {
							echo esc_html( $categories[0]->name );
						}
					?>
			</h1>
	</div>

	<?php 
		$press_args = array( 'cat' => '1' );
		$press_posts = get_posts( $press_args );?>
		
		<div class="main-carousel">
		<?php foreach ( $press_posts as $post ) : setup_postdata( $post );?> 
		
			<div class="carousel-cell">
					<?php 
						$press_id = $post->ID;
						echo get_the_post_thumbnail($press_id);
					?>

					<?php echo clt_posted_on();?>
					<a href="<?php echo get_permalink() ?>">
						<?php 	echo $post->post_title; ?>
					</a>
			</div>
		<?php endforeach; wp_reset_postdata();?>
	</div> 



	<div class="media-inquiries">
		<span>
			For Media Inquiries regarding
			Community Land Trust, Please Contact:
		</span>
		<span><?php echo CFS()->get( 'email', 36 ); ?></span>
</div>


</main><!-- #main -->



<?php get_footer(); ?>
