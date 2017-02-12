<div class="my_meta_control">
<?php // FEATURED LINKS ?>
<?php while($mb->have_fields_and_multi('sidebar-item', array('length' => 1, 'limit' => 3))): ?>
    <?php $mb->the_group_open(); ?>
        <h2>Sidebar Image</h2>
        <?php $mb->the_field('sidebar-select'); ?>
        <span style="margin-top:20px;margin-bottom:20px;">
            <input class="sidebar-select" name="<?php $mb->the_name(); ?>" type="radio" value="ad"<?php $mb->the_radio_state('ad'); ?>>Advertisement
            <input class="sidebar-select" name="<?php $mb->the_name(); ?>" type="radio" style="margin-left: 10px;" value="custom"<?php $mb->the_radio_state('custom'); ?>>Custom
        </span>
        <div class="hide ad">    
            <?php $mb->the_field('sidebar-ads'); ?>
            <select name="<?php $mb->the_name(); ?>" style="margin: 5px 5px 0 0;width: auto;">
                <option value="">Choose Advertisement</option>
                <?php 
                $args_ads = array('post_type' => 'dfads'); 
                $ads = query_posts($args_ads);
                foreach ( $ads as $ad ): ?>
                    <option value="<?php echo $ad->ID; ?>"<?php $mb->the_select_state($ad->ID); ?>><?php echo $ad->post_title; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="hide custom">  
            <div class="float-left" style="width:30%;">            
                <label>Sidebar Title</label>
                <?php $mb->the_field('sidebar-title'); ?>
                <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
            </div>
            <div class="float-left" style="width:30%;">            
                <label>Sidebar Logo</label>
                <?php $mb->the_field('sidebar-logo'); ?>
                <p>
                    <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                </p>
            </div>
            <div class="float-left" style="width:30%;">            
                <label>Sidebar Link</label>
                <?php $mb->the_field('sidebar-link'); ?>
                <p>
                    <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
                    <br/><?php $metabox->the_field('sidebar-link-external'); ?>
                    <span style="margin-top:10px;">
                    <input type="checkbox" name="<?php $metabox->the_name(); ?>" value="1"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/>Open link in new window
                    </span>
                </p>
            </div>
            <div class="clear"></div>    
            <div style="width:100%;">            
                <label>Sidebar Copy</label>
                <?php $mb->the_field('sidebar-copy'); ?>
                <p><textarea name="<?php $metabox->the_name(); ?>" rows="2"><?php $metabox->the_value(); ?></textarea></p>
            </div>
        </div>
        <a href="#" class="dodelete button" style="margin-top: 10px; margin-bottom: 20px;">Delete Item</a>
        
    <?php $mb->the_group_close(); ?>
<?php endwhile; ?>

<br>
<a href="#" class="dodelete-sidebar-item button float-left">Delete All Sidebar Items</a>
<p style="margin:0 5px;" class="float-left"><a href="#" class="docopy-sidebar-item button">Add New Item</a></p>
<div class="clear"></div>

</div>
<style>
.hide {
    display: none; }
.show-ad .ad {
    display: block; }
.show-custom .custom {
    display: block; }
</style>
<script>
jQuery(document).ready(function(){
    jQuery('.sidebar-select').click(function(){
        var value = jQuery(this).val();
        jQuery('.hide').hide();
        jQuery('.' + value).show();
        console.log('run');
    });
    jQuery('.sidebar-select:checked').each(function(){
        var value = jQuery(this).val();
        jQuery(this).closest('.wpa_group').addClass('show-' + value);
    });
});
</script>