<?php

class Dev extends User {
	protected $guarded = array();
	protected $softDelete = true;

	public static $rules = array(
		'first_name' => 'required',
		// 'last_name' => 'required',
		// 'pic' => 'required',
		// 'video' => 'required',
		// 'email' => 'required',
		// 'password' => 'required',
		// 'phone' => 'required',
		// 'elevator' => 'required',
		// 'about' => 'required',
		// 'location' => 'required',
		// 'map' => 'required',
		// 'last_map' => 'required',
		// 'public' => 'required',
		// 'notes' => 'required',
		// 'views' => 'required',
		// 'votes' => 'required',
		// 'status' => 'required'
	);
	public function stars()//relationship
	{
		// return $this->hasMany('Star');
		$received = Star::where('recipient', $this->id);
		if($received->count()):
			$count = 0;
			foreach($received->get() as $x){
				$count+=$x->count;
			};
			return $count;
			// $f = $received->first();
			// return $f->count;
		else:
			return 0;
		endif;

	}
	public function currentStars()//relationship
	{
		// return $this->hasMany('Star');

		if(!Sentry::check()):
			return 0;
		endif;

		// return $this->id;
		$recieved = Star::where('recipient', $this->id)->where('giver', Sentry::getUser()->id);

		if($recieved->count()):
			return $recieved->first()->count;
			// return $first->count;
		else:
			return 0;
		endif;

	}


}

// users table:
// ------------
// `id`
// `email`
// `password`
// `permissions`
// `activated`
// `activation_code`
// `activated_at`
// `last_login`
// `persist_code`
// `reset_password_code`
// `first_name`
// `last_name`
// `created_at`
// `updated_at`


// {
// "id": "1",
// "email": "techytimo@gmail.com",
// "permissions": "{\"admin\":1,\"user\":1}",
// "activated": "1",
// "activation_code": null,
// "activated_at": null,
// "last_login": "2013-12-19 11:40:20",
// "persist_code": "$2y$10$l6I37jsPJAeQeXhknymUbun7rcPuQ0oxaZN2mLkD3wLAIFRCA/7M2",
// "reset_password_code": null,
// "first_name": "Timothy",
// "last_name": "Mwirabua",
// "created_at": "2013-12-13 08:57:30",
// "updated_at": "2013-12-19 11:40:20",
// "pic": "",
// "video": "",
// "phone": "",
// "elevator": "",
// "about": "",
// "location": "",
// "map": "",
// "last_map": "",
// "views": "0",
// "votes": "0",
// "notes": "",
// "status": "",
// "public": "",
// "deleted_at": null,
// "website": null,
// "country": null,
// "gravatar": null
// }

// Profile::
// 'provider' => 'required',
// 'first_name' => 'required',
// 'last_name' => 'required',
// 'email' => 'required',
// 'pic' => 'required',
// 'location' => 'required',
// 'about' => 'required',
// 'username' => 'required',
// 'uid' => 'required',
// 'link' => 'required',
// 'code' => 'required',
// 'field1' => 'required',
// 'field2' => 'required',
// 'field3' => 'required',
// 'field4' => 'required',
// 'field5' => 'required'