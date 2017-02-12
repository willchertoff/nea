<?php 
global $related_meta;
global $sidebar_meta;
global $sidebar_incl_meta;
global $menu_meta;

$related_meta->the_meta();
$sidebar_meta->the_meta();
$sidebar_incl_meta->the_meta();
$menu_meta->the_meta();

$sidebar_choice = $sidebar_incl_meta->get_the_value('sidebar-include'); 
if ($sidebar_choice == '') {
    $sidebar_choice = 'left';
}
?>

<div class="content-wrapper column-grid">
	<?php if ($sidebar_choice == 'left') { ?>
	<div class="column-1-3 left-col">
		<!-- CHILD MENU LOOP Left --><?php include_once('wp-content/themes/nea_v2/inc/loop-sidebar-menu-auto.php'); ?><!-- END / CHILD MENU LOOP -->
		<!-- SIDEBAR ITEMS --><?php include_once('wp-content/themes/nea_v2/inc/loop-sidebar-items.php'); ?><!-- END / SIDEBAR ITEMS -->
	</div>
	<?php } ?>
	<div class="<?php if ($sidebar_choice == 'none') { echo 'column-full'; } else { echo 'column-2-3'; } ?>">
		<!-- PAGE CONTENT -->
		<?php 
		echo '<h1>' . get_the_title() . '</h1>';
		if (have_posts()) :
		   while (have_posts()) : the_post();
				 the_content();
		   endwhile;
		endif;
        wp_reset_query();	
		?>
		<!-- END / PAGE CONTENT -->
		<!-- CHILD SUB MENU -->
		<?php if ($menu_meta->get_the_value('add-submenu-child') == 'add-submenu-child-yes') {
		    include('wp-content/themes/nea_v2/inc/loop-child-submenu.php');
		} ?>
		<!-- END / CHILD SUB MENU -->
		<!-- RELATED POSTS -->
        <?php 	
        $related_fields = $related_meta->the_meta();	        
        if ($related_fields) {
            include('wp-content/themes/nea_v2/inc/loop-related.php');
        }
        ?>
		<!-- END / RELATED POSTS -->
	</div>
	<?php if ($sidebar_choice == 'right') { ?>
	<div class="column-1-3 right-col">
		<!-- CHILD MENU LOOP Right --><?php include_once('wp-content/themes/nea_v2/inc/loop-sidebar-menu.php'); ?><!-- END / CHILD MENU LOOP -->
		<!-- SIDEBAR ITEMS --><?php include_once('wp-content/themes/nea_v2/inc/loop-sidebar-items.php'); ?><!-- END / SIDEBAR ITEMS -->
	</div>
	<?php } ?>
</div>
