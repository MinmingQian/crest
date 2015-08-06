<?php
/**
 * Template Name: Courses Page
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
		<span style="font-weight:bold;font-size:30px;">Teaching and Supervision</span>
		<div style="font-weight:bold;">
			The researchers associated with CREST, have been designing and delivering a large number of courses at both undergraduate and post-graudate levels at various academic institutes acorss the globe. Most of the time, CREST researchers design and deliver courses on topics that are core of their research expertise. Our team members have also been involved in providing leadership and/or making major contribution to design and delivery of degree programs that are considered unique and innovative in their discipline.

We have also been actively involved in supervising research projects at all levels (e.g., undergraduate, post-graudate, and PhD). The research projects that we supervise those are usually closely aligned with our research interests and expertise. If you are interested in doing a research project or summer research job with us, please browse through the projects ideas published on this site and/or look at the research interests of the researchers within our centre and directly write to them about your interest for seeking an appointment.

Some of the main courses in which our researchers have been involved are:

 Software Architecture, UbiComp, Software Engineering, Empirical Research Methods, Requirements Analysis and Design, Cloud Computing, Computer Support Cooperative Work (CSCW), DevOps, and Web Technologies. 
		</div>
	</div><!-- #primary -->
	
	<div id="secondary-right" class="widget-area right-sidebar sidebar">
		<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		<?php endif; ?>
	</div>
	</section>
</section>
<?php get_footer(); ?>
