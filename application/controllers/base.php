<?php

class Base_Controller extends Controller {

	public $layout = 'layout';

	public function __construct() {
		$header = Request::header('x-pjax');
		Config::set('pjax', $header[0]);			
		parent::__construct();
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}