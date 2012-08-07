<?php

class Users_Controller extends Base_Controller
{

	public function __construct() {
		parent::__construct();

		$this->filter('before', 'auth');
	}

	public function action_show($nickname) {
		$view = View::make('user/view');

		$view->user = User::where('nickname',"=",$nickname)->first();

		if (!$view->user) return Redirect::to('/');

		$view->checkins = $view->user->checkins()->order_by('created_at', 'desc')->take(8)->get();
		$view->follow = Follow::check(Auth::user()->id,$view->user->id);

		$this->layout->content = $view;
	}

	public function action_index(){
		$view = View::make('user/list');
		$view->users = Auth::user()->notFollowing();

		$this->layout->content = $view;
	}
}

?>