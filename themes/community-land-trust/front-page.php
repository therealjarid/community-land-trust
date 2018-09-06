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

            <button class="mixin-button">find a home</button>

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

    
    <button class="mixin-button">Contact Us</button>

    <!-- <?php 
    $fields = CFS()->get( 'item' );
    foreach ( $fields as $field ) {
    echo $field['icon'];
    }
    ?> -->

    <!-- <div class="main-carousel">

        <div class="carousel-cell">
            <h3>The Early Years</h3>   
            <p>Co-op & non-profit housing investments into the CLT</p>
        </div>

        <div class="carousel-cell">
            <h3>The Breakthrough</h3>   
            <p>City of Vancouver's first partnership with CLT</p>
        </div>

        <div class="carousel-cell">
            <h3>Solving Our Homes</h3>   
            <p>Existing co-op homes transferred to the CLT</p>
        </div>

        <div class="carousel-cell">
            <h3>Growth</h3>   
            <p>Largest single investments by municipal & community partners </p>
        </div>

        <div class="carousel-cell">
            <h3>The Future</h3>   
            <p>Over 2,800 homes and growing </p>
        </div>

    </div> -->

    <?php
		$args = array(
    	'post_type' => 'portfolio',
    	'order' => 'DSC',
		);
		$clt_portfolio_posts = get_posts($args); // returns an array of posts
	    ?>
		<?php foreach ($clt_portfolio_posts as $clt_portfolio_post): setup_postdata($post);?>

			<?php	the_post_thumbnail();?>

		</div>
        <?php endforeach;?>


    </main> <!-- end of .home-page main -->

<?php get_footer() ?>