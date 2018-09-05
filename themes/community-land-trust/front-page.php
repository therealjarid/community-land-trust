<?php
/**
 * Template Name: Front Page
 *
 */

get_header(); ?>

    <main class="home-page">


        <!-- HEADER/HERO BANNER SECTION BEGINS -->

        <section class="hero-banner">

			<?php the_post_thumbnail(); ?>

            <div class="company-header-info">
                <h1 class="company-name">Community Land Trust</h1>
                <p class="slogan"><?php echo CFS()->get( 'slogan' ); ?></p>
            </div>

        </section> <!-- end of .hero-banner section -->

     <!-- COMPANY MISSION SECTION BEGINS -->
		<?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
					'after'  => '</div>',
				) );
				?>

      </article>

		<?php endwhile; ?>
    <!-- end of company mission section -->
    

    <?php 
    $fields = CFS()->get( 'item' );
    foreach ( $fields as $field ) {
    echo $field['icon'];
    }
  ?>


    </main> <!-- end of .home-page main -->

<?php get_footer() ?>