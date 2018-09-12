<?php
/**
 * The template for displaying about page.
 * Template Name: FAQ
 *
 * @package CLT_Theme
 */

 get_header(); ?>

    <div class="faq-header">

        <i class="fas fa-question-circle"></i>

        <div class="header-container">
            <h1>Frequently Asked Questions</h1>
        </div>

    </div>

    <?php
        $args = array('post_type'=>array('posts', 'faq'));
        query_posts($args);

        while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="faq_container">

            <div class="faq">

				<?php the_title( '<h2 class="faq_question">', '</h2>' ); ?>
                <img class="faq-arrow-right"
                     src="<?php echo get_template_directory_uri() ?>/assets/images/icons/arrow-right.svg">

                <div class="faq_answer_container">

					<?php the_content(); ?>

					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
						'after'  => '</div>',
					) );
					?>

                </div>

            </div>

        </div>

    </article>

<?php endwhile; ?>

    <h2 class="more-info">Need More Information?</h2>

    <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) . "#contact-container"; ?>">
        <button class="mixin-button">Contact Us</button>
    </a>

<?php get_footer(); ?>