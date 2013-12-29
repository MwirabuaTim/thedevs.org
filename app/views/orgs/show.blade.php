@extends('layouts.scaffold')

@section('main')

<div class="_w100 _in-block">
	<h1 class="pull-left">{{{ $org->name }}}</h1>
	<span class="pull-right">
		{{ All::getPublicity($org) }}  {{ All::getEditLink($org) }}
	</span>
	
</div>
<div id="single-map"></div>

{{ All::getImageLink($org, '_profile-pic') }}

<table class="_right10 _in-block">
	<tr>
		<th>Creator: </th>
		<td>{{ All::getCreatorLink($org) }}</td>
	</tr>
</table>

<div class="pull-right">
	<table class="_right10 _in-block">
		<tr>
			<th>Type: </th>
			<td>{{{ $org->type }}}</td>
		</tr>
	</table>

	<table class="_right10 _in-block">
		<tr>
			<th>Location: </th>
			<td>{{{ $org->location }}}</td>
		</tr>
	</table>


<!-- 	<table class="_stats _right10 _in-block">
		<tr>
			<th>Views: </th>
			<td rowspan="2">{{{ $org->views }}}</td>
		</tr>
	</table>

	<table class="_stats _right10 _in-block">
		<tr>
			<th>Votes: </th>
			<td>{{{ $org->votes }}}</td>
			<td>Up-Dw</td>
		</tr>
	</table> -->
</div>

<p class="_center _f30">"<span class="_f30">{{{ $org->elevator }}}</span>"</p>



<h4>About {{{ $org->name }}}:</h4>
<div class="_about">
	@if(filter_var($org->video, FILTER_VALIDATE_URL))
<!-- height="315" -->
	<div class="vid-wrapper pull-left _right10">
		<div class="media-box">
		<!-- <div class="vid-wrapper"> -->
			<iframe src="//www.youtube.com/embed/
			{{{ substr($org->video, stripos($org->video, 'v=')+2, strlen($org->video)) }}}" 
			frameborder="0" allowfullscreen></iframe>
		<!-- </div> -->
		</div>
	</div>
	@endif

	{{ $org->description }}

</div>

<h2 class="contacts-header">Contacts</h2>
<div class="_w100 _p10">{{ $org->contacts }}</div>

{{ link_to_route('orgs.index', 'View all Orgs', null, array('class' => 'pull-left btn btn-link')) }}



@stop
