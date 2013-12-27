@extends('layouts.scaffold')

@section('main')

<h1>Edit Event</h1>
{{ Form::model($eventt, array('method' => 'PATCH', 'route' => array('eventts.update', $eventt->id))) }}
	<ul class="control-group">
        <li>
            {{ Form::label('name', 'Event Name:') }}
            {{ Form::text('name', null, array('class'=>'form-control _w100')) }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('map', 'Pin the Location:') }}
            <div id="single-map">
                {{ Form::text('map', null, array('id' => 'coords', 'class'=> 'form-control')) }}
            </div>
        </li>

        <li>
            {{ Form::label('location', 'Location Name:') }}
            {{ Form::text('location', null, array('class'=>'form-control')) }}
        </li

        <li>
            {{ Form::label('start_time', 'Start Time:') }}
            {{ Form::text('start_time', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('end_time', 'End Time:') }}
            {{ Form::text('end_time', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::checkbox('public', null, null, array('class'=> '_inline')) }}
            {{ Form::label('public', 'Public:') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('eventts.show', 'Cancel', $eventt->id, array('class' => 'btn')) }}
		</li>

        <li class="hidden">
            {{ Form::label('notes', 'Notes') }}
            {{ Form::textarea('notes', null, array('class'=>'form-control hidden')) }}
        </li>

	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
