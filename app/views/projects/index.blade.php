@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<div class="_addbtn _center _top10 _bottom10">
	<span class="_blade _aqua2pink _step1">+Create</span>
</div>

<h2 class="_inline">Latest Projects...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('projects.create', 'Add One... :)') }}</p> -->

@if($projects->count())
	{{ $projects->links() }}
	<div id="container" class="js-masonry"
  		data-masonry-options='{ "columnWidth": 10, "itemSelector": ".item" }'>
			@foreach($projects as $project)
				<div class="item">
					<div class="image">{{ All::getImageLink($project, '_list-img') }}</div>
					<div class="name">{{ All::getNameLink($project) }}</div>
					<div class="tagline">{{ All::getTagline($project) }}</div>
					<div class="type">{{{ $project->type }}}</div>
					<div class="location">{{ All::getLocation($project) }}</div>
					<div class="creator">By: {{ All::getCreatorLink($project) }}</div>
					<div class="creator-image">{{--! All::getCreatorImageLink($project, '_list-img') --}}</div>
					<!-- <div>{{{ $project->views }}}</div> -->
					<!-- <div>{{{ $project->votes }}}</div> -->
				</div>
			@endforeach
	</div>
	{{ $projects->links() }}
@else
	There are no projects
@endif

@stop