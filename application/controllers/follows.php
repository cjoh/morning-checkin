<?php

class Follows_Controller extends Base_Controller
{	
	public function __construct() {
		$this->filter('before', 'auth');
		$this->filter('before', 'my_follow')->only(array('destroy'));
	}

	public function action_create() {
		//check to see if the relationship exists already
		if($target_user_id = Input::get('target_user_id')){
			if(!Follow::check(Auth::user()->id, $target_user_id)){
				$r = new Follow;
				$r->user_id = Auth::user()->id;
				$r->target_user_id = $target_user_id;
				$r->save();
			}
		}
		return Redirect::back();
	}

	public function action_destroy() {
		$follow = Config::get('follow');
		$follow->delete();
		return Redirect::back();
	}
}

Route::filter('my_follow', function()
{
	// Request::$route->parameters[0] is a shitty hack to get the $id passed in the route.
	$id = Request::$route->parameters[0];
	$follow = Follow::find($id);
	if ($follow->user_id != Auth::user()->id) return "Not Authorized";

	// Pass the follow to our action
	Config::set('follow', $follow);
});


?>