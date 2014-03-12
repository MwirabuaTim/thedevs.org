@extends('layouts.master')
<?php Request::path() == '/' ? $path = 'home' : $path = Request::path() ?>

@section('title')
	@parent
	 | {{ isset($title) ? $title : ucwords($path) }}
@stop

@section('css')
	{{ is_file('css/'.$path.'.css') ? HTML::style('css/'.$path.'.css') : ''}}
@stop

@section('js')
	{{ is_file('js/'.$path.'.js') ? HTML::script('js/'.$path.'.js') : '' }}
@stop

@section('content')
	
	@if('' !== $__env->yieldContent('transparent'))
	<div class="_bg-transparent">@yield('transparent')</div>
	@endif

	@if('' !== $__env->yieldContent('main'))
	<div class="_bg-transparent">@yield('main')</div>
	@endif

	<div class="page_data hidden"> {{{ All::getRecords(Request::path()) }}} </div>
@stop
