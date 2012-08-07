<?php

class Checkin extends Eloquent {
	public static $timestamps = true;
	public static $key = 'id';

	public function user() {
		return $this->belongs_to('User');
	}

	public function parsed_checkin() {
	 Bundle::start('sparkdown');
	 //strip out the "Flags" header if we don't have any flags
	 $trimmed = rtrim($this->checkintext);
	 $pattern = '/##Flags$/';
	 $cleanFlags = preg_replace($pattern, '', $trimmed);
	 $text = Sparkdown\Markdown($cleanFlags);
	 return $text;
	}
}

Event::listen('eloquent.saving: Checkin', function($checkin) {
	$pattern = '/([\r\n]+)([^\s#\-\*]+)/';

	if (preg_match($pattern, $checkin->checkintext)){
		$checkin->checkintext = preg_replace($pattern, "$1- $2", $checkin->checkintext);		
	}
});

Event::listen('eloquent.saved: Checkin', function($checkin) {
	$checkin->user->touch();
});
