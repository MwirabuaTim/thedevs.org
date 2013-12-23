<?php

use OAuth2\OAuth2;
use OAuth2\Token_Access;
use OAuth2\Exception as OAuth2_Exception;

class OauthController extends BaseController {



	public function oauth()
	{
	    if(Request::segment(2) == 'facebook'){
	    	$provider = OAuth2::provider('facebook', array(
	        'id' => '494491330565385',
	        'secret' => '1dd38781d55ed1825724e433ef1ce6e3',
	   		));
	    }
	    // if(Request::segment(2) == 'twitter'){
	    // 	$provider = OAuth2::provider('twitter', array(
	    //     'id' => '494491330565385',
	    //     'secret' => '1dd38781d55ed1825724e433ef1ce6e3',
	   	// 	));
	    // }
	    if(Request::segment(2) == 'google'){
	    	$provider = OAuth2::provider('google', array(
	        'id' => '406188381495-cil9u3fcb7jtu3hq2idinp3s92qvr8f6.apps.googleusercontent.com',
	        'secret' => 'ZOGyJqHOl5xMfGVQ-wTInqUs',
	   		));
	    }
	    // if(Request::segment(2) == 'github'){
	    // 	$provider = OAuth2::provider('github', array(
	    //     'id' => '494491330565385',
	    //     'secret' => '1dd38781d55ed1825724e433ef1ce6e3',
	   	// 	));
	    // }
	    // if(Request::segment(2) == 'stackexchange'){
	    // 	$provider = OAuth2::provider('stackexchange', array(
	    //     'id' => '494491330565385',
	    //     'secret' => '1dd38781d55ed1825724e433ef1ce6e3',
	   	// 	));
	    // }
	    

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

	                $token = new Token_Access(array(
	                    'access_token' => $params->access_token
	                ));
	                $data = $provider->get_user_info($token);

	            // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
	            // If you store it all in a cookie and redirect to a registration page this is crazy-simple.

	            // return var_dump($data);
	         //    array(10) { 
	         //    	["first_name"]=> string(7) "Timothy" 
		        //     ["last_name"]=> string(8) "Mwirabua" 
		        //     ["username"]=> string(0) "" 
		        //     ["email"]=> string(19) "techytimo@gmail.com" 
		        //     ["uid"]=> string(21) "102781440230010907892" 
		        //     ["link"]=> string(45) "https://plus.google.com/102781440230010907892" 
		        //     ["location"]=> string(0) "" 
		        //     ["about"]=> string(0) "" 
		        //     ["pic"]=> string(92) "https://lh5.googleusercontent.com/-zUWNGKX5CAk/AAAAAAAAAAI/AAAAAAAABkQ/EVTWGvn6hIs/photo.jpg" 
		        //     ["code"]=> string(70) "ya29.1.AADtN_U_QB6R6ah5LrlRMzFuUv87s58kknaKM2242jZMH0INH5VknQmhe1Eg0CQ" 
		        // }
		        // 
	            $this->checkAndSave($data);
	        }

	        catch (OAuth2_Exception $e)
	        {
	            show_error('That didnt work: '.$e);
	        }
	    }

        // return Redirect::to('auth/signin')->with('oauth', $data);
        // return Response::json(array('success' => Lang::get('auth/message.signin.success')));
        return Redirect::home();
	}

	public function checkAndSave($data){
		// flow:
		// 	1. profile by uid?
		// 		yes > update profile
		// 		no > create profile

		// 	2. user account by email?
		// 		yes > update user
		// 		no > create user account

		// 	3. log in user

		$profile = Profile::where('uid', $data
			['uid'])->first();
		if (!empty($profile)) { //update profile
			$profile->provider = Request::segment(2);
			// $profile->first_name = $data['first_name'];
			// $profile->last_name = $data['last_name'];
			// $profile->username = $data['username'];
			// $profile->email = $data['email'];
			// $profile->uid = $data['uid'];
			// $profile->link = $data['link'];
			// $profile->location = $data['location'];
			// $profile->about = $data['about'];
			// $profile->pic = $data['pic'];
			// $profile->code = $data['code'];
			$profile->field1 = Input::get('code');
			// $profile->field2 = $data['field2'];
			// $profile->field3 = $data['field3'];
			// $profile->field4 = $data['field4'];
			// $profile->field5 = $data['field5'];
			$profile->update($data);
	    }
	    else{ // create profile
	    	$profile = new Profile();
		    $data['provider'] = Request::segment(2);
			$data['field1'] = Input::get('code');
			// $data->field2 = $data['field2'];
			// $data->field3 = $data['field3'];
			// $data->field4 = $data['field4'];
			// $data->field5 = $data['field5'];
	    	$x = $profile->insertGetId($data);
	    	// $x = $profile->create($data)->id;
	    	// return var_dump($x);
	    }

		if($user = User::where('email', $data['email'])->first()){
			// Find the user using the user id or e-mail
			//update user if we have new values

			$user_update['first_name'] = $data['first_name'] != '' ? $data['first_name'] : $user['first_name']; 
			$user_update['last_name'] = $data['last_name'] != '' ? $data['last_name'] : $user['last_name']; 
			$user_update['email'] = $data['email'] != ''? $data['email'] : $user['email']; 
			$user_update['pic'] = $data['pic'] != '' ? $data['pic'] : $user['pic']; 
			$user_update['location'] = $data['location'] != '' ? $data['location'] : $user['location']; 
			$user_update['about'] = $data['about'] != '' ? $data['about'] :$user['about'];

			$x = User::find($user->id)->update($user_update);

			
		}
		else { // no user, register one
			$user = new User;
			$user->email = $data['email'];
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->pic = $data['pic'];
			$user->elevator = $data['about'];
			// $user->about = $data['about'];
			$user->location = $data['location'];
			$user->activated = 1;
			// return var_dump('trying to create user: </br>'.$user);
			$user->save();		
		}
		$user_interface = Sentry::findUserById($user->id);
		Sentry::login($user_interface, false);
		// return var_dump(Sentry::getUser()->id);

		// $code = Input::get('code');
		// dd($code);
		// return var_dump($code);
	 //    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
	 
	 //    $uid = $user['uid'];
	 //    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');
	 
	 //    $data = $facebook->api('/me');
	 
	 //    dd($data);

	}

	

}
