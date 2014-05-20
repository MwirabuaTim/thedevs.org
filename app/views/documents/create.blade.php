@extends('layouts.scaffold')

@section('main')

<h1>Create A Document</h1>

{{ Form::open(array('route' => 'documents.store')) }}
	<ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class'=>'form-control _w100')) }}
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
            {{ Form::select('public', array('on' => 'Public', 'off' => 'Not Public',), null, 
                array('class'=>'btn btn-sm btn-primary', 'id'=>'public')) }}
        </li>

        <li class="pull-right">
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


