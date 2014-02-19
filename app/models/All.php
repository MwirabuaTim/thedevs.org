<?php

class All extends Eloquent {

	public static function getName($record)
	{
		$path = All::getPath($record);
		$name =  $path == 'devs' ? $record->first_name . ' ' . $record->last_name : $record->name;
		return $name;
	}

	public static function getNameLink($record)
	{
		$path = All::getPath($record);
		return link_to_route("$path.show", All::getName($record), $record->id);
		// return $record->name;
	}

	public static function getNamedEditLink($record, $name)
	{
		$path = All::getPath($record);
		return link_to_route("$path.edit", $name, $record->id);
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

	public static function adminLink($classes){
		if(Sentry::check()):
			if(Sentry::getUser()->hasAccess('admin')):
				return link_to_route('admin', 'Admin', null, array('class' => $classes));
			endif;
		endif;
	}

	public static function getLogoutLink(){
		if(Sentry::check()):
			if(Request::path() == 'devs/'.Sentry::getUser()->id):
				return link_to_route('logout', 'Logout', null, array('class' => 'btn btn-sm btn-primary _inline'));
				// return Request::path();
			endif;
		endif;
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
		$creator = !User::find($creator) ? 2 : $creator;
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
		if(All::hasEditRight($record)):
			return $record->public == 'on' ? 'Public' : 'Not Public';
		endif;
	}

	public static function getEditLink($record){
		if(All::hasEditRight($record)):
			return link_to_route(All::getPath($record).'.edit', 'Edit', 
				array($record->id), array('class' => 'btn btn-sm btn-info _inline'));
		endif;
	}

	public static function getDeleteLink($record){
		if(All::hasEditRight($record)):
			if($record->model == 'Dev' && ($record->id == 1  || $record->id == 2)):
				$button = '';
			else:
				$button = "<button class=\"btn btn-sm btn-link _del\" >Delete</button>";
			endif;
			//prevented deleting my account by accident.

			// $path = All::getPath($record);
            // return "<a alt=\"./$path/$record->id/delete\" class=\"btn-sm btn-warning _inline _black\" >Delete</a>";
            return $button;
		endif;
	}

	public static function getImage($record){
		$path = All::getPath($record);

		$img = $path == 'projects' || $path == 'orgs' ? $record->logo : $record->pic;
		$img = $path == 'eventts' || $path == 'stories' ? User::find(All::getCreator($record))->pic : $img; //using creator pic for eventts and stories

		if(empty($img)):
			$img = $path == 'devs' ? '/images/symbols/anon-2.jpg' : '/images/symbols/star.gif';
		endif;

		return $img;
	}

	public static function getImageLink($record, $classes){
		$path = All::getPath($record);

		$img = All::getImage($record);

		$i_link = "$path/$record->id";
		$i_link = $path == 'eventts' || $path == 'stories' ? "devs/".All::getCreator($record) : $i_link; //using creator pic for eventts and stories


		if($img == '/images/symbols/anon-2.jpg' || $img == '/images/symbols/star.gif'):
			$classes = $classes.' _fade-3';
			$img_link = "<a href=\"/$i_link\"><img src=\"$img\" class=\"$classes\" /></a>";
			
			if(All::hasEditRight($record)):
				return $img_link."<script> myalert = 'Add an image to " . All::getNamedEditLink($record, All::getName($record)) . "' </script>";
			endif;
		endif;
		// return var_dump($classes);

		return "<a href=\"/$i_link\"><img src=\"$img\" class=\"$classes\" /></a>";
	}

	public static function getMapMessage($record){
		if(All::hasEditRight($record) && empty($record->map)):
            return All::getNamedEditLink($record, 'Pin your workplace on the map!');
		endif;
	}

	public static function getTagline($record){ //not called/used for stories
		if(All::hasEditRight($record) && empty($record->elevator)):
            return All::getNamedEditLink($record, '"Add your tagline here..."');
        elseif(empty($record->elevator)):
        	return '';
        else:
        	return '"'.$record->elevator.'"';
		endif;
	}


	public static function getContent($record){ //not called/used for stories
		$content = get_class($record) == 'Story' ? $record->body : $record->description;
		$content = get_class($record) == 'Dev' ? $record->about : $content;

		if(All::hasEditRight($record) && empty($content)):
            return All::getNamedEditLink($record, 'Add some awesome content about yourself... '); //. All::getLorem()
        elseif(empty($content)):
        	return 'Nothing to see here yet...'; //All::getLorem();
        else:
        	return $content;
		endif;
	}

	public static function getLocation($record){ //not called/used for stories
		if(All::hasEditRight($record) && empty($record->location)):
            return All::getNamedEditLink($record, ''); //Elysium or Oblivion...
        elseif(empty($record->location)):
        	return ''; //Elysium
        else:
        	return $record->location;
		endif;
	}

	public static function getContacts($record){ 
		if(get_class($record) == 'Dev'):

			$contacts_arr = array();
			$git_profile = All::getGitProfile($record);
			$git = $git_profile['link'];
			$git = !empty($git) ? $git : 'empty';
			!empty($record->email) ? array_push($contacts_arr, "Email: $record->email") : true;
			!empty($record->phone) ? array_push($contacts_arr, "Phone: $record->phone") : true;
			// array_push($contacts_arr, "Website:");
			if($git == 'empty'):
				array_push($contacts_arr, "Github: ");
			else:
				array_push($contacts_arr, "Github: <a href=\"$git\">$git</a>");
			endif;
			// !empty($record->email) ? array_push($contacts_arr, "Stackoverflow:") : true;

			$contacts = empty($record->contacts) ? implode("<br/><br/>", $contacts_arr) : $record->contacts;
			$contacts = '<p>'.$contacts.'</p>';

			if(stripos(Request::path(), 'edit')): //no script for dev/id/edit
        		return $contacts;
        	endif;
        		return "<script>_gitlink = \"$git\"</script>".$contacts;
        else:
        	return $record->contacts;
		endif;
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
		$model = All::getModel($path); // also $model = get_class($record); // no query
		$record =  $model::find($id);//queries db
		$record = All::formatRecord($record);
		return $record;
	}

	public static function formatRecord($record){ //1 query
		$record->name = All::getName($record);//doesnt query db
		$record->model = get_class($record);
		$record->model_path = All::getPath($record);// doesnt query db
		$record->model_count = All::getModelCount($record);//queries db

		//removing sensitive fields 

		unset($record->permissions);
		unset($record->activated);
		unset($record->activation_code);
		unset($record->activated_at);
		unset($record->last_login);
		unset($record->persist_code);
		unset($record->reset_password_code);
		unset($record["last_map"]);
		unset($record["views"]);
		unset($record["votes"]);
		unset($record["notes"]);
		unset($record["status"]);

		return $record;
	}

	public static function getModelCount($record){ 
		$path = All::getPath($record);//no query
		$model = get_class($record); //All::getModel($path);//no query
		return $model::all()->count();//query
	}

	public static function getLorem(){ //not called/used for stories
		return 'Lorem ipsum pretium mollitia praesentium malesuada fames, 
			beatae viverra molestias ultricies donec enim? Purus ad reprehenderit conubia malesuada a corrupti 
			commodo neque feugiat harum nibh, 
			velit conubia! Ipsam reiciendis? Diam phasellus, 
			ullam mus ducimus accusamus tempor a ac phasellus aliquip, 
			sapien wisi leo augue iste dui. Consequat ante. Et! Volutpat sem ea elementum tempus dolorum labore autem, 
			purus, 
			iste lacinia eros dolores ut eros anim reprehenderit curabitur accusamus imperdiet repudiandae, 
			blandit? Eos scelerisque, 
			explicabo facilisi architecto wisi, 
			iure, 
			debitis in mauris natus minus quis nullam. Odio, 
			impedit, 
			curabitur arcu.

		Pharetra minus. Aperiam! Amet sint cupidatat repudiandae aspernatur deleniti felis? Distinctio vehicula! Eaque aute a odit, 
			cras itaque faucibus perferendis! Adipisci proident diam hendrerit adipisci posuere varius omnis nostra iure
			 natus eos quasi natus pellentesque ducimus, 
			nemo ridiculus repudiandae varius interdum mattis, 
			augue sint sapien, 
			labore! Doloremque inventore eligendi velit, 
			tellus malesuada deleniti luctus nec laborum fugiat mauris earum commodo, 
			magnis lorem proin suspendisse. Nibh. Aenean. Ac, 
			laudantium praesent. Nostrud. Vehicula reprehenderit, 
			sequi penatibus, 
			ante ante iaculis faucibus provident class sint etiam anim etiam quae vulputate autem, 
			totam scelerisque iste pariatur rhoncus, 
			minus accusantium, 
			quos fringilla? Officia? Nonummy? Perferendis officia.

		Wisi potenti suspendisse, 
			leo massa esse duis. Cum, 
			orci architecto odit mus dicta metus nulla voluptas potenti exercitationem quis hendrerit minim ac
			 reprehenderit. Inceptos? Molestiae, 
			possimus at, 
			metus explicabo pretium conubia assumenda! Platea occaecat, 
			pulvinar facilisi? Officiis unde? Tenetur, 
			lorem tortor ratione? Aute placeat. Molestiae eleifend, 
			quidem feugiat, 
			magna ultricies? Adipisci aperiam imperdiet a, 
			quas itaque? Ornare aliquet nostra accumsan, 
			per diam! Ac, 
			fames nemo laudantium? Architecto fugit nemo! Deserunt. Dolor dignissim. Occaecat illo natus tempore. 
			Beatae occaecati tristique vehicula? Laboris dolorem quaerat occaecat, 
			neque quae debitis incidunt, 
			fuga ligula! Cumque incidunt do porro tenetur tenetur, 
			nisl nascetur animi hymenaeos.';
	}

    public static function completePosting(){
		$pending_posts = array(
			Org::where('status', session_id())->get(),
			Eventt::where('status', session_id())->get(),
			Project::where('status', session_id())->get(),
			Story::where('status', session_id())->get()
		);
		$last_record = array();
		foreach ($pending_posts as $source) {
			foreach ($source as $r) {
				$r->status = '';
				$creator = $r->creator ? 'creator' : 'organizer';
				$r->$creator = Sentry::getUser()->id;
				$r->public = 'on';
				$r->save();
				$last_record =  $r;
			};
		}
		return !empty($last_record) ? All::getPath($last_record)."/$last_record->id" : '';
    }

	public static function getRecords($path){
    	// return Request::path();
    	if($path == '/'){
			$records = All::getAllRecords();
			return All::simplify($records);
    	}
    	elseif (in_array($path, array('devs', 'orgs', 'eventts', 'projects', 'stories'))) {
    		$records = All::getModelRecords($path);
    		return All::simplify($records);
    	}
    	elseif(is_numeric(Request::segment(2))){  // stripos($path, 'devs/')  == 0 !
    		$model = Request::segment(1);
    		$id = Request::segment(2);
    		return All::getRecord($model, $id);
    	}

    	// elseif (substr($path, 0, 5) == 'devs/'){  // stripos($path, 'devs/')  == 0 !
    	// 	return All::getRecord('devs', Request::segment(2));
    	// }
    	return $path;
    	// return stripos($path, 'devs/');
    }
    public static function simplify($records){
    	$list = array();
    	foreach ($records as $record) {
	    	$class = $record['model'];
	    	$r = new $class;
			$r->map = $record['map'];
			$r->id = $record['id'];
			$r->name = $record['name'];
			$r->model = $record['model'];
			$r->model_path = $record['model_path'];
			$r->model_count = $record['model_count'];
			array_push($list, json_decode($r, TRUE));
		};
		return json_encode($list);
    }
	public static function getModelRecords($path){
		$model = All::getModel($path); // also $model = get_class($record); no query
		$records =  $model::all();
		$list = array();
		foreach ($records as $record) {
			$record = All::formatRecord($record);
			array_push($list, json_decode($record, TRUE));
		};
		return $list;
	}

	public static function getAllRecords(){ 
		$sources = array(
			Dev::where('status', '!=', 'deleted')->get(),
			Org::where('status', '!=', 'deleted')->get(),
			Project::where('status', '!=', 'deleted')->get(),
			Eventt::where('status', '!=', 'deleted')->get(),
			Story::where('status', '!=', 'deleted')->get()
			);

		$records = array();
		$names_arr = array();
		if(count($sources) > 1):
			foreach ($sources as $source):
				// $source->first()->classname = get_class($source->first());
				foreach ($source as $record) {
					$record = All::formatRecord($record);
					array_push($records, json_decode($record, TRUE));
				};
				array_push($names_arr, get_class($source->first())); 
			endforeach;
		endif;
		return $records;
	}

	public static function getRandomRecords(){ 
		$big_arr = $this->getAllRecords();
		shuffle($big_arr);
		array_splice($big_arr, 5);
		return $big_arr;
	}

	public static function getLatestRecords(){
		//sorting magic
		$sources = array(
			Dev::all()->last(),
			Org::all()->last(),
			Project::all()->last(),
			Eventt::all()->last(),
			Story::all()->last()
		);
		$records = array();
		foreach ($sources as $record) {
			$record = All::formatRecord($record);
			array_push($records, json_decode($record, TRUE));
		}
		return $records;
	}

	public static function getCoveredRecords(){
		$map_bounds = Input::all();
		//lat-left, lat-right, lat-top, lat-bottom
		//area covered by this container on this zoomlevel over this centerpoint
		return Response::json($map_bounds);
	}

	public static function getGitProfile($user){ 
		return Profile::where('provider', 'github')->where('email', $user->email)->first();
	}

	public static function getGitStats($user){ 
		$profile = All::getGitProfile($user);
		$cyr = file_get_contents($profile['field3']);
		return $cyr;

		// dynamic data required
		// =====================
		// repos >> projects
		// orgs >> orgs
		// blog >> stories
		// events_count (contributions)

		// js
		// yr_values = contribution_yr.map(function(e){return e[1]})
		// yr_len = 0
		// yr_len = for(var i=0, len=cyr.length; i < len; i++){yr_len+=cyr[i]}
	}

	public static function ajaxByLetters() {
        $term = Input::get('term');
        $api = All::getAllRecords();

        // $api = substr($term, 1) ? $api : $this->getAllRecords();//query only once

        $coll = array();
       
	        foreach ($api as $key => $record) {
	        	foreach ($record as $key => $field) {
	        		if(count($coll)< 10):
						if(stripos('x'.$field, $term)): //stripos starts at char 1 not 0

							$coll[$record['model_path'].$record['id']] = array(
								'model' => $record['model'],
								'model_path' => $record['model_path'],
								'name' => $record['name'],
								'id' => $record['id'],
								'location' => $record['location'],
								'field' => $key
								);

						endif;
	        		endif;
	        	}
	        }
       
        return Response::json($coll);
    }

}

