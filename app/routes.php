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
Route::get('sandbox', function(){ 
	
	return User::first();
	// Route::get('api/devs', function(){ return Dev::all();});

});

//removing trailing slashes from urls
Route::get('{any}', function($url){
    return Redirect::to(mb_substr($url, 0, -1), 301);
})->where('any', '(.*)\/$');


Route::get('/', function()
{
	return View::make('home');
});
Route::get('/orgs/createpop', function(){return View::make('orgs/create_plain');});
Route::get('/projects/createpop', function(){return View::make('projects/create_plain');});
Route::get('/eventts/createpop', function(){return View::make('eventts/create_plain');});
Route::get('/stories/createpop', function(){return View::make('stories/create_plain');});

// Route::resource('devs', 'DevsController');

Route::resource('projects', 'ProjectsController');

Route::resource('orgs', 'OrgsController');

Route::resource('eventts', 'EventtsController');

Route::resource('stories', 'StoriesController');

Route::resource('kits', 'KitsController');

Route::resource('tags', 'TagsController');

Route::resource('profiles', 'ProfilesController');

Route::get('howitworks', function(){ return View::make('howitworks');});
Route::get('privacy', function(){ return View::make('privacy');});
Route::get('tos', function(){ return View::make('tos');});
Route::get('customerservice', function(){ return View::make('customerservice');});
Route::get('template', function(){return View::make('template');});
Route::get('contactus', function(){ return View::make('contactus');});


//The API:
// Route::get('api/orgs', function(){ return Response::json(['orgs'=> json_decode(Org::all())]);});
// Route::get('api/devs', function(){ return Response::json(['devs'=> json_decode(Dev::all())]);});
// Route::get('api/projects', function(){ return Response::json(['projects'=> json_decode(Project::all())]);});
// Route::get('api/eventts', function(){ return Response::json(['eventts'=> json_decode(Eventt::all())]);});
// Route::get('api/stories', function(){ return Response::json(['stories'=> json_decode(Story::all())]);});


Route::get('api/devs', function(){ return Dev::all();});
Route::get('api/orgs', function(){ return Org::all();});
Route::get('api/projects', function(){ return Project::all();});
Route::get('api/eventts', function(){ return Eventt::all();});
Route::get('api/stories', function(){ return Story::all();});
Route::get('api/all', function(){ 
	$sources = array(
		Org::all(),
		Project::all(),
		Eventt::all(),
		Story::all()
		);
	$i = 0;
	$sources_array = array();
	foreach ($sources as $source) {
		$source_array[$i] = json_decode($source, TRUE);
		$i+=1;
	}
	// return Response::json(Org::all());
	// return json_decode(Org::all());
	// return Org::all();
	return var_dump(Org::all());

	// $source_array = json_decode($source, TRUE);
	// var_dump($sources);
	// return Org::all();
});

// Route::get('{resource}/{id}/delete', function($resource, $id){
// 		var_dump($resource.'/'.$id);
// 		// $this->$resource->find($id)->delete();
// 		return Redirect::to($url, $status, $https);
// 		Redirect::to_action($action, $parameters, $status);
// 	}
// });



Route::group(array('prefix' => 'admin'), function()
{

	# Blog Management
	Route::group(array('prefix' => 'blogs'), function()
	{
		Route::get('/', array('as' => 'blogs', 'uses' => 'Controllers\Admin\BlogsController@getIndex'));
		Route::get('create', array('as' => 'create/blog', 'uses' => 'Controllers\Admin\BlogsController@getCreate'));
		Route::post('create', 'Controllers\Admin\BlogsController@postCreate');
		Route::get('{blogId}/edit', array('as' => 'update/blog', 'uses' => 'Controllers\Admin\BlogsController@getEdit'));
		Route::post('{blogId}/edit', 'Controllers\Admin\BlogsController@postEdit');
		Route::get('{blogId}/delete', array('as' => 'delete/blog', 'uses' => 'Controllers\Admin\BlogsController@getDelete'));
		Route::get('{blogId}/restore', array('as' => 'restore/blog', 'uses' => 'Controllers\Admin\BlogsController@getRestore'));
	});

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
	Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\Admin\DashboardController@getIndex'));

});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
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
	// Route::post('facebook', 'OauthController@session')->with('provider', 'facebook');

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
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'account'), function()
{

	# Account Dashboard
	Route::get('/', array('as' => 'account', 'uses' => 'Controllers\Account\DashboardController@getIndex'));

	# Profile
	Route::get('profile', array('as' => 'profile', 'uses' => 'Controllers\Account\ProfileController@getIndex'));
	Route::post('profile', 'Controllers\Account\ProfileController@postIndex');

	# Change Password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'Controllers\Account\ChangePasswordController@getIndex'));
	Route::post('change-password', 'Controllers\Account\ChangePasswordController@postIndex');

	# Change Email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'Controllers\Account\ChangeEmailController@getIndex'));
	Route::post('change-email', 'Controllers\Account\ChangeEmailController@postIndex');

});

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

Route::get('about-us', function()
{
	//
	return View::make('frontend/about-us');
});


Route::get('contact-us', array('as' => 'contact-us', 'uses' => 'ContactUsController@getIndex'));
Route::post('contact-us', 'ContactUsController@postIndex');

Route::get('blog/{postSlug}', array('as' => 'view-post', 'uses' => 'BlogController@getView'));
Route::post('blog/{postSlug}', 'BlogController@postView');

Route::get('/', array('as' => 'home', 'uses' => 'BlogController@getIndex'));


Route::get('/devs', 'DevsController@index');
Route::get('/devs/{id}', 'DevsController@show', compact('id'))->where('id', '[0-9]+');
Route::get('/dev/{id}', function($id)
{
	return Redirect::to(URL::to('devs/'.$id));
});


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
