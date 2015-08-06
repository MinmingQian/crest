<?php
/**
 * Template Name: Papers Page
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
		<main id="main" class="site-main" role="main">
		
		<?php
		query_posts( array ( 'category_name' => 'papers', 'posts_per_page' => 3, 'order' => 'ASC') );
		if ( have_posts() ) : ?>

			<?php 
			while ( have_posts() ) : the_post(); 
			get_template_part( 'content','papers' );
			endwhile;
			?>

			<?php //accesspresslite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		<?php wp_reset_query();?>

		
		<?php
		query_posts( array ( 'category_name' => 'papers', 'posts_per_page' => -1, 'order' => 'ASC') );
			if ( have_posts() ) : 
			$count=6;
			?>
		<div style="text-align:center;">
			<div style="">
			<?php 
			while ( have_posts() ) : the_post();
			//	get_template_part( 'content','papers' );
			if($count - 3 <= 0):
?>
			
			
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->

<?php	

			endif;
			$count -= 1;
			endwhile;
			?>
			</div>
		</div>
			<?php //accesspresslite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		<?php wp_reset_query();?>




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
