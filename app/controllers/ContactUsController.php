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

            $message->from(array($email => $name));
            // $message->to(array('info@thedevs.org' => 'TheDevs Organisation'));  
            $message->to(array('techytimo@gmailcom' => 'Timothy Mwirabua'));    
            $message->subject($subject); 
            $message->setBody($body); 

		});

        return Redirect::back()->with('success', 'Thank you for contacting us. We will get back to you shortly');

        Mail::send('emails.contactus', array('token'=>'SAMPLE'), function($message){
            $message = Swift_Message::newInstance();
            $email = $_POST['email']; 
            $name = $_POST['name'];
            $message->setFrom(array($email => $name));
            $message->setTo(array('info@thedevs.org' => 'TheDevs Organisation'));   
            
            $subject = $_POST['subject'];   
            $message->setSubject($subject); 

            $msg = $_POST['msg'];   
            $message->setBody($msg);

            $transport = Swift_SmtpTransport::newInstance('smtp.postmarkapp.com', 2525, 'ssl')
            ->setUsername('cbdfcce5-5f77-4ce6-a8b6-2b8f74b47f30')
            ->setPassword('cbdfcce5-5f77-4ce6-a8b6-2b8f74b47f30');
            // $transport = Swift_SmtpTransport::newInstance('localhost', 25);
            //Supposed to allow local domain sending to work from what I read
            $transport->setLocalDomain('[127.0.0.1]');

            $mailer = Swift_Mailer::newInstance($transport);
            //Send the message
            $result = $mailer->send($message);

            if($result){
                 return Redirect::to('contactus')->with('success', 'Thank you for contacting us. We will get back to you shortly');
            }else{
                return Redirect::to('contactus')->with('fail', 'Oops! Your details were not submitted successfully. Please retry later.');
            }
        });
        return Redirect::back();
    }
}
