@extends('layouts.scaffold')

@section('main')

<h1>Edit Eventt</h1>
{{ Form::model($eventt, array('method' => 'PATCH', 'route' => array('eventts.update', $eventt->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('pic', 'Picture Link:') }}
            {{ Form::text('pic') }}
        </li>

        <li>
            {{ Form::label('organizer', 'Organizer:') }}
            {{ Form::input('number', 'organizer') }}
        </li>

        <li>
            {{ Form::label('elevator', 'Elevator:') }}
            {{ Form::text('elevator') }}
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
            {{ Form::label('location', 'Location Name:') }}
            {{ Form::text('location') }}
        </li>

        <li>
            {{ Form::label('map', 'Map:') }}
            {{ Form::text('map') }}
        </li>

        <li>
            {{ Form::label('start_time', 'Start_time:') }}
            {{ Form::text('start_time') }}
        </li>

        <li>
            {{ Form::label('end_time', 'End_time:') }}
            {{ Form::text('end_time') }}
        </li>

        <li>
            {{ Form::label('time_zone', 'Time_zone:') }}
            {{ Form::text('time_zone') }}
        </li>

        <li>
            {{ Form::label('recurrence_period', 'Recurrence_period:') }}
            {{ Form::text('recurrence_period') }}
        </li>

        <li>
            {{ Form::label('recurrence_count', 'Recurrence_count:') }}
            {{ Form::input('number', 'recurrence_count') }}
        </li>

        <li>
            {{ Form::label('public', 'Public:') }}
            {{ Form::text('public') }}
        </li>

        <li>
            {{ Form::label('notes', 'Notes:') }}
            {{ Form::textarea('notes') }}
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
            {{ Form::label('status', 'Status:') }}
            {{ Form::text('status') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('eventts.show', 'Cancel', $eventt->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
