@extends('layouts.scaffold')

@section('main')

<div class="_w100 _in-block">
	<h1 class="pull-left">{{{ $document->title }}}</h1>

	@if(All::hasEditRight($document))
		<span class="pull-right">
		{{ All::getPublicity($document) }} 
		{{ link_to_route('documents.edit', 'Edit', array($document->id), array('class' => 'btn btn-info')) }}
		</span>
	@endif
	
</div>

<table class="_right10 _in-block">
	<tr>
		<th>Author: </th>
		<td>{{ All::getCreatorLink($document) }}</td>
	</tr>
</table>

<div class="_w100 _p10">{{ $document->body }}</div>

@stop
