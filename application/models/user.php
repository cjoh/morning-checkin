<?php

class User extends Eloquent {

	public static $timestamps = true;

	public function cache_key(){
		return "user-" . $this->id . "-" . preg_replace("/-|:|\s/", "", $this->updated_at);
	}

	public function notitications(){
		return $this->has_many('Notification','user_id');
	}

	public function checkins() {
		return $this->has_many('Checkin')->order_by('created_at','desc');
	}

	public function last_checkin() {
		if(sizeOf($this->checkins) > 0){
			return $this->checkins[0];
		} else {
			return false;
		}
	}

	public function gravatar($size = "40") {
		return "http://www.gravatar.com/avatar/" .
					 md5( strtolower( trim( $this->email ) ) ) . "?d=identicon&s=" . $size;
	}

	public function notFollowing() {
		$following_ids = array_map(function($f){return $f->id;}, $this->following()->get());
		if (count($following_ids) > 0) {
			return User::where_not_in('id',  $following_ids)->get();
		} else {
			return User::all();
		}
	}

	public function following($deepload = false) {
		if ($deepload) {
			$folly = Follow::with(array('followee', 'followee.checkins', 'followee.news'))->where('user_id', "=", Auth::user()->id)->get();
			return array_map(function($f){return $f->followee;}, $folly);
		} else {
			return $this->has_many_and_belongs_to('User','follows','user_id','target_user_id');
		}
	}
	public function news(){
		return $this->has_many('Notification')->order_by('created_at','desc');
	}

	public function followers() {
		return $this->has_many_and_belongs_to('User','follows','target_user_id','user_id');
	}

	public function dashdata() {
		$user = $this;
		$date_format = 'Y-m-d H:i:s';
		if(count($user->checkins) > 0) {
				$checkin = $user->last_checkin();
				$checkin_array = explode("\n",$checkin->checkintext);
				$checkinDate = DateTime::createFromFormat($date_format,$checkin->created_at);
				$datediff = $checkinDate->diff(new DateTime());
				$interval = $datediff->format('%a');
				if($interval > 1){
						$status = "status_off";
				}
				if ($interval == 1) {
						$status = "status_away";
				}
				if ($interval == 0) {
						$status = "status_available";
				}
				if(isset($checkin_array[1])) $stats["checkin"] = $checkin_array[1];
		} else {
				$status = "status_off";
		}
		if (!isset($stats["checkin"])) $stats['checkin'] = "&nbsp;";
		$stats['status'] = $status;
		return $stats;
	}

	public function bestname(){
		if(empty($this->name)){
			return $this->nickname;
		} else {
			return $this->name;
		}
	}
}
