<?php
/**
 * Template Name: Poster Page
 * Description: A page template for the research area
 */

get_header(); 
global $post;
if(is_front_page()){
	$post_id = get_option('page_on_front');
}else{
	$post_id = $post->ID;
}
$post_class = get_post_meta( $post_id, 'accesspresslite_sidebar_layout', true );
?>

<section id="ak-blog">
	<section class="ak-container" id="ak-blog-post">
	<div id="primary" class="content-area" style="width:100%;">
		<span style="font-weight:bold;font-size:30px;">Poster</span>
		<hr>
		<main id="main" class="site-main" role="main">
		
		<?php 
	query_posts( array ( 'category_name' => 'poster', 'posts_per_page' => -1 ) );
		if ( have_posts() ) : ?>

			<?php 
			while ( have_posts() ) : the_post(); 
			get_template_part( 'content','research' );
			endwhile;
			?>

			<?php accesspresslite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		<?php wp_reset_query();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<div id="secondary-right" class="widget-area right-sidebar sidebar">
		<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		<?php endif; ?>
	</div>
	</section>
</section>
<?php get_footer(); ?>
