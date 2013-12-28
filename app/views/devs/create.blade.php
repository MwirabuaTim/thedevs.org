@extends('layouts.scaffold')

@section('main')

<h1>Create Dev</h1>

{{ Form::open(array('route' => 'devs.store')) }}
	<ul>
        <li>
            {{ Form::label('first_name', 'First Name:') }}
            {{ Form::text('first_name', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('last_name', 'Last_name:') }}
            {{ Form::text('last_name', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('pic', 'Picture Link:') }}
            {{ Form::text('pic', null, array('class'=>'form-control')) }}
        </li>
        
        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('phone', 'Phone:') }}
            {{ Form::text('phone', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('elevator', 'Tagline:') }}
            {{ Form::text('elevator', null, array('class'=>'form-control _w100')) }}
        </li>

        <li>
            {{ Form::label('about', 'About:') }}
            {{ Form::textarea('about', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('location', 'Location Name:') }}
            {{ Form::text('location', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::checkbox('public', null, null, array('class'=>'_inline')) }}
            {{ Form::label('public', 'Public:') }}
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


