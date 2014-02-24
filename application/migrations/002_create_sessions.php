<?php

class Migration_Create_sessions extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
				'type'           => 'VARCHAR(10)'
			),
			'user_id' => array(
				'type'      => 'INT(11)',
				'unsigned'  => TRUE
			),
			'created' => array(
				'type' => 'TIMESTAMP',
			),
			'modified' => array(
				'type' => 'TIMESTAMP'
			)
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('sessions', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('session');
	}
}