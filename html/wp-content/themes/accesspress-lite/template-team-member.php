<?php
/**
 * Template Name: Team Member
 * Description: A page template for the menu items, full width an no sidebar
 */
get_header(); ?>

    <div class="container" >
		<?php if (post_type_exists('team_member')) : ?>
          
          	<?php
			$taxonomy = 'team_member_category';
			$tax_terms = get_terms($taxonomy);
			?>

			<?php foreach ($tax_terms as $tax_term) : ?>
				<div class="row">
					<div class="col-xs-12">
						<div style="font-size: 30px; font-weight: bold;"><?php  echo  $tax_term->name  ?> </div>
					</div>
				</div>


				<?php
					if ( get_query_var('paged') ) {
	                        $paged = get_query_var('paged');
	                } elseif ( get_query_var('page') ) {
	                        $paged = get_query_var('page');
	                } else {
	                        $paged = 1;
	                }
					
					$temp = $wp_query;
	 				$wp_query = null;
					$wp_query = new WP_Query();
					$wp_query->query( array(
						'post_type' => 'team_member',
						'posts_per_page' => -1,
						'order'   => 'ASC', 
						'orderby'   => 'meta_value_num',
						'meta_key'  => 'team_member_level',
						'tax_query' => array(
							array(
								'taxonomy' => 'team_member_category',
								'terms'    => $tax_term,
								),
							),
						//'paged' => $paged
					));
				?>


				<?php if ( $wp_query->have_posts() ) : ?>
	                           
					<div class="row"></div>
					<?php $count = 0;
						while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	                    <?php   // Get terms for post
						 $terms = get_the_terms( $post->ID , 'team_member_category' );
						 $menu =  array();
						 // Loop over each item since it's an array
						 if ( $terms != null ){
						 foreach( $terms as $term ) {
						 // Print the name method from $term which is an OBJECT
						 $menu[] = $term->slug ;
						 $menu_term = implode(" ", $menu);
						 // Get rid of the other data stored in the object, since it's not needed
						 unset($term);
						} }
						?>

						<?php if ($count % 2 == 0){ ?>
								<div class="row minming">
						<?php } ?>

						<div class="col-md-6">
							<?php get_template_part("content", "team") ?>
						</div>

						<?php if ($count % 2 == 1){ ?>
							</div>
						<?php } ?>

					<?php $count++;
						endwhile;
						?>
						<?php if ($count % 2 == 1){ ?>
							</div>
						<?php }
						$count = 0;?>


	                <?php $wp_query = null; $wp_query = $temp; ?>
	                
	                <?php else : ?>

					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h2><?php _e( 'No Team Member Found!', 'restaurateur' ); ?></h2>
						</header><!-- .entry-header -->

						<div class="entry-content post-content">
							<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'restaurateur' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->
				

				<?php endif; ?>

			<?php endforeach; ?>
          
        <?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h2><?php _e( 'No Team Member Found!', 'restaurateur' ); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'Please make sure that the Plugin is installed and activated.', 'restaurateur' ); ?></p>
						
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
            
        <?php endif; ?>

    </div> <!-- end #content -->
        
<?php get_footer(); ?>