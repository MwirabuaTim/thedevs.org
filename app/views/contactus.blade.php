@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
@parent
:: Contact Us
@stop



@section('main')


<form action="/contactus" class="contactUs" method="POST">
  <fieldset>
  	<legend class="gradient-light">Send us a message</legend>

  
  	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

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
    
<!--     <div class="math">
            <label for="math">4 + 9 = </label>
    	<input type="text" name="answer" class="small form-control">
      <span class="helptext">Solve to prove you are a human</span>
    </div>
 -->
    <input class="btn btn-primary submitcontact" type="submit" value="Submit" style="font-size: 15px;">
  	<!-- <button type="submit" value="Send" class="submit ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Submit</span></button> -->
  </fieldset>
</form>

  <p>Thank you for contacting us.</p>	

@stop
