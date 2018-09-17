<?php
/**
 * The template for displaying all single posts.
 * Template Name: Single Media
 * @package CLT_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">

    <div class="media-container">
            <div class="entry-header">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php endif; ?>
                <div class="title-date">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php clt_posted_on(); ?>
                </div>
			</div><!-- .entry-header -->

            <div class="single-content-container">
				<?php while ( have_posts() ) : the_post();
					the_content(); 
				?>
                    <div class="social-links">
                        <p class="share">Share:</p>

						<!-- html to call share links from social-share.js -->
                        <ul class="media-share"> 

							<!-- facebook share -->                           
							<li class="facebook">
								<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" target="_blank" >
									<i class="fab fa-facebook-f"></i>
								</a>
                            </li>

                            <!-- twitter share -->
                            <li class="twitter">
								<a href="http://twitter.com/intent/tweet?text=Currently reading from @<?php echo esc_html( CFS()->get( 'twitter_user' ) );?>: '<?php the_title(); ?>'&amp;url=<?php the_permalink(); ?>&amp;hashtags=<?php echo esc_html( CFS()->get( 'twitter_hashtag' ) ); ?>" title="Click to share this post on Twitter" target="_blank" >
									<i class="fab fa-twitter"></i>
								</a>
							</li>
                            
                            <!-- linkedin share -->
                            
							<li class="linkedin">
								<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_blank" >
									<i class="fab fa-linkedin-in"></i>
								</a>
                            </li>

                        </ul>
					</div><!-- end of social-links -->
					
				<?php endwhile; // End of the loop. ?>
				
            </div><!-- end single-content-container -->


        <!-- custom field only print if there is a value inputted -->

        <div class="email-container">
            <div class="email">
                <p>For Media Inquiries regarding Community Land Trust, Please
                    Contact: <?php echo esc_html( CFS()->get( 'email' )); ?></p>
            </div>
        </div> <!-- end of email-container -->

    </div> <!-- end of media-container -->
    <div class="navigation-links">
        <div class="left"><?php previous_post_link( '%link', '<i class="fas fa-arrow-left"></i>' ); ?></div>
        <div class="middle"><a href="<?php echo get_permalink( get_page_by_title( 'Media' ) ) ?>"><span class="break">Back to </span>Media</a>
        </div>
        <div class="right"><?php next_post_link( '%link', '<i class="fas fa-arrow-right"></i>' ); ?></div>
    </div><!-- end of navigation-links -->

</div><!-- #primary -->


<?php get_footer(); ?>

