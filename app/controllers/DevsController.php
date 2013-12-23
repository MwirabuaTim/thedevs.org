<?php

class DevsController extends BaseController {

	/**
	 * Dev Repository
	 *
	 * @var Dev
	 */
	protected $dev;

	public function __construct(User $dev) //the only joint between Dev and User
	{
		$this->dev = $dev;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$devs = $this->dev->all();

		return View::make('devs.index', compact('devs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('devs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Dev::$rules);

		if ($validation->passes())
		{
			$this->dev->create($input);

			return Redirect::route('devs.index');
		}

		return Redirect::route('devs.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * 
	 *
	 */
	public function getAccount()
	{
		$id = Sentry::getUser()->id;

		return Redirect::to('devs/'.$id);
	}

	public function show($id)
	{
		$dev = $this->dev->findOrFail($id);

		return View::make('devs.show', compact('dev'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * User edit profile page.
	 *
	 * @return View
	 */
	public function edit($id)
	{
		$dev = $this->dev->find($id);

		if (is_null($dev))
		{
			return Redirect::route('devs.index');
		}

		return View::make('devs.edit', compact('dev'));
	}
	/**
	 * User profile form processing page.
	 *
	 * @return Redirect
	 */
	public function update($id)
	{
		// Declare the rules for the form validation
		$rules = array(
			'first_name' => 'required|min:2',
			'last_name'  => 'required|min:2',
			'email'   => 'email',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Grab the user
		$user = Sentry::getUser();

		// Update the user information
		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		// $user->email		= Input::get('email');
		$user->phone		= Input::get('phone');
		$user->pic		= Input::get('pic');
		$user->video		= Input::get('video');
		$user->elevator		= Input::get('elevator');
		$user->about		= Input::get('about');
		$user->location		= Input::get('location');
		$user->public		= Input::get('public');
		$user->notes		= Input::get('notes');



		$user->save();

		// Redirect to the settings page
		return Redirect::route('devs.show', $id)->with('success', 'Account successfully updated');
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function update($id)
	// {
	// 	$input = array_except(Input::all(), '_method');
	// 	$validation = Validator::make($input, Dev::$rules);

	// 	if ($validation->passes())
	// 	{
	// 		$dev = $this->dev->find($id);
	// 		$dev->update($input);

	// 		return Redirect::route('devs.show', $id);
	// 	}

	// 	return Redirect::route('devs.edit', $id)
	// 		->withInput()
	// 		->withErrors($validation)
	// 		->with('message', 'There were validation errors.');
	// }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->dev->find($id)->delete();

		return Redirect::route('devs.index');
	}

}
