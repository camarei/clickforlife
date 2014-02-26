<?php

class View_Frontend_Login extends View_Frontend_Layout_3columns {

	public function title()
	{
		return parent::title() . ' | Вход';
	}

	public function login_form()
	{
		$form = form_open('/contacts_registered');
		$form .= form_label('Тема сообщения:','subject');
		$form .= form_input('subject','subject');
		$form .= form_textarea('name','name','name');
		$form .= form_input('name','name','name');
		$form .= form_submit('send','Отправить');

		$form = form_close();

		return $form;

	}

}