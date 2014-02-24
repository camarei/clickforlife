<?php

abstract class View_Frontend_Layout_2column extends View_Frontend_Layout {
	
	protected $_layout = 'frontend/layout/2column';

	protected $_partials = array(
		'header' => 'frontend/layout/header/default',
		'footer' => 'frontend/layout/footer/default',
	);
}