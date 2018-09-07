<?php 

/* Template Name: Find-A-Page */

get_header(); ?>

<section class="find-page-container">

	<?php the_post_thumbnail(); ?>

	<h1><?php the_title(); ?></h1>

	<?php echo get_post_field('post_content', $post->ID) ?>

	<script type="text/javascript">
		
	</script>


	<div id="map-canvas"></div>

</section>

<?php get_footer(); ?>