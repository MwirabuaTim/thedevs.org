@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<div class="_addbtn _center _top10 _bottom10">
	<span class="_blade _aqua2pink _step1">+Create</span>
</div>

<h2 class="_inline">Latest Events...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('eventts.create', 'Add One... :)') }}</p> -->

@if($eventts->count())
	{{ $eventts->links() }}
	<div id="container" class="js-masonry"
  		data-masonry-options='{ "columnWidth": 10, "itemSelector": ".item" }'>
			@foreach($eventts as $eventt)
				<div class="item">
					<div class="name">{{ All::getNameLink($eventt) }}</div>
					<div class="type">Type: {{{ $eventt->type }}}</div>
					<div class="location">Venue: {{ All::getLocation($eventt) }}</div>
					<div class="start-time">{{{ $eventt->start_time }}}</div>
					<div class="to">To</div>
					<div class="end-time">{{{ $eventt->end_time }}}</div>
					<div class="creator">By: {{ All::getCreatorLink($eventt) }}</div>
					<div class="creator-image">{{ All::getCreatorImageLink($eventt, '_list-img') }}</div>
					<!-- <div class="img"><a href="eventts/{{ $eventt->id }}">
						<img src="{{ All::getImage($eventt) }}" alt="{{ All::getName($eventt) }}">
					</a></div> -->
					<!-- <div class="tagline">{{--! All::getTagline($eventt) --}}</div> -->
					<!-- <div>{{{ $eventt->views }}}</div> -->
					<!-- <div>{{{ $eventt->votes }}}</div> -->
				</div>
			@endforeach
	</div>
	{{ $eventts->links() }}
@else
	There are no eventts
@endif

@stop