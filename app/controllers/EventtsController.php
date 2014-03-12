<?php

class EventtsController extends BaseController {

	/**
	 * Eventt Repository
	 *
	 * @var Eventt
	 */
	protected $eventt;

	public function __construct(Eventt $eventt)
	{
		$this->eventt = $eventt;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$eventts = $this->eventt->orderBy('created_at', 'desc')->paginate(15);

		return View::make('eventts.index', compact('eventts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('eventts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Eventt::$rules);

		if ($validation->passes())
		{
			$this->eventt->create($input);

			return Redirect::route('eventts.index');
		}

		return Redirect::route('eventts.create')
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
		$eventt = $this->eventt->findOrFail($id);
		
		if(All::checkViewRight($eventt)):
			return All::checkViewRight($eventt);
		endif;

		return View::make('eventts.show', compact('eventt'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$eventt = $this->eventt->find($id);

		if (is_null($eventt))
		{
			return Redirect::route('eventts.index');
		}
		if(!All::hasEditRight($eventt)){
 			return View::make('error.403');
		}

		return View::make('eventts.edit', compact('eventt'));
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
		$validation = Validator::make($input, Eventt::$rules);

		if ($validation->passes())
		{
			$eventt = $this->eventt->find($id);
			$eventt->update($input);

			return Redirect::route('eventts.show', $id);
		}

		return Redirect::route('eventts.edit', $id)
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
		$this->eventt->find($id)->delete();

		return Redirect::route('eventts.index');
	}

}
