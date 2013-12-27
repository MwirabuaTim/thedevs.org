@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
	@parent
	Not Logged In
@stop

@section('css')
	@include('partials.errorcss')
@stop

@section('js')
	@include('partials.errorjs')
@stop

@section('transparent')
	
	<div class="error-container">

        <h1>401</h1>
    
        <div id="www">:(</div>
    
    	<hr/>

        <p>You have to be logged in to access this page.</p>
    
        <p>Please <a href="{{ URL::route('signin') }}" class="_get-sign-in _aqua">log in</a> or 
        	<a href="{{ URL::route('signup') }}" class="_get-sign-up _aqua">register.</a></p>
    </div>

@stop