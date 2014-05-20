@extends('layouts.scaffold')

@section('main')

<h1>Edit Document</h1>
{{ Form::model($document, array('method' => 'PATCH', 'route' => array('documents.update', $document->id))) }}
	<ul>

        <li class="pull-right">
            {{ Form::select('public', array('on' => 'Public', 'off' => 'Not Public',), null, 
                array('class'=>'btn btn-sm btn-primary', 'id'=>'public')) }}
            {{ All::getDeleteLink($document) }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class'=> 'form-control _w100')) }}
        </li>

        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('notes', 'Notes:') }}
            {{ Form::textarea('notes', null, array('class'=>'form-control rich')) }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('documents.show', 'Cancel', $document->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
