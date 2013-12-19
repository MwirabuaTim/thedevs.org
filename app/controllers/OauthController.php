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
			// $profile->description = $data['description'];
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
			// $user = Sentry::findUserById($user->id);
			// $user = Sentry::findUserByLogin($data['email']);

			// Log the user in
			// Sentry::login($user, false);

			// $credentials = array(
			// 	'email' => $user['email'], 
			// 	'deleted_at' => null,
			// );
			// return var_dump($credentials['email']);
			// Sentry::authenticate($credentials, false);
			// $user = User::where('email', $data['email'])->first();
			// $x = $user->update($data);
			// $x = User::find($user->id)->update($data);
			// return var_dump('updating user: </br>'.$x);

			
		}
		else { // no user, register one
			$user = new User;
			$user->email = $data['email'];
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->pic = $data['pic'];
			$user->elevator = $data['description'];
			// $user->about = $data['description'];
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
	public function createUser($user, $token){

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('oauths.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('oauths.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('oauths.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('oauths.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}






}
