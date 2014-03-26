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

	<?php $indexex = array('devs', 'orgs', 'eventts', 'projects', 'stories'); ?>

	@if(in_array(Request::segment(1), $indexex) && is_numeric(Request::segment(2)))

		<?php $model = Request::segment(1); ?>
		<?php $id = Request::segment(2); ?>
		<?php $dd = All::getRecord($model, $id) ?>

	@elseif(in_array($path, $indexex))

		<?php $dd = All::simplify(All::getModelRecords($path)) ?>

	@else

		<?php $dd = All::simplify(All::getAllRecords()) ?>

	@endif
	
	<div class="dd hidden"> {{{ $dd }}} </div>

@stop
