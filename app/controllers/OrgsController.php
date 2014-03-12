<?php

class OrgsController extends BaseController {

	/**
	 * Org Repository
	 *
	 * @var Org
	 */
	protected $org;

	public function __construct(Org $org)
	{
		$this->org = $org;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orgs = $this->org->orderBy('created_at', 'desc')->paginate(15);

		return View::make('orgs.index', compact('orgs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orgs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		// return json_decode({'success': true});
		$validation = Validator::make($input, Org::$rules);

		if ($validation->passes())
		{
			$this->org->create($input);

			return Redirect::route('orgs.index');
		}

		return Redirect::route('orgs.create')
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
		$org = $this->org->findOrFail($id);
		
		if(All::checkViewRight($org)):
			return All::checkViewRight($org);
		endif;

		return View::make('orgs.show', compact('org'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$org = $this->org->find($id);

		if (is_null($org))
		{
			return Redirect::route('orgs.index');
		}
		if(!All::hasEditRight($org)){
 			return View::make('error.403');
		}

		return View::make('orgs.edit', compact('org'));
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
			$destinationPath = public_path().'/uploads/org-logos/';
			$imagename        = str_random(6) . '_' . $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $imagename);
			$input['logo'] = '/uploads/org-logos/'.$imagename;
		}
		$input['logo'] = $input['logo'] ? $input['logo'] : All::getImage($this->org->find($id)); //removing erroneous nullity
		
		$validation = Validator::make($input, Org::$rules);

		if ($validation->passes())
		{
			$org = $this->org->find($id);
			$org->update($input);

			return Redirect::route('orgs.show', $id);
		}

		return Redirect::route('orgs.edit', $id)
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
		$this->org->find($id)->delete();

		return Redirect::route('orgs.index');
	}

}
