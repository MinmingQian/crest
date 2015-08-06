<?php
/*/
Plugin Name: Restaurateur Menu Item CPT
Plugin URI: http://wpthemes.co.nz/restaurateur/
Description: Creates "Menu Item" custom post type for the Restaurateur theme.
Version: 1.0
Author: WPThemes NZ
Author URI: http://wpthemes.co.nz/
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
/*/

/******************************************************************
 * Register the "Menu Item" custom post type for Restaurateur
 ******************************************************************/

/* Team member position Meta Box for the Menu Item */

function crest_team_member_position_box() {
    add_meta_box( 
        'team_member_position_box',
        __( 'Member Postion', 'restaurateur' ),
        'crest_team_member_position_box_content',
        'team_member',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'crest_team_member_position_box' );

function crest_team_member_position_box_content( $team_member_position ) {

	$position = get_post_meta( $team_member_position->ID, 'team_member_position', true );
	echo '<input type="hidden" name="restaurateur_noncename" id="restaurateur_noncename" value="' . wp_create_nonce( 'restaurateur-nonce' ) . '" />';
	echo '<label for="team_member_position">' . __('Enter the position of the team member', 'restaurateur') . '</label>';
	echo '<input id="team_member_position" name="team_member_position" size="30" type="text" value="'.$position.'" />';
}

/* here is not writing very good, the argument is settled, should be the post_id */
function crest_team_member_position_box_save( $team_member_position ) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['restaurateur_noncename'])){
        if ( !wp_verify_nonce( $_POST['restaurateur_noncename'], 'restaurateur-nonce' ) )
            return;
    }else{return;}
	
	// Check permissions
    if ( 'team_member' == $team_member_position->post_type ) { if ( !current_user_can( 'edit_page', $team_member_position )) { return $team_member_position; }}
    elseif ( !current_user_can( 'edit_post', $team_member_position )) { return $team_member_position;}

	update_post_meta( $team_member_position, 'team_member_position', $_POST['team_member_position'] );
}
add_action( 'save_post', 'crest_team_member_position_box_save' );


/* Team member level Meta Box for the Menu Item */

function crest_team_member_level_box() {
    add_meta_box( 
        'team_member_level_box',
        __( 'Member Level', 'restaurateur' ),
        'crest_team_member_level_box_content',
        'team_member',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'crest_team_member_level_box' );

function crest_team_member_level_box_content( $team_member_level ) {

	$level = get_post_meta( $team_member_level->ID, 'team_member_level', true );
	echo '<input type="hidden" name="restaurateur_noncename" id="restaurateur_noncename" value="' . wp_create_nonce( 'restaurateur-nonce' ) . '" />';
	echo '<label for="team_member_level">' . __('Enter the level of the team member(the small the higher level)', 'restaurateur') . '</label>';
	echo '<input id="team_member_level" name="team_member_level" size="10" type="text" value="'.$level.'" />';
}

/* here is not writing very good, the argument is settled, should be the post_id */
function crest_team_member_level_box_save( $team_member_level ) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['restaurateur_noncename'])){
        if ( !wp_verify_nonce( $_POST['restaurateur_noncename'], 'restaurateur-nonce' ) )
            return;
    }else{return;}
	
	// Check permissions
    if ( 'team_member' == $team_member_level->post_type ) { if ( !current_user_can( 'edit_page', $team_member_level )) { return $team_member_level; }}
    elseif ( !current_user_can( 'edit_post', $team_member_level )) { return $team_member_level;}

	update_post_meta( $team_member_level, 'team_member_level', $_POST['team_member_level'] );
}
add_action( 'save_post', 'crest_team_member_level_box_save' );




/* Email Address Meta Box for the Menu Item */

function crest_team_member_email_address_box() {
    add_meta_box( 
        'team_member_email_address_box',
        __( 'Email Address', 'restaurateur' ),
        'crest_team_member_email_address_box_content',
        'team_member',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'crest_team_member_email_address_box' );

function crest_team_member_email_address_box_content( $team_member_email_address ) {

	$email_address = get_post_meta( $team_member_email_address->ID, 'team_member_email_address', true );
	echo '<input type="hidden" name="restaurateur_noncename" id="restaurateur_noncename" value="' . wp_create_nonce( 'restaurateur-nonce' ) . '" />';
	echo '<label for="team_member_email_address">' . __('Enter the email address', 'restaurateur') . '</label>';
	echo '<input id="team_member_email_address" name="team_member_email_address" size="30" type="text" value="'.$email_address.'" />';
}

/* here is not writing very good, the argument is settled, should be the post_id */
function crest_team_member_email_address_box_save( $team_member_email_address ) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['restaurateur_noncename'])){
        if ( !wp_verify_nonce( $_POST['restaurateur_noncename'], 'restaurateur-nonce' ) )
            return;
    }else{return;}
	
	// Check permissions
    if ( 'team_member' == $team_member_email_address->post_type ) { if ( !current_user_can( 'edit_page', $team_member_email_address )) { return $team_member_email_address; }}
    elseif ( !current_user_can( 'edit_post', $team_member_email_address )) { return $team_member_email_address;}

	update_post_meta( $team_member_email_address, 'team_member_email_address', $_POST['team_member_email_address'] );
}
add_action( 'save_post', 'crest_team_member_email_address_box_save' );




/* Backup Email Address Meta Box for the Menu Item */

function crest_team_member_backup_email_address_box() {
    add_meta_box( 
        'team_member_backup_email_address_box',
        __( 'Backup Email Address', 'restaurateur' ),
        'crest_team_member_backup_email_address_box_content',
        'team_member',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'crest_team_member_backup_email_address_box' );

function crest_team_member_backup_email_address_box_content( $team_member_backup_email_address ) {

	$backup_email_address = get_post_meta( $team_member_backup_email_address->ID, 'team_member_backup_email_address', true );
	echo '<input type="hidden" name="restaurateur_noncename" id="restaurateur_noncename" value="' . wp_create_nonce( 'restaurateur-nonce' ) . '" />';
	echo '<label for="team_member_backup_email_address">' . __('Enter the backup email address', 'restaurateur') . '</label>';
	echo '<input id="team_member_backup_email_address" name="team_member_backup_email_address" size="30" type="text" value="'.$backup_email_address.'" />';
}

/* here is not writing very good, the argument is settled, should be the post_id */
function crest_team_member_backup_email_address_box_save( $team_member_backup_email_address ) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['restaurateur_noncename'])){
        if ( !wp_verify_nonce( $_POST['restaurateur_noncename'], 'restaurateur-nonce' ) )
            return;
    }else{return;}
	
	// Check permissions
    if ( 'team_member' == $team_member_backup_email_address->post_type ) { if ( !current_user_can( 'edit_page', $team_member_backup_email_address )) { return $team_member_backup_email_address; }}
    elseif ( !current_user_can( 'edit_post', $team_member_backup_email_address )) { return $team_member_backup_email_address;}

	update_post_meta( $team_member_backup_email_address, 'team_member_backup_email_address', $_POST['team_member_backup_email_address'] );
}
add_action( 'save_post', 'crest_team_member_backup_email_address_box_save' );





/* Personal Website Meta Box for the Menu Item */

function crest_team_member_personal_website_box() {
    add_meta_box( 
        'team_member_personal_website_box',
        __( 'Personal Website', 'restaurateur' ),
        'crest_team_member_personal_website_box_content',
        'team_member',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'crest_team_member_personal_website_box' );

function crest_team_member_personal_website_box_content( $team_member_personal_website ) {

	$personal_website = get_post_meta( $team_member_personal_website->ID, 'team_member_personal_website', true );
	echo '<input type="hidden" name="restaurateur_noncename" id="restaurateur_noncename" value="' . wp_create_nonce( 'restaurateur-nonce' ) . '" />';
	echo '<label for="team_member_personal_website">' . __('Enter the personal website', 'restaurateur') . '</label>';
	echo '<input id="team_member_personal_website" name="team_member_personal_website" size="30" type="text" value="'.$personal_website.'" />';
}

/* here is not writing very good, the argument is settled, should be the post_id */
function crest_team_member_personal_website_box_save( $team_member_personal_website ) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['restaurateur_noncename'])){
        if ( !wp_verify_nonce( $_POST['restaurateur_noncename'], 'restaurateur-nonce' ) )
            return;
    }else{return;}
	
	// Check permissions
    if ( 'team_member' == $team_member_personal_website->post_type ) { if ( !current_user_can( 'edit_page', $team_member_personal_website )) { return $team_member_personal_website; }}
    elseif ( !current_user_can( 'edit_post', $team_member_personal_website )) { return $team_member_personal_website;}

	update_post_meta( $team_member_personal_website, 'team_member_personal_website', $_POST['team_member_personal_website'] );
}
add_action( 'save_post', 'crest_team_member_personal_website_box_save' );





/* add the researchers menu */
function crest_team_member() {
	
	$labels = array(
		'name'               => _x( 'Team Members', 'post type general name', 'restaurateur' ),
		'singular_name'      => _x( 'Team Member', 'post type singular name', 'restaurateur' ),
		'add_new'            => _x( 'Add New', 'book', 'restaurateur' ),
		'add_new_item'       => __( 'Add New Team Member', 'restaurateur' ),
		'edit_item'          => __( 'Edit Team Member', 'restaurateur' ),
		'new_item'           => __( 'New Team Member', 'restaurateur' ),
		'all_items'          => __( 'All Team Members', 'restaurateur' ),
		'view_item'          => __( 'View Team Member', 'restaurateur' ),
		'search_items'       => __( 'Search Team Members', 'restaurateur' ),
		'not_found'          => __( 'No Team Members found', 'restaurateur' ),
		'not_found_in_trash' => __( 'No Team Members found in the Trash', 'restaurateur' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Team Members'
	);
	
	$args = array(
		'labels'        => $labels,
		'description'   => __('Holds our Team Members and Team Member specific data', 'restaurateur'),
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
		'rewrite' 		=> array( 'slug' => 'team-member','with_front' => false ),
	);
	register_post_type( 'team_member', $args );	
	flush_rewrite_rules();
}
add_action( 'init', 'crest_team_member' );



/* Flush your rewrite rules */
function crest_flush_rewrite_rules() {
	global $pagenow;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
		flush_rewrite_rules();
}
/* Flush rewrite rules for custom post types. */
add_action( 'load-themes.php', 'crest_flush_rewrite_rules' );



/* Custom Taxonomies for Menu Item */
function crest_taxonomies_team_member() {
	$labels = array(
		'name'              => _x( 'Team Member Categories', 'taxonomy general name', 'crest' ),
		'singular_name'     => _x( 'Team Member Category', 'taxonomy singular name', 'crest' ),
		'search_items'      => __( 'Search Team Member Categories', 'crest' ),
		'all_items'         => __( 'All Team Member Categories', 'crest' ),
		'parent_item'       => __( 'Parent Team Member Category', 'crest' ),
		'parent_item_colon' => __( 'Parent Team Member Category:', 'crest' ),
		'edit_item'         => __( 'Edit Team Member Category', 'crest' ), 
		'update_item'       => __( 'Update Team Member Category', 'crest' ),
		'add_new_item'      => __( 'Add New Team Member Category', 'crest' ),
		'new_item_name'     => __( 'New Team Member Category', 'crest' ),
		'menu_name'         => __( 'Team Member Categories', 'crest' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		
	);
	register_taxonomy( 'team_member_category', 'team_member', $args );
}
add_action( 'init', 'crest_taxonomies_team_member', 0 );


?>