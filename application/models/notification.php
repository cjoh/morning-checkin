<?php

class Notification extends Eloquent {

	public static $timestamps = true;
	#public static $etherpad_url = "https://factor.cc/pad/p/mcdev-";

	public function user() {
		return $this->belongs_to('User', 'user_id');
	}



}
?>