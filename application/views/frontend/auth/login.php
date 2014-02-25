<h1>Simple Login with CodeIgniter</h1>

   <form method="post">
     <label for="email">Email:</label>
     <input type="text" size="20" id="email" name="email" value="<?php echo set_value('email') ?>" /><?php echo form_error('email') ?>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password" value="<?php echo set_value('password') ?>" /><?php echo form_error('password') ?>
     <br/>
     <input type="submit" value="Login"/>
   </form>