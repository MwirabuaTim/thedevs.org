@extends('layouts.scaffold')

@section('main')

<h1>Edit Kit</h1>
{{ Form::model($kit, array('method' => 'PATCH', 'route' => array('kits.update', $kit->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('about', 'About:') }}
            {{ Form::textarea('about') }}
        </li>

        <li>
            {{ Form::label('public', 'Public:') }}
            {{ Form::checkbox('public') }}
        </li>

        <li>
            {{ Form::label('notes', 'Notes (Visible to creator only):') }}
            {{ Form::textarea('notes') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('kits.show', 'Cancel', $kit->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
