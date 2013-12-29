<?php

class All extends Eloquent {

	public static function getName($record)
	{
		$path = All::getPath($record);
		return $path == 'devs' ? $record->first_name . ' ' . $record->last_name : $record->name;
	}

	public static function getNameLink($record)
	{
		$path = All::getPath($record);
		return link_to_route("$path.show", All::getName($record), $record->id);
		// return $record->name;
	}

	public static function hasEditRight($record){
		if(!Sentry::check()){
			return false;
		}
		if(All::getCreator($record) == Sentry::getUser()->id || Sentry::getUser()->hasAccess('admin')){
			return true;
		}
		else{
			return false;
		}
	}

	public static function getPath($record){
		$cname = strtolower(get_class($record));
		if(substr($cname, strlen($cname)-1, strlen($cname)) == 'y'){ //check for singulars ending with 'y'
			$path = substr($cname, 0, strlen($cname) -1).'ies';
			// $path = substr($cname, strlen($cname)-1, strlen($cname));
		}
		else{
			$path = $cname.'s';
		}
		return $path;
	}


	public static function getCreator($record){
		$creator = $record->creator ? $record->creator : $record->organizer; //For eventts
		$creator = get_class($record) == 'Dev' ? $record->id : $creator; //For devs
		return $creator;
	}

	public static function getCreatorLink($record){
		$c = Dev::find(All::getCreator($record));
		return link_to_route("devs.show", All::getName($c), $c->id);
	}

	public static function getCreatorImageLink($record, $classes){
		
		$dev_id = All::getCreator($record);
		$dev = Dev::find($dev_id);
		return $img = All::getImageLink($dev, $classes);
		// return "<a href=\"/devs/$dev_id\">$img</a>";
	}

	public static function getPublicity($record){
		if(Sentry::check()):

			if(All::hasEditRight($record)):
				return $record->public ? 'Public' : 'Not Public';
			endif;

		endif;
	}

	public static function getEditLink($record){
		if(Sentry::check()):

			if(All::hasEditRight($record)):
				return link_to_route(All::getPath($record).'.edit', 'Edit', array($record->id), array('class' => 'btn btn-info'));
			endif;
			// return var_dump(get_class($record));

		endif;

	}
	public static function getImageLink($record, $classes){
		$path = All::getPath($record);
		$img = $path == 'projects' || $path == 'orgs' ? $record->logo : $record->pic;
		$img = $path == 'eventts' || $path == 'stories' ? User::find(All::getCreator($record))->pic : $img; //using creator pic for eventts and stories

		$i_link = "$path/$record->id";
		$i_link = $path == 'eventts' || $path == 'stories' ? "devs/".All::getCreator($record) : $i_link; //using creator pic for eventts and stories

		return "<a href=\"/$i_link\"><img src=\"$img\" class=\"$classes\" /></a>";
	}

	public static function getModel($path){  //edit rights bro
		if($path == 'stories'){ //check for weird plurals to resolve singular
			$model = ucwords(substr($path, 0, strlen($path) -3).'y');
		}
		else{
			$model = ucwords(substr($path, 0, strlen($path) -1));
		}
		return $model;
	}
	
	public static function getRecord($path, $id){ 
		$model = All::getModel($path);
		return $model::find($id);
	}

	public static function getRecords($num){ 
		$sources = array(
			Dev::all(),
			Org::all(),
			Project::all(),
			Eventt::all(),
			Story::all()
			);

		$source_array = array();
		$names_arr = array();
		foreach ($sources as $source) {
			foreach ($source as $record) {
				// $record->classname = get_class($record);
				$record->top_path = All::getPath($record);
			};
			// $source->first()->classname = get_class($source->first());
			array_push($source_array, json_decode($source, TRUE));
			array_push($names_arr, get_class($source->first())); 
		}
		$big_arr = array_merge(
				$source_array[0], 
				$source_array[1], 
				$source_array[2],
				$source_array[3],
				$source_array[4]
			);
		shuffle($big_arr);
		array_splice($big_arr, $num);


		// return $names_arr;
		return $big_arr;
	}
	public static function getLatestRecords($num){
		//updated_at sortin magic
	}

}
