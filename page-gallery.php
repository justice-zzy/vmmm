<?php
/**
 * Template Name: Gallery Page
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<!--<h1 class="customPageTitle">Browse the Museum</h1>-->
			<?php while ( have_posts() ) : the_post(); ?>
						
							<?php if( have_rows('gallery_rooms') ): ?>

							
						
							<?php while( have_rows('gallery_rooms') ): the_row(); ?>
						
								<div class="galleryRoom">
									
									
									
									<?php 

									$term = get_sub_field('room_category');
									
									if( $term ) { ?>
										<?php $termobj = get_term( $term ) ?>
										<h2><?php echo $termobj->name; ?></h2>
										<p><?php echo $termobj->description; ?></p>
										
										
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
									
									<?php } ?>
						
								</div>
						
							<?php endwhile; ?>
						
							
						
						<?php endif; ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
