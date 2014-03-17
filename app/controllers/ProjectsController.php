<?php

class ProjectsController extends BaseController {

	/**
	 * Project Repository
	 *
	 * @var Project
	 */
	protected $project;

	public function __construct(Project $project)
	{
		$this->project = $project;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = $this->project->orderBy('updated_at', 'desc')->paginate(10);

		return View::make('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Project::$rules);

		if ($validation->passes())
		{
			
			return $this->project->create($input)->id;
			
			// return Redirect::route('projects.show', $id);
		}

		return Redirect::route('projects.create')
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
		$project = $this->project->findOrFail($id);

		if(All::checkViewRight($project)):
  			return All::checkViewRight($project);
  		endif;
		
		return View::make('projects.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = $this->project->find($id);

		if (is_null($project))
		{
			return Redirect::route('projects.index');
		}
		if(!All::hasEditRight($project)){
 			return View::make('error.403');
		}

		return View::make('projects.edit', compact('project'));
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
		// return var_dump($input);
		if (Input::hasFile('logo')) {
			$file            = Input::file('logo');
			$destinationPath = public_path().'/uploads/project-logos/';
			$imagename        = str_random(6) . '_' . $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $imagename);
			$input['logo'] = '/uploads/project-logos/'.$imagename;
		}
		$input['logo'] = $input['logo'] ? $input['logo'] : All::getImage($this->project->find($id)); //removing erroneous nullity
		
		$validation = Validator::make($input, Project::$rules);

		if ($validation->passes())
		{
			$project = $this->project->find($id);
			$project->update($input);

			return Redirect::route('projects.show', $id);
		}

		return Redirect::route('projects.edit', $id)
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
		$this->project->find($id)->delete();

		return Redirect::route('projects.index');
	}

}
