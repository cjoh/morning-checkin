<?php

class OAuth2_Provider_Github extends OAuth2_Provider {

	public $name = 'github';

	// https://api.github.com

	public function url_authorize()
	{
		return 'https://github.com/login/oauth/authorize';
	}

	public function url_access_token()
	{
		return 'https://github.com/login/oauth/access_token';
	}

	public function get_user_info(OAuth2_Token_Access $token)
	{
		$url = 'https://api.github.com/user?'.http_build_query(array(
			'access_token' => $token->access_token,
		));

		$user = json_decode(file_get_contents($url), true);

		// Create a response from the request
		return array(
			'uid' => $user["id"],
			'nickname' => $user["login"],
			'name' => (isset($user["name"])) ? $user["name"] : "",
			'email' => (isset($user["email"])) ? $user["email"] : "",
			'urls' => array(
			  'GitHub' => 'http://github.com/'.$user["login"],
			  'Blog' => (isset($user["blog"])) ? $user["blog"] : "",
			),
		);
	}
}