@extends('layouts.scaffold')

@section('main')

<h1>All Stars</h1>

<p>{{ link_to_route('stars.create', 'Add new star') }}</p>

@if ($stars->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Giver</th>
				<th>Recipient</th>
				<th>Count</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($stars as $star)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no stars
@endif

@stop
