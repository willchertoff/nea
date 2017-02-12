<?php
global $sidebar_text;
$sidebar_text = new WPAlchemy_MetaBox(array
(
	'id' => '_sidebar_text',
	'title' => 'Sidebar Text',
	'template' => get_stylesheet_directory() . '/metaboxes/meta-sidebar-text.php',
	'exclude_template' => 'page-homepage.php',
));



/* eof */
?>