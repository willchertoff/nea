<div class="my_meta_control">
 
<h2>Menu Options</h2>
    <?php $mb->the_field('custom-menu'); ?>
    <select name="<?php $mb->the_name(); ?>">
    <option value="">Select Custom Menu</option>
    <?php 
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    foreach ( $menus as $menu ): ?>
        <option value="<?php echo $menu->term_id; ?>"<?php $mb->the_select_state($menu->term_id); ?>><?php echo $menu->name; ?></option>
    <?php endforeach; ?>
    </select>
    <br><br>	
	<?php $mb->the_field('replace-prev-parent-menu'); ?>
	<input style="display:inline-block" type="checkbox" name="<?php $mb->the_name(); ?>" value="replace-prev-parent-yes"<?php $mb->the_checkbox_state('replace-prev-parent-yes'); ?>/>
	<p style="display:inline-block">Check this box to link <b><u>parent&#146;s</u></b> child posts in menu (menu links to sibling posts)</p>
    <br>
	<hr>
	<?php $mb->the_field('add-submenu-child'); ?>
	<input style="display:inline-block" type="checkbox" name="<?php $mb->the_name(); ?>" value="add-submenu-child-yes"<?php $mb->the_checkbox_state('add-submenu-child-yes'); ?>/>
	<p style="display:inline-block">Check this box to add a child post submenu below content (previously Sub-menu Template)</p>
    <br>

    <span id="open-more-links">+ Additional Links</span>
    <div class="additional-links">
    <?php // EXTRA LINKS ?>
    <h2>Additional Links</h2>   
    <?php while($mb->have_fields_and_multi('additional-links', array('length' => 1, 'limit' => 3))): ?>
    <?php $mb->the_group_open(); ?> 
        <div class="float-left" style="width:30%;">            
            <label>Link Ref</label>
            <?php $mb->the_field('add-link-ref'); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
        <div class="float-left" style="width:30%;">            
            <label>Link Title</label>
            <?php $mb->the_field('add-link-title'); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
        </div>
        <div class="clear" style="height:10px;"></div> 
        
        <?php $mb->the_field('add-link-external'); ?>
        <input style="display:inline-block" type="checkbox" name="<?php $mb->the_name(); ?>" value="add-submenu-child-yes"<?php $mb->the_checkbox_state('add-submenu-child-yes'); ?>/>
        <p style="display:inline-block">Check this box to open link in a new window</p>
        <br>
        
        <?php $mb->the_field('add-link-parent'); ?>
        <input style="display:inline-block" type="checkbox" name="<?php $mb->the_name(); ?>" value="add-submenu-child-yes"<?php $mb->the_checkbox_state('add-submenu-child-yes'); ?>/>
        <p style="display:inline-block">Check this add link on all sub-page menus</p>
        <br>
        <a href="#" class="dodelete button" style="margin: 10px 0 30px 0;">Delete Link</a>
    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
    <a href="#" class="dodelete-v button float-left">Delete All Links</a>
    <p style="margin:0 5px;" class="float-left"><a href="#" class="docopy-additional-links button">Add New Link</a></p>
    <div class="clear"></div>
    </div>
</div>
<style>
.additional-links   { display: none; }
#open-more-links    { margin: 20px 0; font-weight: bold; cursor: pointer; }
</style>
<script>
    jQuery(window).load(function(){
        if ( jQuery('.wpa_group-additional-links input:first-of-type').val() ) {
            jQuery('#open-more-links').hide();
            jQuery('.additional-links').show();
        }
        jQuery('#open-more-links').click(function(){
            jQuery(this).hide();
            jQuery('.additional-links').show();
        });
    });
</script>