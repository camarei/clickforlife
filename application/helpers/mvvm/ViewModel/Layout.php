<?php 
/**
 * Mustache templates for CodeIgniter.
 *
 */
abstract class ViewModel_Layout extends ViewModel {

	/**
	 * @var  string  partial name for content
	 */
	const CONTENT_PARTIAL = 'content';

	/**
	 * @var  boolean  render template in layout?
	 */
	public $render_layout = TRUE;

	/**
	 * @var  string  layout path
	 */
	protected $_layout = 'layout';

	public function render()
	{
		if ( ! $this->render_layout)
		{
			return parent::render();
		}

		$partials = $this->_partials;

		$partials[self::CONTENT_PARTIAL] = $this->_template;

		$template = $this->_load($this->_layout);

		return $this->_stash($partials)->render($template, $this);
	}

}
