<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function nea_wp_add_more_metaboxes_childtheme() {
	include_once (get_stylesheet_directory() . '/metaboxes/nea-spec-child.php');
}
add_action( 'after_setup_theme', 'nea_wp_add_more_metaboxes_childtheme' );

/** ====================================================
 *  ------------Password Protected Pages----------------
    ==================================================== */
/**
*This changes the default password prompt text on password protected
*pages, as well as removing "Protected" from the H1 of the page.
 */
 function the_title_trim($title)
 {
   $pattern[0] = '/Protected:/';
   $replacement[0] = ''; // Enter some text to put in place of Protected:
   return preg_replace($pattern, $replacement, $title);
 }
 add_filter('the_title', 'the_title_trim');
function change_password_protected_text($output)
{
    $newPasswordText = 'Don\'t have the password? Send an email to <a href="mailto:help@nationaleczema.org">National Eczema Association</a> to get access.';
    $output = str_replace('This content is password protected. To view it please enter your password below:', $newPasswordText, $output);
    return $output;
}
add_filter( 'the_password_form', 'change_password_protected_text', 999);

include_once (get_stylesheet_directory() . '/inc/traction.php');
include_once (get_stylesheet_directory() . '/custom-fields/long-form-pt.php');
include_once (get_stylesheet_directory() . '/custom-fields/long-form-meta.php');



/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function gp_remove_cpt_slug( $post_link, $post, $leavename ) {
 
    if ( 'long-form' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
 
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
 
    return $post_link;
}
add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 3 );

/**
 * Have WordPress match postname to any of our public post types (post, page, race)
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * By default, core only accounts for posts and pages where the slug is /post-name/
 */
function gp_parse_request_trick( $query ) {
 
    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;
 
    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
 
    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'page', 'long-form' ) );
    }
}
add_action( 'pre_get_posts', 'gp_parse_request_trick' );
?>
