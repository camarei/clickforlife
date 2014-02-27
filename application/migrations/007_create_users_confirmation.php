<?php

class Migration_Create_users_confirmation extends CI_Migration {

	public function up() {

		$this->db->query(
			"CREATE  TABLE `user_confirmation` (
  				`id` INT NOT NULL AUTO_INCREMENT ,
  				`confirmation_code` VARCHAR(45) NOT NULL ,
  				`user_id` INT UNSIGNED NOT NULL ,
  				PRIMARY KEY (`id`) ,
  				UNIQUE INDEX `code_user_id_idx` (`confirmation_code` ASC, `user_id` ASC) ,
  				INDEX `fk_user_confirmation_users_idx_idx` (`user_id` ASC) ,
  				CONSTRAINT `fk_user_confirmation_users_idx`
    			FOREIGN KEY (`user_id` )
    			REFERENCES `click`.`users` (`id` )
    			ON DELETE CASCADE
    			ON UPDATE NO ACTION
    		);"
		);
	}

	public function down() {
		$this->dbforge->drop_table('users_confirmation');
	}
}