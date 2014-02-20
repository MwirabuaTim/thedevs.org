@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<div class="_addbtn _center _top10 _bottom10">
	<span class="_blade _aqua2pink _step1">+Create</span>
</div>

<h2 class="_inline">Latest Devs...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('devs.create', 'Add Someone... :)') }}</p> -->

@if($devs->count())
	{{ $devs->links() }}
	<div id="container" class="mason-stacks"
  		data-masonry-options='{ "columnWidth": 10, "itemSelector": ".item"}'>
			@foreach($devs as $dev)
				<div class="item">
					<div class="img">{{ All::getImageLink($dev, '_list-img') }}</div>
					<div class="name">{{ All::getNameLink($dev) }}</div>
					<div class="location">{{ All::getLocation($dev) }}</div>
					<div class="tagline">{{ All::getTagline($dev) }}</div>
					<!-- <div>{{{ $dev->views }}}</div> -->
					<!-- <div>{{{ $dev->votes }}}</div> -->
				</div>
			@endforeach
	</div>
	{{ $devs->links() }}

@endif



@stop
