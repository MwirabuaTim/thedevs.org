<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Pain-killer:(removing trailing slashes from urls)

Route::get('{any}', function($url){
    return Redirect::to(mb_substr($url, 0, -1), 301);
})->where('any', '(.*)\/$');

/*
|--------------------------------------------------------------------------
| View Rights - Enforcing authorized access only
|--------------------------------------------------------------------------
|
*/

Route::get('{resource}/{id}', function($resource, $id){  //edit rights bro
	$record =  All::getRecord($resource, $id);
	// return var_dump($record->public);
	// if($record->public != 'on'){ //!test public effect first
	// 	if(!All::hasEditRight($record)){
	// 		return View::make('error.403');
	// 	}
	// }
	$record_name = strtolower(All::getModel($resource));
	return View::make($resource.'.show')->with($record_name, $record);

})->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Edit Rights
|--------------------------------------------------------------------------
|
*/

Route::get('{resource}/{id}/edit', function($resource, $id){  //edit rights bro
	$record =  All::getRecord($resource, $id);
	// return var_dump($record);
	if(!isset($record)){ //!test for empty records
		return View::make('error.404');
	}
	else if($resource != 'devs'){
		if(!All::hasEditRight($record)){
			return View::make('error.403');
		}
	}
	$record_name = strtolower(All::getModel($resource));

	return View::make($resource.'.edit')->with($record_name, $record);
	// return var_dump(Story::find(3)->id);
	// return var_dump(All::getModel($resource));
	// return var_dump($record->id);

})->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Delete Rights
|--------------------------------------------------------------------------
|

*/

Route::get('{resource}/{id}/delete', function($resource, $id){
	// $this->$resource->find($id)->delete();
	$record = All::getRecord($resource, $id);
	$record->status = 'deleted';
	$record->save();
	return $record;
});


//Static Pages
//-------------------------------------------------------------------------

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::get('home', 'HomeController@getHome');
Route::get('howitworks', function(){ return View::make('howitworks');});
Route::get('privacy', function(){ return View::make('privacy');});
Route::get('tos', function(){ return View::make('tos');});
Route::get('customerservice', function(){ return View::make('customerservice');});
Route::get('template', function(){return View::make('template');});
Route::get('contactus', function(){ return View::make('contactus');});
// Route::get('contactus', array('as' => 'contact-us', 'uses' => function(){ return View::make('contactus');}));


//Popup makers
//-------------------------------------------------------------------------

Route::get('/orgs/createpop', function(){return View::make('orgs/create_plain');});
Route::get('/projects/createpop', function(){return View::make('projects/create_plain');});
Route::get('/eventts/createpop', function(){return View::make('eventts/create_plain');});
Route::get('/stories/createpop', function(){return View::make('stories/create_plain');});

/*
|--------------------------------------------------------------------------
| Resources
|--------------------------------------------------------------------------
|
*/

Route::resource('orgs', 'OrgsController');

Route::resource('eventts', 'EventtsController');

Route::resource('projects', 'ProjectsController');

Route::resource('stories', 'StoriesController');

Route::resource('kits', 'KitsController');

Route::resource('tags', 'TagsController');

Route::resource('mydatatypes', 'MydatatypesController');


/*
|--------------------------------------------------------------------------
| The API
|--------------------------------------------------------------------------
|
|
|
*/
// Route::get('api/orgs', function(){ return Response::json(['orgs'=> json_decode(Org::all())]);});
// Route::get('api/devs', function(){ return Response::json(['devs'=> json_decode(Dev::all())]);});
// Route::get('api/projects', function(){ return Response::json(['projects'=> json_decode(Project::all())]);});
// Route::get('api/eventts', function(){ return Response::json(['eventts'=> json_decode(Eventt::all())]);});
// Route::get('api/stories', function(){ return Response::json(['stories'=> json_decode(Story::all())]);});


// Route::get('api/devs', function(){ return Dev::all();});
// Route::get('api/orgs', function(){ return Org::all();});
// Route::get('api/projects', function(){ return Project::all();});
// Route::get('api/eventts', function(){ return Eventt::all();});
// Route::get('api/stories', function(){ return Story::all();});


Route::get('api/all', 'APIController@getAllRecords');
// Route::get('api/all', 'APIController@getRandomRecords');
// Route::get('api/all', 'APIController@getLatestRecords');
Route::get('api/get-bounds', 'APIController@getCoveredRecords');
Route::get('api/{path}', 'APIController@getModelRecords', compact('path'));

Route::get('api/{resource}/{id}', function($resource, $id){ 
	$record = All::getRecord($resource, $id);
	$record->top_path = $resource;
	return $record;
})->where('id', '[0-9]+');

Route::get('api/{resource}/{id}/edit', function($resource, $id){ 
	$record = All::getRecord($resource, $id);
	$record->top_path = $resource;
	return $record;
})->where('id', '[0-9]+');


/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
*/

Route::resource('devs', 'DevsController');

Route::resource('profiles', 'ProfilesController');

Route::get('account', array('as' => 'account', 'uses' => 'DevsController@getAccount'));

# Change Email
Route::get('change-email', array('as' => 'change-email', 'uses' => 'AuthorizedController@getChangeEmail'));
Route::post('change-email', 'AuthorizedController@postChangeEmail');

# Change Password
Route::get('change-password', array('as' => 'change-password', 'uses' => 'AuthorizedController@getChangePass'));
Route::post('change-password', 'AuthorizedController@postChangePass');

// indexByDev()
Route::get('devs/{id}/orgs', 'OrgsController@indexByDev', compact('id'))->where('id', '[0-9]+');
Route::get('devs/{id}/eventts', 'EventtsController@indexByDev', compact('id'))->where('id', '[0-9]+');
Route::get('devs/{id}/projects', 'ProjectsController@indexByDev', compact('id'))->where('id', '[0-9]+');
Route::get('devs/{id}/stories', 'StoriesController@indexByDev', compact('id'))->where('id', '[0-9]+');
Route::get('devs/{id}/kits', 'KitsController@indexByDev', compact('id'))->where('id', '[0-9]+');
Route::get('devs/{id}/tags', 'TagsController@indexByDev', compact('id'))->where('id', '[0-9]+');


/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
*/

Route::group(array('prefix' => 'auth'), function()
{

	# Login
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');
	Route::get('facebook', 'OauthController@session');
	Route::get('twitter', 'OauthController@session');
	Route::get('google', 'OauthController@session');
	Route::get('github', 'OauthController@session');
	Route::get('stackexchange', 'OauthController@session');

	# Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	# Account Activation
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	# Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	# Forgot Password Confirmation
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});


/*
|--------------------------------------------------------------------------
| Administration
|--------------------------------------------------------------------------
|
*/
Route::group(array('prefix' => 'admin'), function()
{

	# User Management
	Route::group(array('prefix' => 'users'), function()
	{
		Route::get('/', array('as' => 'users', 'uses' => 'Controllers\Admin\UsersController@getIndex'));
		Route::get('create', array('as' => 'create/user', 'uses' => 'Controllers\Admin\UsersController@getCreate'));
		Route::post('create', 'Controllers\Admin\UsersController@postCreate');
		Route::get('{userId}/edit', array('as' => 'update/user', 'uses' => 'Controllers\Admin\UsersController@getEdit'));
		Route::post('{userId}/edit', 'Controllers\Admin\UsersController@postEdit');
		Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'Controllers\Admin\UsersController@getDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'Controllers\Admin\UsersController@getRestore'));
	});

	# Group Management
	Route::group(array('prefix' => 'groups'), function()
	{
		Route::get('/', array('as' => 'groups', 'uses' => 'Controllers\Admin\GroupsController@getIndex'));
		Route::get('create', array('as' => 'create/group', 'uses' => 'Controllers\Admin\GroupsController@getCreate'));
		Route::post('create', 'Controllers\Admin\GroupsController@postCreate');
		Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'Controllers\Admin\GroupsController@getEdit'));
		Route::post('{groupId}/edit', 'Controllers\Admin\GroupsController@postEdit');
		Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'Controllers\Admin\GroupsController@getDelete'));
		Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'Controllers\Admin\GroupsController@getRestore'));
	});

	# Dashboard
	Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@getIndex'));
});




/*
|--------------------------------------------------------------------------
| Sandbox: Just Kidding around below here...
|--------------------------------------------------------------------------
|
*/


// Route::get('sandbox', function(){ 

	// $update = array('video' => 'new video ');
	// $update['first_name'] = 'new name';
	// $update['last_name'] = '';
	// User::find(1)->update($update);
	// return User::find(1);

	// echo '<br/>'.(isset($update['last_name']) ? 'last_name isset as '.$update['last_name'] : 'last_name isnt set');
	// echo '<br/>'.(is_null($update['last_name']) ? 'last_name is_null as '.$update['last_name'] : 'last_name isnt null');
	
	// return User::first();
	// Route::get('api/devs', function(){ return Dev::all();});


// });

// Route::get('/users', 'UserController@index');
// Route::get('/users/create', 'UserController@create');
// Route::post('/users', 'UserController@store');
// Route::get('/users/{id}', 'UserController@show');
// Route::get('/users{id}/edit', 'UserController@edit');
// Route::put('/users', 'UserController@update');
// Route::delete('/users', 'UserController@destroy');

// getIndex()
// getCreate()
// postCreate()
// getEdit($id)
// postEdit($id)
// getDelete($id)
// getRestore($id)
