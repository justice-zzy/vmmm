<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package vmmm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page_home' ); ?>

				
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
		
		
		
	</div><!-- #primary -->
<div class="featureVideo">
		<div class="videoOverlay"></div>
			<video width="100%" height="100%" id="molecules" autoplay loop>
			  <source src="<?php echo get_template_directory_uri(); ?>/video/molecules.mp4" type="video/mp4">
			  <!--<source src="<?php echo get_template_directory_uri(); ?>/video/molecules.ogg" type="video/ogg">-->
			  <!--<source src="<?php echo get_template_directory_uri(); ?>/video/molecules.webm" type="video/webm">-->
			Your browser does not support the video tag.
			</video>
		</div>

<?php get_footer(); ?>
