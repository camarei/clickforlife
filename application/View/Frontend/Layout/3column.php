<?php

abstract class View_Frontend_Layout_3column extends View_Frontend_Layout {
	
	protected $_layout = 'frontend/layout/3column';

	protected $_partials = array(
		'header'  	 => 'frontend/layout/header/default',
		'footer'  	 => 'frontend/layout/footer/default',
		'lcolumn' 	 => 'frontend/layout/lcolumn/default',
		'rcolumn' 	 => 'frontend/layout/rcolumn/default',
		'navigation' => 'frontend/layout/navigation/default',
		'breadcrumbs'=> 'frontend/layout/breadcrumbs/default'
	);

	public $css_assets = array(
		'css/styles.css',
		'css/bootstrap.css'
	);

	public $js_assets = array(
		'js/bootstrap.min.js'
	);

	public function css_assets() {
		foreach ($this->css_assets as &$css) {
			$css = base_url($css);
		}
		return $this->css_assets;
	}

	public function js_assets() {
		foreach ($this->js_assets as &$js) {
			$js = base_url($js);
		}
		return $this->js_assets;
	}

}