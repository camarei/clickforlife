<?php

class Migration_Create_roles extends CI_Migration {

	public function up() {
		
		$this->dbforge->add_field(array(
			'id' => array(
				'type'           => 'INT',
				'constrait'      => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'role_name' => array(
				'type'	=> 'VARCHAR(40)',
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('role_name');
		$this->dbforge->create_table('roles', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('roles');
	}
}