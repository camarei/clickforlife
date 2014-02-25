<?php

class View_Frontend_Contact extends View_Frontend_Layout_3column {

	public function title()
	{
		return parent::title() . '| Контакты';
	}

	// form for registered users
	public function contacts_form_registered() 
	{
		// form constructor (testing veriant)
		$form = form_open('/contacts_registered');
		$form .= form_label('Тема сообщения:','subject');
		$form .= form_input('subject','subject');
		$form .= form_textarea('name','name','name');
		$form .= form_input('name','name','name');
		$form .= form_submit('send','Отправить');

		$form .= form_close();

		return $form;
	}

	// form for not registered users
	public function contacts_form_unregistered()
	{
		// form constructor (testing veriant)
		$form = form_open('/contacts_unregistered');
		$form .= form_label('Введите Ваш email','email');
		$form .= form_input('email',set_value('email'));
		$form .= form_label('Введите Ваше имя','name');
		$form .= form_input('name','name');
		$form .= form_textarea('text','text');

		$form .= form_submit('text','text');
		$form .= form_close();

		return $form;
	}


	public function contacts_form()
	{
		return ($is_user_login) ? contacts_form_registered() : contacts_form_unregistered();
	}

}