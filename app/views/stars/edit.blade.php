@extends('layouts.scaffold')

@section('main')

<h1>Edit Star</h1>
{{ Form::model($star, array('method' => 'PATCH', 'route' => array('stars.update', $star->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('stars.show', 'Cancel', $star->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
