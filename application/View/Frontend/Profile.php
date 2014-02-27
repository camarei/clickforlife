<?php

class View_Frontend_Profile extends View_Frontend_Layout_3column {

	public function title() 
	{
		return parrent::title() . "| Профиль";
	}

}