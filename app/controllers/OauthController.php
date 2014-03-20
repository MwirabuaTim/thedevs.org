<?php

use OAuth2\OAuth2;
use OAuth2\Token_Access;
use OAuth2\Exception as OAuth2_Exception;

class OauthController extends BaseController {



	public function session()
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
	    if(Request::segment(2) == 'github'){
	    	$provider = OAuth2::provider('github', array(
	        'id' => '67d050b4c06ad12d95be',
	        'secret' => '4a03507448e3ffd9904eaa7b6fc7d3d75c373739',
			'scope' => 'user:email' //read access for all scope
	   		));
	    }

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

	            // return Response::json($data);
	            return $data['email'];
	            return User::where('email', $data['email'])->first();
	            // return Profile::where('uid', $data['uid'])->first();
	
	            $user_id = $this->checkAndSave($data);
	            if ($user_id == false){
					return Redirect::back()->with('error', 'Your email was not public. Please join with another provider.');
					//return Response::json(array());
				}
	        }

	        catch (OAuth2_Exception $e)
	        {
	            show_error('That didnt work: '.$e);
	        }
	    }

        // return Redirect::to('auth/signin')->with('oauth', $data);
        // return Response::json(array('success' => Lang::get('auth/message.signin.success')));
        // return Redirect::to('devs/'.$user_id);
        // return Redirect::back(); //breaks some times

		//check for any pending posts and assign then to the signed in user
		$redirect = All::completePosting();
		$redirect = !empty($redirect) ? $redirect : Session::get('loginRedirect', 'account');
        return Redirect::to($redirect); // so you can complete creating the post you were creating. temp solutin
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

		$profile = Profile::where('uid', $data['uid'])->first();
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
			$user_update['first_name'] = $user['first_name'] != '' ? $user_update['first_name'] : $data['username']; //case git
			$user_update['last_name'] = $data['last_name'] != '' ? $data['last_name'] : $user['last_name']; 
			$user_update['email'] = $data['email'] != ''? $data['email'] : $user['email']; 
			$user_update['pic'] = $data['pic'] != '' ? $data['pic'] : $user['pic']; 
			$user_update['pic'] = $user['pic'] != '' ? $user['pic'] : $user_update['pic']; //no need to update
			$user_update['location'] = $data['location'] != '' ? $data['location'] : $user['location']; 
			$user_update['elevator'] = substr($data['about'], 100) != '' ? '' : $data['about']; //elevator must not > 100
			$user_update['elevator'] = $user['elevator'] != '' ? $user['elevator'] : $user_update['elevator']; //no need to update
			$user_update['about'] = $user['about'] != '' ? $user['about'] : $data['about']; //no need to update

			User::find($user->id)->update($user_update);

			
		}
		elseif(empty($data['email'])){
			return false;

		}else { // no user, register onesubstr($data['about'], 100) != '' ? '' : $data['about'];
			$user = new User;
			$user->email = $data['email'];
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->pic = $data['pic'];
			$user->elevator = substr($data['about'], 100) != '' ? '' : $data['about'];
			$user->about = substr($data['about'], 100) != '' ? $data['about'] : '';
			$user->location = $data['location'];
			$user->public = 'on';
			$user->activated = 1;
			return 'trying to create user: </br>'.var_dump($user);
			$user->save();

		}

		$user_interface = Sentry::findUserById($user->id);
		Sentry::login($user_interface, false);
		return $user->id;
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
