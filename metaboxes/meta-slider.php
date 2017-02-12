<?php global $wpalchemy_media_access; ?>

<div class="my_meta_control">
 
<?php while($mb->have_fields_and_multi('slides')): ?>
    <?php $mb->the_group_open(); ?>
        <h2>Slide</h2>
        <div class="float-left" style="width:40%;">
            <label>Slide Image</label>
            <?php $mb->the_field('slider-image'); ?>
            <?php $wpalchemy_media_access->setGroupName('slider-image-n'. $mb->get_the_index())->setInsertButtonLabel('Insert'); ?>
            <p class="image-upload">
                <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
                <?php echo $wpalchemy_media_access->getButton(); ?>
            </p>
        </div>
        <div class="float-left" style="width:40%;">
            <?php $mb->the_field('slider-link'); ?>
            <label>Slide Link (optional)</label>
            <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
        </div>
        <div class="float-left" style="width:20%;padding-top:38px;">
            <a href="#" class="dodelete button">Delete Slide</a>
        </div>
        <div class="clear"></div>
    <?php $mb->the_group_close(); ?>
<?php endwhile; ?>
<a href="#" class="dodelete-slides button float-left" style="margin-top:20px;margin-right:10px;">Delete All Slides</a>
<p style="padding-top:15px;" class="float-left"><a href="#" class="docopy-slides button">Add Slide</a></p>
<div class="clear"></div>
</div>