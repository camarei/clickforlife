<?php

class Migration_Fk_users_roles extends CI_Migration {

	public function up() {
		$this->db->query(
			"ALTER TABLE `users` ADD COLUMN `role_id` INT(10) UNSIGNED NOT NULL  AFTER `password` , 
  			ADD CONSTRAINT `fk_users_roles_idx`
  			FOREIGN KEY (`role_id` )
  			REFERENCES `roles` (`id` )
  			ON DELETE NO ACTION
  			ON UPDATE NO ACTION,
			ADD INDEX `fk_users_roles_idx` (`role_id` ASC) ;"
		);
	}

	public function down() {
		$this->db->query(
			"ALTER TABLE `users` DROP FOREIGN KEY `fk_users_roles_idx` ;
			ALTER TABLE `users` DROP COLUMN `role_id` ,
			DROP INDEX `fk_users_roles_idx`;"
		);
	}

/* ALTER TABLE `click.ru`.`users` ADD COLUMN `role_id` INT(10) UNSIGNED NOT NULL  AFTER `password` , 
  ADD CONSTRAINT `fk_users_roles_idx`
  FOREIGN KEY (`role_id` )
  REFERENCES `click.ru`.`roles` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_users_roles_idx` (`role_id` ASC) ;

ALTER TABLE `click.ru`.`users` DROP FOREIGN KEY `fk_users_roles_idx` ;
ALTER TABLE `click.ru`.`users` DROP COLUMN `role_id` 
, DROP INDEX `fk_users_roles_idx` ; */



}