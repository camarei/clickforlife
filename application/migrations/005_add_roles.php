<?php

class Migration_Add_roles extends CI_Migration {

	public function up() {

		$roles = array(
			array(
				'id'		=> NULL,
				'role_name'	=> 'admin'
			),
			array(
				'id'		=> NULL,
				'role_name'	=> 'client'
			),
			array(
				'id'		=> NULL,
				'role_name'	=> 'user'
			),
			array(
				'id'		=> NULL,
				'role_name'	=> 'victim'
			),
		);

		$this->load->model('role');

		foreach($roles as $role) {
			$this->role->save($role);
		}

	}

	public function down() {
		$this->db->query(
			"DELETE FROM `roles`;"
		);
	}


}