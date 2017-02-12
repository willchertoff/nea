<div class="my_meta_control">
<?php // FEATURED LINKS ?>
<?php while($metabox->have_fields_and_multi('sidebar-text')): ?>
    <?php $metabox->the_group_open(); ?>
    
        <h2>Sidebar Text</h2>

            <div style="width:100%;">            
                <label>Sidebar Title</label>
                <?php $metabox->the_field('sidebar-text-title'); ?>
                <p><input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"/></p>
            </div>
            <div class="clear"></div>    
            <div style="width:100%;">            
                <label>Sidebar Copy</label>
                <?php $metabox->the_field('sidebar-text-copy'); ?>
                <p><textarea name="<?php $metabox->the_name(); ?>" rows="2"><?php $metabox->the_value(); ?></textarea></p>
            </div>
            <div class="clear"></div>    
            <div style="width:100%;">            
                <label>Sidebar Custom Class</label>
                <?php $metabox->the_field('sidebar-text-class'); ?>
                <p><input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"/></p>
            </div>

        
    <?php $metabox->the_group_close(); ?>
<?php endwhile; ?>

<br>
<div class="clear"></div>

</div>