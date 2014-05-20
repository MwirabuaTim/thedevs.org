@extends('layouts.scaffold')

@section('main')

<h1>Create Star</h1>

{{ Form::open(array('route' => 'stars.store')) }}
	<ul>
        <li>
            {{ Form::label('giver', 'Giver:') }}
            {{ Form::input('number', 'giver') }}
        </li>

        <li>
            {{ Form::label('recipient', 'Recipient:') }}
            {{ Form::input('number', 'recipient') }}
        </li>

        <li>
            {{ Form::label('count', 'Count:') }}
            {{ Form::input('number', 'count') }}
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


