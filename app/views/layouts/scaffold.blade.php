@extends('layouts.master')
<?php Request::path() == '/' ? $path = 'home' : $path = Request::path() ?>

@section('title')
	@parent
	 | {{ ucfirst($path) }}
@stop

@section('css')
	{{ is_file('assets/'.$path.'.css') ? HTML::style('assets/'.$path.'.css') : ''}}
@stop

@section('js')
	{{ is_file('assets/'.$path.'.js') ? HTML::script('assets/'.$path.'.js') : '' }}
@stop

@section('content')

	@if('' !== $__env->yieldContent('transparent'))
	<div class="_bg-transparent">@yield('transparent')</div>
	@endif

	@if('' !== $__env->yieldContent('main'))
	<div class="_bg-white _w100">@yield('main')</div>
	@endif

@stop
