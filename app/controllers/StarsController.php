<?php

class StarsController extends BaseController {

	/**
	 * Star Repository
	 *
	 * @var Star
	 */
	protected $star;

	public function __construct(Star $star)
	{
		$this->star = $star;
	}
	public function give(){
		$input = Input::all();
		$input['giver']= Sentry::getUser()->id;
		$exists = Stars::where('giver', Sentry::getUser()->id)->where('recipient', $input['recipient']);
		if($exists->count()):
			$exists->first()->update($input);
		else:
			Stars::create($input);
		endif;
		return Response::json(array('success'=>true));

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stars = $this->star->all();

		return View::make('stars.index', compact('stars'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('stars.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($count)
	{
		$input = Input::all();
		$validation = Validator::make($input, Star::$rules);

		if ($validation->passes())
		{
			$this->star->create($input);

			return Redirect::route('stars.index');
		}

		return Redirect::route('stars.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$star = $this->star->findOrFail($id);

		return View::make('stars.show', compact('star'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$star = $this->star->find($id);

		if (is_null($star))
		{
			return Redirect::route('stars.index');
		}

		return View::make('stars.edit', compact('star'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Star::$rules);

		if ($validation->passes())
		{
			$star = $this->star->find($id);
			$star->update($input);

			return Redirect::route('stars.show', $id);
		}

		return Redirect::route('stars.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->star->find($id)->delete();

		return Redirect::route('stars.index');
	}

}
