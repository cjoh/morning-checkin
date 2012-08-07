<?php

class Follow extends Eloquent {

	public static $timestamps = true;

	public static function check($user,$target) {
				$follow = Follow::where('user_id', "=", $user)
									->where('target_user_id', "=", $target)
									->first();
			return $follow;
	}

	public function followee() {
		return $this->belongs_to('User','target_user_id');
	}

	public function follower() {
		return $this->belongs_to('User','user_id');
	}

}
