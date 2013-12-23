<?php

class MydatatypesController extends BaseController {

	/**
	 * Mydatatype Repository
	 *
	 * @var Mydatatype
	 */
	protected $mydatatype;

	public function __construct(Mydatatype $mydatatype)
	{
		$this->mydatatype = $mydatatype;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mydatatypes = $this->mydatatype->all();

		return View::make('mydatatypes.index', compact('mydatatypes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('mydatatypes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Mydatatype::$rules);

		if ($validation->passes())
		{
			$this->mydatatype->create($input);

			return Redirect::route('mydatatypes.index');
		}

		return Redirect::route('mydatatypes.create')
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
		$mydatatype = $this->mydatatype->findOrFail($id);

		return View::make('mydatatypes.show', compact('mydatatype'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mydatatype = $this->mydatatype->find($id);

		if (is_null($mydatatype))
		{
			return Redirect::route('mydatatypes.index');
		}

		return View::make('mydatatypes.edit', compact('mydatatype'));
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
		$validation = Validator::make($input, Mydatatype::$rules);

		if ($validation->passes())
		{
			$mydatatype = $this->mydatatype->find($id);
			$mydatatype->update($input);

			return Redirect::route('mydatatypes.show', $id);
		}

		return Redirect::route('mydatatypes.edit', $id)
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
		$this->mydatatype->find($id)->delete();

		return Redirect::route('mydatatypes.index');
	}

}
