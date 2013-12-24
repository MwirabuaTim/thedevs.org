@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
	@parent
	Not Found
@stop

@section('css')
    @include('partials.errorcss')
@stop

@section('js')
    @include('partials.errorjs')
@stop

@section('transparent')

	<div class="error_container" style="text-align:center">
        <h1>404</h1>
        <p>This page can not be found.</p>

        <div id="www"></div>

        <p>Please check if you typed your link correctly.</p>
    </div>
	      
@stop