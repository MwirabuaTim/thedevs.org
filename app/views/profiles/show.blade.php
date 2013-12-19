@extends('layouts.scaffold')

@section('main')

<h1>Show Profile</h1>

<p>{{ link_to_route('profiles.index', 'Return to all profiles') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Provider</th>
				<th>First_name</th>
				<th>Last_name</th>
				<th>Email</th>
				<th>Pic</th>
				<th>Location</th>
				<th>Description</th>
				<th>Username</th>
				<th>Uid</th>
				<th>Link</th>
				<th>Code</th>
				<th>Field1</th>
				<th>Field2</th>
				<th>Field3</th>
				<th>Field4</th>
				<th>Field5</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $profile->provider }}}</td>
					<td>{{{ $profile->first_name }}}</td>
					<td>{{{ $profile->last_name }}}</td>
					<td>{{{ $profile->email }}}</td>
					<td>{{{ $profile->pic }}}</td>
					<td>{{{ $profile->location }}}</td>
					<td>{{{ $profile->description }}}</td>
					<td>{{{ $profile->username }}}</td>
					<td>{{{ $profile->uid }}}</td>
					<td>{{{ $profile->link }}}</td>
					<td>{{{ $profile->code }}}</td>
					<td>{{{ $profile->field1 }}}</td>
					<td>{{{ $profile->field2 }}}</td>
					<td>{{{ $profile->field3 }}}</td>
					<td>{{{ $profile->field4 }}}</td>
					<td>{{{ $profile->field5 }}}</td>
                    <td>{{ link_to_route('profiles.edit', 'Edit', array($profile->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('profiles.destroy', $profile->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
