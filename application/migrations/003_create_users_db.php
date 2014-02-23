<?php

class Migration_Create_users_db extends CI_Migration {
		
	public function up() {
		
		for($i=0; $i<=100; $i++) {
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
		
			$i++;
		
		}

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users', TRUE);
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}
	
}


?>