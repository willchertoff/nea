<div class="my_meta_control">
<?php // RELATED LINKS ?>
<?php while($mb->have_fields_and_multi('related-links')): ?>
<?php $mb->the_group_open(); ?>    
    <h2>Related Link</h2>
    <div class="float-left" style="width:30%;">
        <?php $mb->the_field('rel-link-title'); ?>
	    <label>Related Link Title</label>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    </div>
    <div class="float-left" style="width:30%;">    
	    <?php $mb->the_field('rel-link-ref'); ?>
	    <label>URL</label>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    </div>
    <a href="#" class="dodelete button float-left" style="margin-top: 38px;">Delete Link</a>
    <div class="clear"></div>    
<?php $mb->the_group_close(); ?>
<?php endwhile; ?>
<br>
<a href="#" class="dodelete-related-links button float-left">Delete All Links</a>
<p style="margin:0 5px;" class="float-left"><a href="#" class="docopy-related-links button">Add New Link</a></p>
<div class="clear"></div>
<hr style="margin-top: 30px;">
<?php // FEATURED LINKS ?>
<?php while($mb->have_fields_and_multi('featured-links', array('length' => 1, 'limit' => 2))): ?>
<?php $mb->the_group_open(); ?> 
    <h2>Featured Page</h2>   
    <div class="float-left" style="width:30%;">            
        <label>Featured Page</label>
        <?php $mb->the_field('feat-link'); ?>
        <select name="<?php $mb->the_name(); ?>" style="margin: 5px 5px 0 0;">
            <option value="">Select Featured Page</option>
            <?php 
            $args = array('post_status' => 'publish', 'orderby' => 'parent'); 
            $pages = get_pages($args);
            foreach ( $pages as $page ): ?>
                    <option value="<?php echo $page->ID; ?>"<?php $mb->the_select_state($page->ID); ?>><?php echo $page->post_title; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <a href="#" class="dodelete button float-left" style="margin-top: 38px;">Delete Page</a>
    <div class="clear"></div>    
<?php $mb->the_group_close(); ?>
<?php endwhile; ?>
<br>
<a href="#" class="dodelete-featured-links button float-left">Delete All Featured Pages</a>
<p style="margin:0 5px;" class="float-left"><a href="#" class="docopy-featured-links button">Add New Page</a></p>
<div class="clear"></div>

</div>


<script type="text/javascript">
	(function ($) {
		$(function () {
			$("#wpa_loop-custom-menu-item").sortable({
				change: function(){
					$("#warning").show();
				}
			});
		});
	}(jQuery));
</script>