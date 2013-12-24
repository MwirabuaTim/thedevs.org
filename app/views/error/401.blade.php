@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
	@parent
	Not Logged in.
@stop

@section('css')
	@include('partials.errorcss')
@stop

@section('js')
	@include('partials.errorjs')
@stop

@section('transparent')
	
	<div class="error_container">
        <h1>401</h1>
        <span class="sad">:(</span>
        <p>You have to be logged in to access this page.</p>
        <p>Please <a href="{{ URL::to('login') }}">log in</a> or <a href="{{ URL::to('register') }}">register.</a></p>
    </div>

@stop