<?php

class APIController extends BaseController {


	/**
	 * 
	 *
	 * 
	 */
	public function getModelRecords($path){
		$model = All::getModel($path);
		$records =  $model::all();
		$records->last()->latest = 'Latest '.$model;
		foreach ($records as $record) {
			$record->top_path = All::getPath($record);
			$record->model_count = All::getModelCount($record);
		};
		return $records;
	}

	public function getAllRecords(){ 
		$sources = array(
			Dev::where('status', '!=', 'deleted')->get(),
			Org::where('status', '!=', 'deleted')->get(),
			Project::where('status', '!=', 'deleted')->get(),
			Eventt::where('status', '!=', 'deleted')->get(),
			Story::where('status', '!=', 'deleted')->get()
			);

		$sources_array = array();
		$names_arr = array();
		foreach ($sources as $source) {
			$source->last()->latest = 'Latest '.get_class($source->last());
			foreach ($source as $record) {
				// $record->classname = get_class($record);
				$record->name = All::getName($record);
				$record->top_path = All::getPath($record);
				$record->model_count = All::getModelCount($record);
			};
			// $source->first()->classname = get_class($source->first());
			array_push($sources_array, json_decode($source, TRUE));
			array_push($names_arr, get_class($source->first())); 
		}
		$big_arr = array_merge(
				$sources_array[0], 
				$sources_array[1], 
				$sources_array[2],
				$sources_array[3],
				$sources_array[4]
			);

		// return $names_arr;
		return $big_arr;
	}

	public function getRandomRecords(){ 
		$big_arr = $this->getAllRecords();
		shuffle($big_arr);
		array_splice($big_arr, 5);
		return $big_arr;
	}

	public function getLatestRecords(){
		//sorting magic
		$sources = [
				Dev::all()->last(),
				Org::all()->last(),
				Project::all()->last(),
				Eventt::all()->last(),
				Story::all()->last()
			];
		$sources_array = array();
		foreach ($sources as $record) {
			$record->top_path = All::getPath($record);
			$record->model_count = All::getModelCount($record);
			array_push($sources_array, $record->toArray());
		}
		return $sources_array;
	}

	public function getCoveredRecords(){
		$map_bounds = Input::all();
		//lat-left, lat-right, lat-top, lat-bottom
		//area covered by this container on this zoomlevel over this centerpoint
		return Response::json($map_bounds);
	}

}
