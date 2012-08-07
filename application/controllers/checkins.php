<?php

class Checkins_Controller extends Base_Controller
{

	public function __construct() {
		parent::__construct();

		$this->filter('before', 'auth');
		$this->filter('before', 'my_checkin')->only(array('update', 'destroy'));
	}

	public function action_new() {
		$view = View::make('checkin.new');
		$view->last_checkin = Auth::user()->last_checkin();
		$view->older_checkins = Auth::user()->checkins()->order_by('created_at', 'desc')->skip(1)->take(5)->get();
		$view->following = Auth::user()->following(true);

	
		$this->layout->content = $view;
	}

	public function action_create() {
		$checkin = new Checkin();
		$checkin->user_id = Auth::user()->id;
		$checkin->checkintext = Input::get('checkintext');
		$checkin->save();
		
		Notification::create(array("user_id"=>$checkin->user_id,"body"=>"checked in","target"=>route('user', array(Auth::user()->nickname)),"is_hidden"=>0));
		return Redirect::to('dashboard');
	}

	public function action_update() {
		// Use the checkin that we looked up in our filter.
		$checkin = Config::get('checkin');

		$checkin->checkintext = Input::get('checkintext');
		$checkin->save();

		return $checkin->parsed_checkin();
	}

	public function action_destroy() {
		// Use the checkin that we looked up in our filter.
		$checkin = Config::get('checkin');

		$checkin->delete();

		return Redirect::to('dashboard');
	}

}

Route::filter('my_checkin', function()
{
	// Request::$route->parameters[0] is a shitty hack to get the $id passed in the route.
	$id = Request::$route->parameters[0];
	$checkin = Checkin::find($id);
	if ($checkin->user_id != Auth::user()->id) return "Not Authorized";

	// Pass the checkin to our action
	Config::set('checkin', $checkin);
});
