<?php
/**
 * Template Name: Browse Displays
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<!--<h1 class="customPageTitle">Browse the Museum</h1>-->
			<?php while ( have_posts() ) : the_post(); ?>
						
							<?php

							// check if the flexible content field has rows of data
							if( have_rows('browse_layouts') ):
							
							 	// loop through the rows of data
							    while ( have_rows('browse_layouts') ) : the_row();
							
									// check current row layout
							        if( get_row_layout() == 'wing' ): ?>
										<div class="wingGroup">
										<h2><?php the_sub_field('wing_name') ?></h2>
										
							        	<?php // check if the nested repeater field has rows of data
							        	if( have_rows('galleries') ):
							
										 	echo '<div class="galleryGroup">';
							
										 	// loop through the rows of data
										    while ( have_rows('galleries') ) : the_row(); ?>
												<h3><?php the_sub_field('gallery_title'); ?></h3>
												<?php 
													$terms = get_sub_field('gallery_category');
													
													 ?>
													<?php foreach( $terms as $term ): ?>
													
													<?php $args = array(
														'post_type'       => 'display',
														/** Category slug, needs to be dynamic from widget selection **/
														'tax_query' => array(
															array(
																'taxonomy' => 'gallery-wing',
																'field' => 'id',
																'terms' => $term
															)
														)
													); 
													
													$Apps = new WP_Query( $args );
											        if( $Apps -> have_posts() ) {
											          while( $Apps -> have_posts() ) {
											            $Apps -> the_post();
											            //$postid = get_the_ID();
											            ?>
											              <a href="<?php the_permalink(); ?>" class="linkstyle2"><?php the_title() ?></a>
											              
											                <?php //the_excerpt() ?>
											                
											              
											            <?php
											          }
											          wp_reset_query();
											        }
													
													?>


												<?php endforeach; ?>
							
												<?php 
							
											endwhile;
							
											echo '</div>';
							
										endif; ?>
										</div>
							        <?php endif;
									
							
							    endwhile;
							
							else :
							
							    // no layouts found
							
							endif;
							
							?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
