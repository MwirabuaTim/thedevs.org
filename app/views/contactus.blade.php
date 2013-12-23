@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
@parent
:: Contact Us
@stop



@section('main')


<form action="/gmail" class="contactUs" method="POST">
  <fieldset>
  	<h3 class="gradient-light">Send us a message</h3>

	  <div class="name">
	    	  <label for="name">Name</label>
	  <input type="text" name="name" class="large form-control" value="">
	  </div>
	  
	  <div class="email">
	    	  <label for="email">Email</label>
	  <input type="text" name="email" class="large form-control" value="">
	  </div>
	  
	  <div class="subject">
	    	    <label for="subject">Subject</label>
	    <input type="text" name="subject" class="large form-control" value="">
	  </div>
	  
	  <div class="msg">  
	    	  <label for="msg">Message</label>
	  <textarea name="msg" cols="60" rows="10" class="form-control"></textarea>
	  </div>
    
    <div class="math">
            <label for="math">4 + 9 = </label>
    	<input type="text" name="answer" class="small form-control">
      	<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <span class="helptext">Solve to prove you are a human</span>
    </div>

    <input class="btn btn-primary submitcontact" type="submit" value="Submit" style="font-size: 15px;">
  	<!-- <button type="submit" value="Send" class="submit ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Submit</span></button> -->
  </fieldset>
</form>

  <p>Thanks for contacting us here at TheDevs.org. We are always looking for ways to improve, so we look forward to addressing your comment.</p>	

@stop

@section('css')
	<link href="{{ asset('assets/styles/css/contactus.css') }}" rel="stylesheet" />
@stop