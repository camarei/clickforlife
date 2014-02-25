<?php

abstract class View_Frontend_Layout_3column extends Viev_Frontend_Layout {
	
	protected $_layout = 'frontend/layout/3column';

	protected $_partials = array(
		'header'  => 'frontend/layout/header/default',
		'footer'  => 'frontend/layout/footer/default',
		'lcolumn' => 'frontend/layout/lcolumn/default',
		'rcolumn' => 'frontend/layout/rcolumn/default'
	);

}