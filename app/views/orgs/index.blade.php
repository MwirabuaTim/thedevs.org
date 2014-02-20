@extends('layouts.scaffold')

@section('transparent')
	@include('partials.mapnav')
@stop

@section('main')

<div class="_addbtn _center _top10 _bottom10">
	<span class="_blade _aqua2pink _step1">+Create</span>
</div>

<h2 class="_inline">Latest Orgs...</h2>

<!-- <p class="pull-right _top10">{{ link_to_route('orgs.create', 'Add One... :)') }}</p> -->

@if($orgs->count())
	{{ $orgs->links() }}
	<div id="container" class="mason-stack"
  		data-masonry-options='{ "columnWidth": 10, "itemSelector": ".item" }'>
			@foreach($orgs as $org)
				<div class="item">
					<div class="img">{{ All::getImageLink($org, '_list-img') }}</div>
					<div class="name">{{ All::getNameLink($org) }}</div>
					<div class="type">{{{ $org->type }}}</div>
					<div class="location">{{ All::getLocation($org) }}</div>
					<div class="tagline">{{ All::getTagline($org) }}</div>
					<!-- <div class="creator-image">{{--! All::getCreatorImageLink($org, '_list-img') --}}</div> -->
					<div class="creator">By: {{ All::getCreatorLink($org) }}</div>
					<!-- <div>{{{ $org->views }}}</div> -->
					<!-- <div>{{{ $org->votes }}}</div> -->
				</div>
			@endforeach
	</div>

	{{ $orgs->links() }}
@else
	There are no orgs
@endif

@stop
