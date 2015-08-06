<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package AccesspressLite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="col-xs-4"> 
		<?php if ( has_post_thumbnail()) : ?>
	        <div class="imgthumb"><?php the_post_thumbnail(); ?></div>
	        <?php else : ?>
	        <div class="grid-box-noimg"><p><?php _e('No Featured Image', 'restaurateur'); ?></p></div>
	    <?php endif; ?>
	</div>


	<div class="col-xs-8">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->

	    <?php  $position = get_post_meta( $post->ID, 'team_member_position', true ); 
		if ($position != null) : ?> 
		<p style="font-size: 20px; font-weight: bold;"> <?php echo $position; ?> </p>
	    <?php endif; ?>

	    <?php  $email_address = get_post_meta( $post->ID, 'team_member_email_address', true ); 
		if ($email_address != null) : ?>
			<div>
				<a href="mailto: <?php echo $email_address; ?> "> <?php echo $email_address; ?> </a>
			</div>
	    <?php endif; ?>

	    <?php  $backup_email_address = get_post_meta( $post->ID, 'team_member_backup_email_address', true ); 
		if ($backup_email_address != null) : ?>
			<div>
				<a href="mailto: <?php echo $backup_email_address; ?> "> <?php echo $backup_email_address; ?> </a>
			</div>
	    <?php endif; ?>

	    <?php  $personal_website = get_post_meta( $post->ID, 'team_member_personal_website', true ); 
		if ($personal_website != null) : ?>
			<div>
				<a href="<?php echo $personal_website; ?> "> <?php echo $personal_website; ?> </a>
			</div>
	    <?php endif; ?>
	    
		<div class="entry-content">
			<a href="<?php the_permalink(); ?> "> View More </a>
		</div><!-- .entry-content -->

	</div><!-- end col-xs8 --> 

</article><!-- #post-## -->
