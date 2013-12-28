@extends('layouts.scaffold')

@section('main')

<h1>Edit Story</h1>
{{ Form::model($story, array('method' => 'PATCH', 'route' => array('stories.update', $story->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Title:') }}
            {{ Form::text('name', null, array('class'=> 'form-control _w100')) }}
        </li>

        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('map', 'Pin the Location:') }}
            <div id="single-map">
                {{ Form::text('map', null, array('id' => 'coords', 'class'=> 'form-control')) }}
            </div>
        </li>

        <li>
            {{ Form::label('location', 'Location Name:') }}
            {{ Form::text('location', null, array('class'=> 'form-control')) }}
        </li>

        <li>
            {{ Form::checkbox('public', null, null, array('class'=> '_inline')) }}
            {{ Form::label('public', 'Public') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('stories.show', 'Cancel', $story->id, array('class' => 'btn')) }}
		</li>

	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
