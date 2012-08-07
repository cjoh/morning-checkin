<?php

class Pads_Controller extends Base_Controller
{	
	public function __construct() {
		parent::__construct();

		$this->filter('before', 'auth');
	}

	public function action_index(){
		$view = View::make('pad/list');

		$this->layout->content = $view;
	}

	public function action_show($pad_id){
		$view = View::make('pad/view')->with(array("pad"=>Pad::find($pad_id),"etherpad"=>Config::get('morningcheckin.etherpad')));

		$this->layout->content = $view;
	}

	public function action_hide($pad_id) {
		$pad = Pad::find($pad_id);
		$pad->hidden = true;
		$pad->save();

		return Redirect::to(route('pads'));
	}

	public function action_create(){
		$existing_pad = Pad::where('title', '=', Input::get("title"))->first();

		if ($existing_pad) return Redirect::to(route('pad', array($existing_pad->id)));

		$p = new Pad(array(
			"title" => Input::get("title"),
			"user_id" => Auth::user()->id,
			"hidden" => 0
			));
		$p->save();
		Notification::create(array("user_id"=>$p->user_id,"body"=>"created a new pad called ".$p->title,"target"=> route('pad', array(urlencode($p->id))) , "is_hidden"=>0));

		return Redirect::to(route('pad', array(urlencode($p->id))));
	}
}

?>