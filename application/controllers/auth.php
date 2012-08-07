<?php

class Auth_Controller extends Base_Controller {

	public function action_session($provider) {
		Bundle::start('laravel-oauth2');
		$allowed_users = Config::get('morningcheckin.allowed_users');
		$provider = OAuth2::provider($provider, array(
			'id' => Config::get('auth.github_id'),
			'secret' => Config::get('auth.github_secret'),
		));

		if ( ! isset($_GET['code']))
		{
			// By sending no options it'll come back here
			return $provider->authorize();
		}
		else
		{
			// Howzit?
			try
			{
				$params = $provider->access($_GET['code']);

				$token = new OAuth2_Token_Access(array('access_token' => $params->access_token));
				$github_user = $provider->get_user_info($token);

				// Here you should use this information to A) look for a user B) help a new user sign up with existing data.
				// If you store it all in a cookie and redirect to a registration page this is crazy-simple.
				if (empty($allowed_users) || in_array($github_user["nickname"],$allowed_users)){
					$user = User::where('nickname', '=', $github_user["nickname"])
										->where('token', '=', $params->access_token)
										->first();

					if (!$user) {
						$user = User::create(array('nickname' => $github_user["nickname"],
																		 'email' => $github_user["email"],
																		 'name' => $github_user["name"],
																		 'token' => $params->access_token));
					}

					Auth::login($user->id);

					return Redirect::back();
				} else {
					return Redirect::to('/')->with('error','Sorry - you are not authorized to use this application');
				}

			}

			catch (OAuth2_Exception $e)
			{
				return Redirect::to('/')->with('error','Sorry - you are not authorized to use this application');
			}

		}
	}  

	public function action_logout() {
		Auth::logout();
		return Redirect::back();
	}

}
