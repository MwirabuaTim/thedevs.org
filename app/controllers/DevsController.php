<?php

class DevsController extends BaseController {

	/**
	 * Dev Repository
	 *
	 * @var Dev
	 */
	protected $dev;

	public function __construct(User $dev)
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
	 * @param  int  $id
	 * @return Response
	 */
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
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Dev::$rules);

		if ($validation->passes())
		{
			$dev = $this->dev->find($id);
			$dev->update($input);

			return Redirect::route('devs.show', $id);
		}

		return Redirect::route('devs.edit', $id)
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
		$this->dev->find($id)->delete();

		return Redirect::route('devs.index');
	}

}
