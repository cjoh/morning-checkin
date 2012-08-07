<?php

class Pad extends Eloquent {

	public static $timestamps = true;
	#public static $etherpad_url = "https://factor.cc/pad/p/mcdev-";

	public function owner() {
		return $this->belongs_to('User', 'owner_id');
	}



}
?>