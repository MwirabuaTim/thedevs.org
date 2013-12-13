@extends('layouts.scaffold')

@section('main')

<h1>Create Project</h1>

{{ Form::open(array('route' => 'projects.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('logo', 'Logo:') }}
            {{ Form::text('logo') }}
        </li>

        <li>
            {{ Form::label('video', 'Video:') }}
            {{ Form::text('video') }}
        </li>

        <li>
            {{ Form::label('creator', 'Creator:') }}
            {{ Form::input('number', 'creator') }}
        </li>

        <li>
            {{ Form::label('elevator', 'Elevator:') }}
            {{ Form::text('elevator') }}
        </li>

        <li>
            {{ Form::label('link', 'Link:') }}
            {{ Form::text('link') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type') }}
        </li>

        <li>
            {{ Form::label('contacts', 'Contacts:') }}
            {{ Form::textarea('contacts') }}
        </li>

        <li>
            {{ Form::label('forum_id', 'Forum_id:') }}
            {{ Form::input('number', 'forum_id') }}
        </li>

        <li>
            {{ Form::label('location', 'Location:') }}
            {{ Form::text('location') }}
        </li>

        <li>
            {{ Form::label('map', 'Map:') }}
            {{ Form::text('map') }}
        </li>

        <li>
            {{ Form::label('views', 'Views:') }}
            {{ Form::input('number', 'views') }}
        </li>

        <li>
            {{ Form::label('votes', 'Votes:') }}
            {{ Form::input('number', 'votes') }}
        </li>

        <li>
            {{ Form::label('notes', 'Notes:') }}
            {{ Form::textarea('notes') }}
        </li>

        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::text('status') }}
        </li>

        <li>
            {{ Form::label('public', 'Public:') }}
            {{ Form::text('public') }}
        </li>

		<li>
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


