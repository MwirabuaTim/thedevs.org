<?php

return array(

	'signin.success' => 'Successfully Signed In.',
	'account_not_found' => 'There is no account by '. Input::get('email'),
	'account_not_activated' => 'Check email sent to '. Input::get('email').' to activate the account.',
	'account_suspended' => 'Your account is suspended, come back later.',
	'account_banned' => 'Sorry, your account is banned.',
	'signup.success' => 'Successfull. Check '. Input::get('email'). ' for a link to activate your account.',
	'account_already_exists' => Input::get('email').' is already registered. An activation link was emailed.',
	'activate.success' => 'Successfully Authenticated!',
	'activate.error' => 'Activation Error...',
	// 'activate.error' => 'Activation Error',
	'forgot-password.success' => 'Successfull',
	// 'account_not_found' => 'There is no account by that email.',
	'forgot-password-confirm.success' => 'Confirmation Success',
	'forgot-password-confirm.error' => 'Ooops, we have an error',
	// 'auth/message.account_not_found' => 'auth/message.account_not_found',
	'wrong_password' => 'You provided the wrong password!', //by tim


);
