<?php
abstract class View_Base extends ViewModel_Layout {

	/**
	 * @var HTTP_Cache Caching instance. Will be filled by controller.
	 */
	protected $_cache = NULL;

	/**
	 * Is the current request secure?
	 * @var bool
	 */
	public $secure;

	/**
	 * @var array Errors
	 */
	public $errors = array();

	/**
	 * @var array Success
	 **/
	public $success = array();

	/**
	 * @var  array  Logged in user
	 */
	public $logged_in_user;

	/**
	 * @var  string  The default title of the site when nothing is defined
	 */
	public $title = 'Click.ru';

	/**
	 * Return base
	 *
	 * @return  string
	 */
	public function base()
	{
		return URL::base();
	}

	/**
	 * Return base url
	 *
	 * @return  string
	 */
	public function base_url()
	{
		// Secure request
		if ($this->secure)
		{
			return URL::site($this->base(), 'https');
		}

		return URL::site($this->base(), 'http');
	}

	/**
	 * Return current url
	 *
	 * @return string
	 */
	public function current_uri()
	{
		// No Request
		if ( ! $request = Request::current())
		{
			// Init new. Somehow this is needed on some 404 pages, havnt found
			// the bug
			$request = Request::factory('/');
		}

		return $request->url($this->secure ? 'https' : 'http');
	}

	/**
	 * Return current http url
	 *
	 * @return string
	 */
	public function current_http_uri()
	{
		return Request::current()->url('http');
	}

	/**
	 * Return current https url
	 *
	 * @return string
	 */
	public function current_https_uri()
	{
		return Request::current()->url('https');
	}

	/**
	 * Returns errors as message
	 *
	 * @return array
	 */
	public function errors()
	{
		$errors = array();

		foreach ($this->errors as $error)
		{
			$errors[] = array('message' => __($error));
		}

		return $errors;
	}

	/**
	 * Returns errors as message
	 *
	 * @return array
	 */
	public function success()
	{
		$successes = array();

		foreach ($this->success as $success)
		{
			$successes[] = array('message' => __($success));
		}

		return $successes;
	}

	/**
	 * Returns whether there are errors
	 *
	 * @return bool
	 */
	public function has_errors()
	{
		return !empty($this->errors);
	}

	/**
	 * Returns whether there are success messages
	 *
	 * @return bool
	 */
	public function has_success()
	{
		return !empty($this->success);
	}

	/**
	 * Check whether the user is logged in
	 */
	public function is_logged_in()
	{
		return (bool) $this->logged_in_user;
	}

	/**
	 * Return base title
	 */
	public function title()
	{
		return 'Click.ru';
	}

	/**
	 * Returns default description. Override this method
	 *
	 * @return  string
	 */
	public function page_description()
	{
		return NULL;
	}

	/**
	 * Returns whether there is a description
	 *
	 * @return  boolean
	 */
	public function has_page_description()
	{
		return (bool) $this->page_description();
	}

	/**
	 * Returns default keywords. Override this method
	 *
	 * @return  string
	 */
	public function page_keywords()
	{
		return NULL;
	}

	/**
	 * Returns whether there are keywords
	 *
	 * @return  boolean
	 */
	public function has_page_keywords()
	{
		return (bool) $this->page_keywords();
	}
}