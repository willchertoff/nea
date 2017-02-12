<?php

$long_form_meta_fields = array(
    array( 'name' => 'Headline',
    'id' => "headline",
    'type' => 'text',
    'std' => '',
    'desc' => '',
    ),
    array( 'name' => 'Subheadline',
    'id' => "sub_headline",
    'type' => 'text',
    'std' => '',
    'desc' => '',
    ),
  array( 'name' => 'Email Capture Headline',
    'id' => "email_capture_headline",
    'type' => 'text',
    'std' => '',
    'desc' => '',
    ),
  array( 'name' => 'Email Capture Sub Headline',
    'id' => "email_capture_sub_headline",
    'type' => 'text',
    'std' => '',
    'desc' => '',
    ),
  array( 'name' => 'Email Capture Button',
    'id' => "email_capture_button",
    'type' => 'text',
    'std' => '',
    'desc' => '',
    ),
  array( 'name' => 'Top Level Content',
    'id' => "top_level_content",
    'type' => 'tinymce',
    'std' => '',
    'desc' => '',
    ),
  array(
    'name' => 'Page Body',
    'id' => 'page_body',
    'type' => 'tinymce',
    'std' => '',
    'desc' => '',
  )
);

$long_form_meta_information = array(
  'title' => 'Long Form Content',
  'post_type' => 'long-form',
  'slug' => 'top_level_content_box'
);

new TractionMetaBoxes($long_form_meta_fields,$long_form_meta_information);
?>
