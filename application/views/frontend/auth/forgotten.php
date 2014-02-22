<form method="post">
	<input name="email" type="text" value="<?php echo set_value('email') ?>" /><?php echo form_error('email') ?>
	<input type="submit" value="update" />
</form>