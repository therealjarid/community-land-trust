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


        <h2 class="front-page-headings">Timeline</h2>

        <!-- <?php
		$fields = CFS()->get( 'item' );
		foreach ( $fields as $field ) {
			echo $field['icon'];
		}
		?> -->

		<div class="timeline-years-box">
			<div class="year-one">
				<span>1993 - 2000</span>
			</div>
			<div class="year-two">
				<span>2012</span>
			</div>
			<div class="year-three">
				<span>2017</span>
			</div>
			<div class="year1">
				<span>2018</span>
			</div>
			<div class="year1">
				<span>2019</span>
			</div>
		</div>
		
		<div class="timeline-upper-icons">

			<div>
				<h3>The Breakthrough</h3>
				<p>City of Vancouver's first partnership with CLT</p>
			</div>

			<div>
				<h3>Growth</h3>
				<p>Largest single investments by municipal & community partners </p>
			</div>
			
		</div>
		
		<div class="timeline-lower-icons">

			<div>
				<h3>The Early Years</h3>
				<p>Co-op & non-profit housing investments into the CLT</p>
			</div>

			<div>
				<h3>Solving Our Homes</h3>
				<p>Existing co-op homes transferred to the CLT</p>
			</div>

			<div>
				<h3>The Future</h3>
				<p>Over 2,800 homes and growing </p>
			</div>

		</div>


        <h2 class="front-page-headings">Our Work</h2>


        <div class="main-carousel">
			<?php
			$portfolio_args      = array(
				'post_type' => 'portfolio',
				'order'     => 'DSC',
			);
			$clt_portfolio_posts = get_posts( $portfolio_args );

			foreach ( $clt_portfolio_posts as $clt_portfolio_post ):
				echo( get_the_post_thumbnail( $clt_portfolio_post->ID ) );

			endforeach;
			wp_reset_postdata();
			?>
        </div>

        <h2 class="front-page-headings">Our Partners</h2>

		<?php
		$arguments = array(
			'post_type' => 'partner',
			'order'     => 'DSC'
		);

		$clt_partners_thumbnails = get_posts( $arguments );

		foreach ( $clt_partners_thumbnails as $clt_partners_thumbnail ):

			echo( get_the_post_thumbnail( $clt_partners_thumbnail->ID ) );

		endforeach;
		wp_reset_postdata();
		?>


        <h2 class="front-page-headings">Need More Information?</h2>
        <button class="mixin-button">Contact Us</button>


    </main> <!-- end of .home-page main -->

<?php get_footer() ?>