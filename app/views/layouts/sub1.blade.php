@extends('layouts.scaffold')
<?php Request::path() == '/' ? $path = 'home' : $path = Request::path() ?>
{{-- Web site Title --}}
@section('title')
@parent
:: {{ ucfirst($path) }}
@stop

@section('css')
	<link type="text/css" charset="utf-8" rel="stylesheet" media="screen"
	 href="{{ asset('css/sub1.css') }}" />

	<link type="text/css" charset="utf-8" rel="stylesheet" media="screen"
	 href="{{ asset('css/'.$path.'.css') }}" />
	@include('partials.leaflet')
@stop

@section('main')
	<!-- replace the content below to suit your page content -->
	@include('partials.mapnav')

	<div class="_content">
		@yield('content')
	</div>
@stop

@section('js')
<script src="{{ asset('js/sub1.js') }}" type="text/javascript" 
charset="utf-8" async defer></script>

<script src="{{ asset('js/'.$path.'.js') }}" type="text/javascript" 
charset="utf-8" async defer></script>
@stop