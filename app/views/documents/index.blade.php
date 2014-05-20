@extends('layouts.scaffold')

@section('main')

<h1>All Documents</h1>

<p>{{ link_to_route('documents.create', 'Add new document') }}</p>

@if ($documents->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th class="pull-left">Title</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($documents as $document)
				<tr>
					<td>{{ link_to_route('documents.show', $document->title, array($document->id)) }}</td>
					@if(All::hasEditRight($document))
                    <td>{{ link_to_route('documents.edit', 'Edit', array($document->id), array('class' => 'btn btn-info btn-sm')) }}</td>
                    @endif
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no documents
@endif

@stop
