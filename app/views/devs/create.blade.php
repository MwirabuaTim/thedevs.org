@extends('layouts.scaffold')

@section('main')

<h1>Create Dev</h1>

{{ Form::open(array('route' => 'devs.store')) }}
	<ul>
        <li>
            {{ Form::label('first_name', 'First Name:') }}
            {{ Form::text('first_name') }}
        </li>

        <li>
            {{ Form::label('last_name', 'Last_name:') }}
            {{ Form::text('last_name') }}
        </li>

        <li>
            {{ Form::label('pic', 'Picture Link:') }}
            {{ Form::text('pic') }}
        </li>
        
        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('phone', 'Phone:') }}
            {{ Form::text('phone') }}
        </li>

        <li>
            {{ Form::label('elevator', 'Tagline:') }}
            {{ Form::text('elevator') }}
        </li>

        <li>
            {{ Form::label('about', 'About:') }}
            {{ Form::textarea('about') }}
        </li>

        <li>
            {{ Form::label('location', 'Location Name:') }}
            {{ Form::text('location') }}
        </li>

        <li>
            {{ Form::label('public', 'Public:') }}
            {{ Form::checkbox('public') }}
        </li>

        <li>
            {{ Form::label('notes', 'Notes:') }}
            {{ Form::textarea('notes') }}
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


