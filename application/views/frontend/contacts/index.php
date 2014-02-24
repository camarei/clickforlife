<form method="post">
	<input name="email" type="text" value="<?php echo set_value('email') ?>" /><?php echo form_error('email') ?>
	<input name="name" value="<?php echo set_value('name') ?>" /><?php echo form_error('name') ?>
	<textarea name="message"><?php echo set_value('message') ?></textarea><?php echo form_error('message') ?>
	
	<?php if($is_user_login): ?>
	<input type="file" />
	<?php endif; ?>
	
	<input type="submit" value="check" />
</form>