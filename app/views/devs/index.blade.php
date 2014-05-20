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
	<div id="container" class="mason-stacks">
		@foreach($devs as $dev)
		<div class="item">
			<div class="img">
				{{ All::getImageLink($dev, '_list-img') }}
			</div>
			<div class="name">{{ All::getNameLink($dev) }}</div>
			<div class="location">{{ All::getLocation($dev) }}</div>
			<div class="tagline">{{ All::getTagline($dev) }}</div>
			<!-- <div class="social-cred caption-social">
				<a class="facebook" href="#"><span class="fa fa-hx fa-facebook"></span></a>
				<a class="twitter" href="#"><span class="fa fa-hx fa-twitter"></span></a>
				<a class="plus" href="#"><span class="fa fa-hx fa-google-plus"></span></a>
				<a class="github" href="#"><span class="fa fa-hx fa-github"></span></a>
				<a class="expand" href="#"><span class="fa fa-hx fa-expand"></span></a>
			</div> -->
			<div class="star-cred caption-social" data-dev="{{ $dev->id }}">

				@if($dev->currentStars())
					<?php $j = 1; ?> 
					@for($i = 1; $i<= $dev->currentStars(); $i++)
					<a class="star active" value="{{ $j }}" href="#"><span class="fa fa-hx fa-star"></span></a>
					<?php $j++; ?> 
					@endfor
					@for($i = 1; $i<= 5-$dev->currentStars(); $i++)
					<a class="star off" value="{{ $j }}" href="#"><span class="fa fa-hx fa-star"></span></a>
					<?php $j++; ?> 
					@endfor
				@else
					@for($i = 1; $i<= 5; $i++)
					<a class="star off" value="{{ $i }}" href="#"><span class="fa fa-hx fa-star"></span></a>
					@endfor
				@endif
			</div>
			<h4><span>{{ $dev->stars() }}</span> Stars</h4>
			<!-- <div>{{{ $dev->views }}}</div> -->
			<!-- <div>{{{ $dev->votes }}}</div> -->
		</div>
		@endforeach
	</div>
	{{ $devs->links() }}

@endif



@stop
