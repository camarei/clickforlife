<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="admin" />

	<title>Untitled 1</title>
</head>

<body>

<form method="post">
	<input name="email" type="text" value="<?php echo set_value('email') ?>" /><?php echo form_error('email') ?>
	<input type="submit" value="update" />
</form>

</body>
</html>