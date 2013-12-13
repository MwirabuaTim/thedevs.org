<?php

class StoriesController extends BaseController {

	/**
	 * Story Repository
	 *
	 * @var Story
	 */
	protected $story;

	public function __construct(Story $story)
	{
		$this->story = $story;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stories = $this->story->all();

		return View::make('stories.index', compact('stories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('stories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Story::$rules);

		if ($validation->passes())
		{
			$this->story->create($input);

			return Redirect::route('stories.index');
		}

		return Redirect::route('stories.create')
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
		$story = $this->story->findOrFail($id);

		return View::make('stories.show', compact('story'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$story = $this->story->find($id);

		if (is_null($story))
		{
			return Redirect::route('stories.index');
		}

		return View::make('stories.edit', compact('story'));
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
		$validation = Validator::make($input, Story::$rules);

		if ($validation->passes())
		{
			$story = $this->story->find($id);
			$story->update($input);

			return Redirect::route('stories.show', $id);
		}

		return Redirect::route('stories.edit', $id)
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
		$this->story->find($id)->delete();

		return Redirect::route('stories.index');
	}

}
