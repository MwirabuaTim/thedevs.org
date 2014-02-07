@extends('layouts.scaffold')

@section('main')

<h1>Edit Event</h1>
{{ Form::model($eventt, array('method' => 'PATCH', 'route' => array('eventts.update', $eventt->id))) }}
	<ul class="control-group">
    
        <li class="pull-right">
            {{ Form::select('public', array('on' => 'Public', 'off' => 'Not Public',), 
                null, 
                array('class'=>'btn btn-sm btn-primary', 'id'=>'public')) }}
            {{ All::getDeleteLink($eventt) }}
        </li>

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
            {{ Form::label('map', 'Click on the map to pin a new location...') }}
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

		<li class="_top10">
			{{ link_to_route('eventts.show', 'Cancel', $eventt->id, array('class' => 'btn btn-default')) }}
            {{ Form::submit('Update', array('class' => 'btn btn-info _left10')) }}
		</li>

	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
