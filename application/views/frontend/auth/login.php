<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="admin" />

	<title>Untitled 1</title>
</head>

<body>

<h1>Simple Login with CodeIgniter</h1>

   <form method="post">
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="login" value="<?php echo set_value('login') ?>" /><?php echo form_error('login') ?>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password" value="<?php echo set_value('password') ?>" /><?php echo form_error('password') ?>
     <br/>
     <input type="submit" value="Login"/>
   </form>


</body>
</html>