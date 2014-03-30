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
| The API
|--------------------------------------------------------------------------
|
|
|
*/
// Route::get('orgs/api', function(){ return Response::json(['orgs'=> json_decode(Org::all())]);});
// Route::get('devs/api', function(){ return Response::json(['devs'=> json_decode(Dev::all())]);});
// Route::get('projects/api', function(){ return Response::json(['projects'=> json_decode(Project::all())]);});
// Route::get('eventts/api', function(){ return Response::json(['eventts'=> json_decode(Eventt::all())]);});
// Route::get('stories/api', function(){ return Response::json(['stories'=> json_decode(Story::all())]);});


// Route::get('api', function(){ return All::getRandomRecords(); });
// Route::get('api', function(){ return All::getLatestRecords(); });
Route::get('api', function(){ return All::getAllRecords(); });
Route::post('api', function(){ return All::getCoveredRecords(); });
Route::get('api/search', function(){ return All::ajaxByLetters(); });
Route::get('{path}/api', function($path){ return All::getModelRecords($path); });

Route::get('{resource}/{id}/api', function($resource, $id){ 
	return All::getRecord($resource, $id);
})->where('id', '[0-9]+');

Route::get('{resource}/{id}/edit/api', function($resource, $id){ 
	return All::getRecord($resource, $id);
})->where('id', '[0-9]+');

Route::get('devs/{id}/api/github', function($id){ 
	$user = User::find($id);
	return All::getGitStats($user);
})->where('id', '[0-9]+');


/*
|--------------------------------------------------------------------------
| Delete Via Get Request
|--------------------------------------------------------------------------
|

*/

Route::get('{resource}/{id}/delete', function($resource, $id){
	// $record = All::getRecord($resource, $id); //formats and returns json hence cant be deleted as an object
	$model = All::getModel($resource);
	$record =  $model::find($id);//queries db
	if(All::hasEditRight($record)):
		$record->delete();
		return Redirect::route($resource.'.index');
	endif;
	return var_dump('no rights!');
})->where('id', '[0-9]+');


//Static Pages
//-------------------------------------------------------------------------

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::get('home', 'HomeController@getHome');

Route::get('concept', function(){ 
	$document = Document::first();
	$footer  = false;
	return View::make('layouts.documents', compact('document', 'footer'));
});
Route::get('about', function(){ 
	$document = Document::find(2);
	$footer  = true;
	return View::make('layouts.documents', compact('document', 'footer'));
});
Route::get('howitworks', function(){ 
	$document = Document::find(3);
	$footer  = true;
	return View::make('layouts.documents', compact('document', 'footer'));
});
Route::get('tos', function(){ 
	$document = Document::find(4);
	$footer  = true;
	return View::make('layouts.documents', compact('document', 'footer'));
});
Route::get('privacy', function(){ 
	$document = Document::find(5);
	$footer  = true;
	return View::make('layouts.documents', compact('document', 'footer'));
});

Route::get('contactus', function(){ return View::make('contactus');});
Route::post('contactus', 'ContactUsController@gmail');
// Route::get('contactus', array('as' => 'contact-us', 'uses' => function(){ return View::make('contactus');}));

//Popup makers
//-------------------------------------------------------------------------

Route::get('/orgs/createpop', function(){return View::make('orgs/createpop');});
Route::get('/projects/createpop', function(){return View::make('projects/createpop');});
Route::get('/eventts/createpop', function(){return View::make('eventts/createpop');});
Route::get('/stories/createpop', function(){return View::make('stories/createpop');});

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

Route::resource('documents', 'DocumentsController');
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
Route::get('postmark', function(){ 

$msg['name'] = 'timo';
	Mail::send('emails.contactz', $msg, function($m)
	{
        // $m->from(array('info@afya.org' => 'Timothy M'));
        $m->from(array('info@thedevs.org' => 'TheDevs Organisation'));
        // $m->to(array('info@thedevs.org' => 'TheDevs Organisation'));  
        $m->to(array('techytimo@gmail.com' => 'Timothy Mwirabua'));    
        $m->subject("subject here"); 
        $m->setBody('body here'); 

	});

    return 'sent';
});

Route::get('sandbox', function(){ 
	$path = Request::path();
	$r=  All::getModelRecords('devs');

	// return View::make('hello');
	return All::getAllRecords();
	// return count($r);
	// return var_dump(Sentry::getUser()->hasAccess('admin'));
	// return var_dump(All::getCreator(Document::first()));
	// $update = array('video' => 'new video ');
	// $update['first_name'] = 'new name';
	// $update['last_name'] = '';
	// User::find(1)->update($update);
	// return User::find(1);

	// echo '<br/>'.(!empty($update['last_name']) ? 'last_name isset as '.$update['last_name'] : 'last_name isnt set');
	// echo '<br/>'.(is_null($update['last_name']) ? 'last_name is_null as '.$update['last_name'] : 'last_name isnt null');
	
	// return stripos($path, 'cd');
	// return substr($path, 0, 7);
	// $x = stripos($path, '/');
	// $y = substr($path, 0, $x);
	// $z = substr($path, $x+1, strlen($path));
	// return empty($x) ? ucwords($path) : $z;

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
