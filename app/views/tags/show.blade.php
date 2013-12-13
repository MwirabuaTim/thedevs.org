@extends('layouts.scaffold')

@section('main')

<h1>Show Tag</h1>

<p>{{ link_to_route('tags.index', 'Return to all tags') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Owner_type</th>
				<th>Owner_id</th>
				<th>Tagged_type</th>
				<th>Tagged_id</th>
				<th>Status1</th>
				<th>Status2</th>
				<th>Status3</th>
				<th>Status4</th>
				<th>Status5</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tag->owner_type }}}</td>
					<td>{{{ $tag->owner_id }}}</td>
					<td>{{{ $tag->tagged_type }}}</td>
					<td>{{{ $tag->tagged_id }}}</td>
					<td>{{{ $tag->status1 }}}</td>
					<td>{{{ $tag->status2 }}}</td>
					<td>{{{ $tag->status3 }}}</td>
					<td>{{{ $tag->status4 }}}</td>
					<td>{{{ $tag->status5 }}}</td>
                    <td>{{ link_to_route('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
