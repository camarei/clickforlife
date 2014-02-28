<?php

class View_Frontend_Profile_User extends View_Frontend_Profile {

	public function title()
	{
		return parent::title() . '| Выбор метода регистрации';
	}
}