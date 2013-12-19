@extends('layouts.scaffold')

@section('main')

@if(Sentry::check())
<div class="_content">
<h1>{{{ $dev->first_name }}}&nbsp; {{{ $dev->last_name }}}</h1>

@if(Request::path() == 'devs/'.Sentry::getUser()->id)
	<h4 class="pull-right"><a href="{{{ URL::to('account/profile') }}}">Edit</a></h4>
@endif



<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Pic</th>
			<th>Video</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Elevator</th>
			<th>About</th>
			<th>Location</th>
			<th>Views</th>
			<th>Votes</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td><img src="{{{ $dev->pic }}}" /></td>
			<td>{{{ $dev->video }}}</td>
			<td>{{{ $dev->email }}}</td>
			<td>{{{ $dev->phone }}}</td>
			<td>{{{ $dev->elevator }}}</td>
			<td>{{{ $dev->about }}}</td>
			<td>{{{ $dev->location }}}</td>
			<td>{{{ $dev->views }}}</td>
			<td>{{{ $dev->votes }}}</td>
            
		</tr>
	</tbody>
</table>

<a href="{{ URL::to('devs') }}">View All Devs</a>


@if(Request::path() == 'devs/'.Sentry::getUser()->id)
	<h4 class="pull-right"><a href="{{{ URL::to('auth/logout') }}}">Log Out</a></h4>
@endif

@else
	<h4>You have to be logged in to see this!<h4>
@endif
</div>
@stop
