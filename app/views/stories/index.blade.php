@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<div class="_addbtn _center _top10 _bottom10">
	<span class="_blade _aqua2pink _step1">+Create</span>
</div>

<h2 class="_inline">Latest Stories...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('stories.create', 'Add One... :)') }}</p> -->

@if($stories->count())
	{{ $stories->links() }}
	<div id="container" class="mason-stack"
  		data-masonry-options='{ "columnWidth": 10, "itemSelector": ".item" }'>
			@foreach($stories as $story)
				<div class="item">
					<div class="img"><a href="stories/{{ $story->id }}">
						<img src="{{ All::getImage($story) }}" alt="{{ All::getName($story) }}">
					</a></div>
					<div class="name">{{ All::getNameLink($story) }}</div>
					<div class="location">{{ All::getLocation($story) }}</div>
					<div class="creator">By: {{ All::getCreatorLink($story) }}</div>
					<!-- <div>{{{ $story->views }}}</div> -->
					<!-- <div>{{{ $story->votes }}}</div> -->
				</div>
			@endforeach
	</div>
	{{ $stories->links() }}
@else
	There are no stories
@endif

@stop