<?php global $wpalchemy_media_access; ?>

<div class="my_meta_control">
 
<h2>Homepage Boxes</h2>
<label>Main Home Box Title</label>
<?php $mb->the_field('home-sq-title'); ?>
<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

<?php while($mb->have_fields_and_multi('home-square')): ?>
<?php $mb->the_group_open(); ?>
	<hr style="margin:20px 0 0 0;display:block;">
	<div class="float-left" style="width:25%;">
	    <label>Home Box Icon</label>
	    <?php $mb->the_field('home-sq-icon'); ?>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    </div>
    <div class="float-left" style="width:25%;">
	    <label>Home Box Link</label>
        <?php $mb->the_field('home-sq-link'); ?>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    </div>
    <div class="float-left" style="width:25%;">	<?php $mb->the_field('home-sq-header'); ?>
	    <label>Home Box Header</label>
        <?php $mb->the_field('home-sq-header'); ?>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    </div>
    <div class="float-left" style="width:25%;">	<?php $mb->the_field('home-sq-header'); ?>
	    <label>Home Box Copy</label>
        <?php $mb->the_field('home-sq-copy'); ?>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
	</div>
    <div class="clear"></div>
	<br>
    <a href="#" class="dodelete button">Delete Box</a>
 
<?php $mb->the_group_close(); ?>
<?php endwhile; ?>
<br>
<a href="#" class="dodelete-home-square button float-left" style="margin-right:10px;">Delete All Boxes</a>
<p style="margin-bottom:0; margin-top: 0; padding-top:0px;"><a href="#" class="docopy-home-square button">Add Box</a></p>
<div class="clear"></div>
<br>
<h2>Homepage - Right Column</h2>
<?php while($mb->have_fields_and_multi('home-col-right')): ?>
<?php $mb->the_group_open(); ?>
    <hr style="margin:20px 0 0 0;display:block;">
    <div class="float-left" style="width:25%;">
        <label>Image (optional)</label>
        <?php $mb->the_field('home-col-right-image'); ?>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    </div>
    <div class="float-left" style="width:25%;">
        <?php $mb->the_field('home-col-right-link'); ?>
        <label>Home Box Link (optional)</label>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    </div>
    <div class="float-left" style="width:25%;">
        <label>Home Box Header</label>
        <?php $mb->the_field('home-col-right-header'); ?>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    </div>
    <div class="float-left" style="width:25%;">
        <label>Home Box Copy</label>
        <?php $mb->the_field('home-col-right-copy'); ?>
        <p><textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea></p>    
    </div>
    <div class="clear"></div>
    <br>
    <a href="#" class="dodelete button">Delete Right Column Item</a>

<?php $mb->the_group_close(); ?>
<?php endwhile; ?>
<br>
<a href="#" class="dodelete-home-col-right button float-left" style="margin-right:10px;">Delete All Right Column Items</a>
<a href="#" class="docopy-home-col-right button">Add Right Column Item</a>

</div>


<!--script type="text/javascript">
	(function ($) {
		$(function () {
			$("#wpa_loop").sortable({
				change: function(){
					$("#warning").show();
				}
			});
		});
	}(jQuery));
</script-->