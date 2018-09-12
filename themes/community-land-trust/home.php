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

				<?php the_post_thumbnail(); ?>

    </header><!-- .page-header -->

								<!-- checking all the categories and their array positions
										<?php
										$categories = get_categories();
										var_dump( $categories );
								?>-->

    <!-- "Press Releases" category title, and Loop through posts only from this category -->
		<?php
			$categories = get_categories();
			if ( ! empty( $categories ) ) {
				echo esc_html( $categories[1]->name );
			}
		?>

		<?php query_posts( 'cat=2' ); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>


			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
				<?php clt_posted_on(); ?>
					</div><!-- .entry-meta -->
			<?php endif; ?>

		<?php endwhile; endif; ?>

  <!-- "CLT in the News" category title, and Loop through posts only from this category -->
		<?php
			$categories = get_categories();
			if ( ! empty( $categories ) ) {
				echo esc_html( $categories[0]->name );
			}
		?>

		<?php query_posts( 'cat=1' ); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>


			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
				<?php clt_posted_on(); ?>
					</div><!-- .entry-meta -->
			<?php endif; ?>

		<?php endwhile; endif; ?>

		<span>
			For Media Inquiries regarding
			Community Land Trust, Please Contact:
		</span>
		<span><?php echo CFS()->get( 'email', 36 ); ?></span>


</main><!-- #main -->



<?php get_footer(); ?>
