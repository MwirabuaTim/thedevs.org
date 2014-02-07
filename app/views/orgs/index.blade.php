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
	<table class="table table-striped table-bordered _top10">
		<thead>
			<tr>
				<th>Logo</th>
				<th>Name</th>
				<!-- <th>Tagline</th> -->
				<th>Type</th>
				<th>Location</th>
				<th>Creator</th>
			</tr>
		</thead>

		<tbody>
			@foreach($orgs as $org)
				<tr> 
					<td rowspan="2">{{ All::getImageLink($org, '_list-img') }}</td>
					<td>{{ All::getNameLink($org) }}</td>
					<!-- <td>{{ All::getTagline($org) }}</td> -->
					<td>{{{ $org->type }}}</td>
					<td>{{ All::getLocation($org) }}</td>
					<td rowspan="2">{{ All::getCreatorImageLink($org, '_list-img') }}
						<br/>{{ All::getCreatorLink($org) }}</td>
				</tr>
				<tr><td>Tagline: </td><td colspan="2" class="_left">{{ All::getTagline($org) }}</td></tr>
			@endforeach
		</tbody>
	</table>
	{{ $orgs->links() }}
@else
	There are no orgs
@endif

@stop
