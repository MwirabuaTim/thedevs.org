<?php

class KitsController extends BaseController {

	/**
	 * Kit Repository
	 *
	 * @var Kit
	 */
	protected $kit;

	public function __construct(Kit $kit)
	{
		$this->kit = $kit;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$kits = $this->kit->all();

		return View::make('kits.index', compact('kits'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('kits.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Kit::$rules);

		if ($validation->passes())
		{
			$this->kit->create($input);

			return Redirect::route('kits.index');
		}

		return Redirect::route('kits.create')
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
		$kit = $this->kit->findOrFail($id);

		return View::make('kits.show', compact('kit'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kit = $this->kit->find($id);

		if (is_null($kit))
		{
			return Redirect::route('kits.index');
		}

		return View::make('kits.edit', compact('kit'));
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
		$validation = Validator::make($input, Kit::$rules);

		if ($validation->passes())
		{
			$kit = $this->kit->find($id);
			$kit->update($input);

			return Redirect::route('kits.show', $id);
		}

		return Redirect::route('kits.edit', $id)
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
		$this->kit->find($id)->delete();

		return Redirect::route('kits.index');
	}

}
