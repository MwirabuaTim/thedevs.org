@extends('layouts.scaffold')
<?php $title = All::getName($dev) ?>
<?php $og_image = All::getImage($dev) ?>

@section('main')

<div class="_w100 _in-block">
	<h1 class="pull-left">{{ All::getName($dev) }}</h1>
	<span class="pull-right _top10">

		{{ All::getPublicity($dev) }} 

		{{ All::getEditLink($dev) }}

		{{--! All::adminLink('btn btn-primary btn-sm _inline') --}}

		{{ All::getLogoutLink() }}

	</span>
	
</div>

<div class="_w100 _in-block _mapnav">
	<div id="single-map"></div>
	{{ All::getImageLink($dev, '_profile-pic') }}
	<span class="pull-right">{{ All::getMapMessage($dev) }}</span>
	<div class="_git"></div>
	<div class="_alerts _top10">
		<div class="_alert _data"><span class="_dismiss pull-right"></span></div>
		<!-- <div class="_alert _bg-pink"><span class="_dismiss pull-right"></span></div> -->
	</div>
	
</div>

<p class="_layer _center _f30">{{ All::getTagline($dev) }}</p>



<h4>About {{{ $dev->first_name }}}:</h4>
<div class="_about">
	@if(filter_var($dev->video, FILTER_VALIDATE_URL))
<!-- height="315" -->
	<div class="vid-wrapper pull-left _right10">
		<div class="media-box">
		<!-- <div class="vid-wrapper"> -->
			<iframe src="//www.youtube.com/embed/
			{{{ substr($dev->video, stripos($dev->video, 'v=')+2, strlen($dev->video)) }}}" 
			frameborder="0" allowfullscreen></iframe>
		<!-- </div> -->
		</div>
	</div>
	@endif

{{ All::getContent($dev) }}

</div>


<div class="_layer _top10">
	<h3 class="projects">Projects By {{{ $dev->first_name }}}</h3>
	<?php $projects = Project::where('creator', $dev->id)->get() ?>
	@if ($projects->count())
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Logo</th>
					<th>Name</th>
					<!-- <th>Tagline</th> -->
					<th>Type</th>
					<!-- <th>Link</th> -->
					<!-- <th>Views</th> -->
					<!-- <th>Votes</th> -->
					<th>Location</th>
					<th class="pull-right">&nbsp</th>
				</tr>
			</thead>

			<tbody>
			@foreach ($projects as $project)
				<tr>
					<td rowspan="2">{{ All::getImageLink($project, '_list-img') }}</td>
					<td>{{ All::getNameLink($project) }}</td>
					<!-- <td>{{ All::getTagline($project) }}</td> -->
					<td>{{{ $project->type }}}</td>
					<!-- <td>{{{ $project->link }}}</td> -->
					<!-- <td>{{{ $project->views }}}</td> -->
					<!-- <td>{{{ $project->votes }}}</td> -->

					<td>{{ All::getLocation($project) }}</td>
					<td>{{ All::getEditLink($project, 'projects') }}</td>
				</tr>
				<tr><td>Tagline: </td><td colspan="3" class="_left">{{ All::getTagline($project) }}</td></tr>
			@endforeach
			</tbody>
		</table>
	@else
		{{{ $dev->first_name }}} has not recorded any projects. :(
	@endif
</div>

<div class="_layer _top10">
	<h3 class="stories">Stories By {{{ $dev->first_name }}}</h3>
	<?php $stories = Story::where('creator', $dev->id)->get() ?>
	@if ($stories->count())
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Title</th>
					<th class="pull-right">Location</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($stories as $story)
					<tr>
						<td>{{ link_to_route('stories.show', $story->name, array($story->id)) }}</td>
						<td class="pull-right">{{ All::getLocation($story) }}
								{{ All::getEditLink($story, 'stories') }}</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		{{{ $dev->first_name }}} has not written any stories. :(
	@endif
</div>

<?php $orgs = Org::where('creator', $dev->id)->get() ?>
@if ($orgs->count())
<div class="_layer _top10">
	<h3 class="orgs">Organizations By {{{ $dev->first_name }}}</h3>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Logo</th>
				<th>Name</th>
				<!-- <th>Tagline</th> -->
				<th>Type</th>
				<!-- <th>Link</th> -->
				<!-- <th>Views</th> -->
				<!-- <th>Votes</th> -->
				<th>Location</th>
				<th class="pull-right">&nbsp</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orgs as $org)
				<tr>
					<td rowspan="2">{{ All::getImageLink($org, '_list-img') }}</td>
					<td>{{ All::getNameLink($org) }}</td>
					<!-- <td>{{ All::getTagline($org) }}</td> -->
					<td>{{{ $org->type }}}</td>
					<!-- <td>{{{ $org->link }}}</td> -->
					<!-- <td>{{{ $org->views }}}</td> -->
					<!-- <td>{{{ $org->votes }}}</td> -->

					<td>{{ All::getLocation($org) }}</td>
					<td>{{ All::getEditLink($org, 'orgs') }}</td>
				</tr>
				<tr><td>Tagline: </td><td colspan="3" class="_left">{{ All::getTagline($org) }}</td></tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif

<?php $eventts = Eventt::where('organizer', $dev->id)->get() ?>
@if ($eventts->count())
<div class="_layer _top10">
	<h3 class="orgs">Events By {{{ $dev->first_name }}}</h3>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th class="pull-right">Location</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($eventts as $eventt)
				<tr>
					<td>{{ link_to_route('eventts.show', $eventt->name, array($eventt->id)) }}</td>
					<td class="pull-right">{{ All::getLocation($eventt) }}
							{{ All::getEditLink($eventt, 'eventts') }}</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif

<div class="_layer _top10">
	<h3 class="_contacts">Contacts:</h3>
		{{ All::getContacts($dev) }}
</div>

@include('partials.comments')
@include('partials.links')

@stop
