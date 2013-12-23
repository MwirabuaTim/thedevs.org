@extends('layouts.scaffold')

@section('main')

<h1>Show Mydatatype</h1>

<p>{{ link_to_route('mydatatypes.index', 'Return to all mydatatypes') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Mycheckbox</th>
				<th>Myints</th>
				<th>Mydates</th>
				<th>Mystring</th>
				<th>Myfloat</th>
				<th>Mybigint</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $mydatatype->mycheckbox }}}</td>
					<td>{{{ $mydatatype->myints }}}</td>
					<td>{{{ $mydatatype->mydates }}}</td>
					<td>{{{ $mydatatype->mystring }}}</td>
					<td>{{{ $mydatatype->myfloat }}}</td>
					<td>{{{ $mydatatype->mybigint }}}</td>
                    <td>{{ link_to_route('mydatatypes.edit', 'Edit', array($mydatatype->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('mydatatypes.destroy', $mydatatype->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
