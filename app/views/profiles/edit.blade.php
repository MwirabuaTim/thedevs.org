@extends('layouts.scaffold')

@section('main')

<h1>Edit Profile</h1>
{{ Form::model($profile, array('method' => 'PATCH', 'route' => array('profiles.update', $profile->id))) }}
	<ul>
        <li>
            {{ Form::label('provider', 'Provider:') }}
            {{ Form::text('provider') }}
        </li>

        <li>
            {{ Form::label('first_name', 'First_name:') }}
            {{ Form::text('first_name') }}
        </li>

        <li>
            {{ Form::label('last_name', 'Last_name:') }}
            {{ Form::text('last_name') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('pic', 'Pic:') }}
            {{ Form::text('pic') }}
        </li>

        <li>
            {{ Form::label('location', 'Location:') }}
            {{ Form::text('location') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description') }}
        </li>

        <li>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
        </li>

        <li>
            {{ Form::label('uid', 'Uid:') }}
            {{ Form::text('uid') }}
        </li>

        <li>
            {{ Form::label('link', 'Link:') }}
            {{ Form::text('link') }}
        </li>

        <li>
            {{ Form::label('code', 'Code:') }}
            {{ Form::text('code') }}
        </li>

        <li>
            {{ Form::label('field1', 'Field1:') }}
            {{ Form::text('field1') }}
        </li>

        <li>
            {{ Form::label('field2', 'Field2:') }}
            {{ Form::text('field2') }}
        </li>

        <li>
            {{ Form::label('field3', 'Field3:') }}
            {{ Form::text('field3') }}
        </li>

        <li>
            {{ Form::label('field4', 'Field4:') }}
            {{ Form::text('field4') }}
        </li>

        <li>
            {{ Form::label('field5', 'Field5:') }}
            {{ Form::text('field5') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('profiles.show', 'Cancel', $profile->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
