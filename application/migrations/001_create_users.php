<?php

class Migration_Create_users extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
				'type'           => 'INT',
				'constrait'      => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'email' => array(
				'type'      => 'VARCHAR(100)',
			),
			'password' => array(
				'type'      => 'VARCHAR(128)',
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}
}