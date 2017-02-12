<div class="my_meta_control">
	<?php $mb->the_field('lightbox_include'); ?>
	<p>
		<input type="checkbox" name="<?php $mb->the_name(); ?>" value="yes"<?php $mb->the_checkbox_state('yes'); ?>/>Check to turn on Homepage lightbox<br/>	
	</p>
	<label>Image</label>
	<p>
			<?php $mb->the_field('lightbox_image'); ?>
			<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
	<label>Page Link</label>
	<p>
		<?php $mb->the_field('lightbox_link'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
</div>