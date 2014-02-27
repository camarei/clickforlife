<?php

class Migration_Add_users extends CI_Migration {
		
	public function up() {

		$this->load->model('user');
		$this->db->select('id');
		$this->db->from('roles');

		if ($roles = $this->db->get()->result_array()) {

			$roles_ids = array();
				
			foreach ($roles as $role) {
				$roles_ids[] = $role['id'];
			}

			for($i=0; $i<=100; $i++) {
			
				$user = array(
					'id' 		=> NULL,
					'email' 	=> 'email'.$i.'@gmail.com',
					'password' 	=> 'password'.$i,
					'role_id'	=> $roles_ids[array_rand($roles_ids)]
				);
		
				$this->user->save($user);

			}
		}
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}
	
}


?>