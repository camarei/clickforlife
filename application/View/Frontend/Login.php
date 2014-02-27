<?php

class View_Frontend_Login extends View_Frontend_Layout_3column {

	public function title()
	{
		return parent::title() . 'Login';
	}

	public function login_form_page() 
	{
		$form = form_open();
		$form .= form_label('Введите Ваш email','email');
		$form .= form_input(array('name' => 'email', 'value' => 'value'));
		$form .= form_label('Введите Ваш пароль','password');
		$form .= form_input(array('type' => 'password', 'name' => 'password', 'value' => 'password'));
		$form .= form_input(array('type' => 'submit', 'name' => 'login', 'class' => 'button-login', 'value' => 'Войти'));
		$form .= form_close();
		return $form;
	}

}