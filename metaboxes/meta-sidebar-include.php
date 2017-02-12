<div class="my_meta_control">
    <h2>Alternative Menu Title</h2>
    <?php $mb->the_field('alt-menu-title'); ?>
    <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
    
	<h2>Sidebar Options</h2><br>
    <p>	
	<?php $sidebar_choices = array('left'=>'Left Sidebar','right'=>'Right Sidebar','none'=>'No Sidebar'); ?>
	<?php foreach ($sidebar_choices as $key => $value): ?>
		<?php $mb->the_field('sidebar-include'); ?>
		<input style="margin:1px 2px 10px 0;" type="radio" name="<?php $mb->the_name(); ?>" value="<?php echo $key; ?>"<?php $mb->the_radio_state($key); ?>/><span style="display:inline-block;vertical-align:top;margin-left:5px;"><?php echo $value; ?></span><br/>
	<?php endforeach; ?>
    </p>

</div>