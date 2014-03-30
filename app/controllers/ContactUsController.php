<?php

class ContactUsController extends BaseController {

	/**
	 * Contact us page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		return View::make('contact-us');
	}

	/**
	 * Contact us form processing page.
	 *
	 * @return Redirect
	 */
	public function postIndex()
	{
		// Declare the rules for the form validation
		$rules = array(
			'name'        => 'required',
			'email'       => 'required|email',
			'description' => 'required',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			return Redirect::route('contact-us')->withErrors($validator);
		}

	}
    public function gmail()
    {

        Mail::send('emails.contactus', Input::all(), function($message)
		{

			$email = $_POST['email'];
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $body = $_POST['msg'];

            // $message->from(array($email => $name));
            $message->from(array('info@thedevs.org' => 'TheDevs Organisation'));  
            $message->to(array('info@thedevs.org' => 'TheDevs Organisation'));  
            $message->subject($subject); 
            $message->setBody($body); 

		});

        return Redirect::back()->with('success', 'Thank you for contacting us. We will get back to you shortly');
    }
}
