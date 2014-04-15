@extends('layouts.scaffold')

@section('main')

<h1>Show Star</h1>

<p>{{ link_to_route('stars.index', 'Return to all stars') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Giver</th>
				<th>Recipient</th>
				<th>Count</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $star->giver }}}</td>
					<td>{{{ $star->recipient }}}</td>
					<td>{{{ $star->count }}}</td>
                    <td>{{ link_to_route('stars.edit', 'Edit', array($star->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('stars.destroy', $star->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
