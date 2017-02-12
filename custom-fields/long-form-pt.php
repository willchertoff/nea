<?php
function create_posttype() {

  register_post_type('long-form',
    array (
      'labels' => array(
        'name' => ('Long-forms'),
        'singular_name' => ('Long-form'))
      ,
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,
    )
  );
}
add_action( 'init', 'create_posttype' );
add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'long-form';
    remove_post_type_support( $post_type, 'editor');
}