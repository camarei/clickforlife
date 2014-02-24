<?php

class Migration_Create_users_db extends CI_Migration {
		
	public function up() {
		
		for($i=0; $i<=100; $i++) {
			
			$user = array(
				'id' 		=> NULL,
				'email' 	=> 'email'.$i.'@gmail.com',
				'password' 	=> 'password'.$i
			);
		
			$this->load->model('user');
			$this->user->save($user);
		
		}

	}

	public function down() {
		$this->dbforge->drop_table('users');
	}
	
}


?>