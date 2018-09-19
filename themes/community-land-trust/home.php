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

        <img src="<?php echo get_the_post_thumbnail_url( 34 ); ?>"/>

    </header><!-- .page-header -->

    <section class="media-background"></section>

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
	$press_args  = array( 'cat' => '2' );
	$press_posts = get_posts( $press_args ); ?>

    <div class="main-carousel">
		<?php foreach ( $press_posts as $post ) : setup_postdata( $post ); ?>

            <div class="carousel-cell">
                <a href="<?php echo get_permalink() ?>">
                    <div class="media-thumbnail-box">
						<?php
						$press_id = $post->ID;
						echo get_the_post_thumbnail( $press_id );
						?>
                    </div>

                    <div class="media-page-info">
                        <p class="media-posted-on"><?php echo clt_posted_on(); ?></p>
                        <p class="media-carousel-title">
							<?php echo $post->post_title; ?>
                        </p>
                    </div>
                </a>
            </div>
		<?php endforeach;
		wp_reset_postdata(); ?>
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
	$press_args  = array( 'cat' => '1' );
	$press_posts = get_posts( $press_args ); ?>

    <div class="main-carousel">
		<?php foreach ( $press_posts as $post ) : setup_postdata( $post ); ?>

            <div class="carousel-cell">
                <a href="<?php echo get_permalink() ?>">
                    <div class="media-thumbnail-box">
						<?php
						$press_id = $post->ID;
						echo get_the_post_thumbnail( $press_id );
						?>
                    </div>
                    <div class="media-page-info">
                        <p class="media-posted-on"><?php echo clt_posted_on(); ?></p>
                        <p class="media-carousel-title">

							<?php echo $post->post_title; ?>

                        </p>

                    </div>
                </a>
            </div>           
		<?php endforeach;
		wp_reset_postdata(); ?>
    </div>


    <div class="media-inquiries">
		<span>
			For Media Inquiries regarding
			Community Land Trust, Please Contact:
		</span>
        <a class="cfs-hyperlink"
           href="<?php echo CFS()->get( 'email', 36 )['url']; ?>"><?php echo CFS()->get( 'email', 36 )['text'] ?></a>
    </div>


</main><!-- #main -->


<?php get_footer(); ?>
