<?php
/**
 * Template Name: Browse Displays
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php //while ( have_posts() ) : the_post(); ?>

				<?php $custom_terms = get_terms('gallery-wing');

						foreach($custom_terms as $custom_term) {
						    wp_reset_query();
						    $args = array('post_type' => 'display',
						        'tax_query' => array(
						            array(
						                'taxonomy' => 'gallery-wing',
						                'field' => 'slug',
						                'terms' => $custom_term->slug,
						            ),
						        ),
						     );
						
						     $loop = new WP_Query($args);
						     if($loop->have_posts()) {
						        echo '<h2>'.$custom_term->name.'</h2>';
						
						        while($loop->have_posts()) : $loop->the_post();
						            echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
						        endwhile;
						     }
						} ?>

				

			<?php //endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
