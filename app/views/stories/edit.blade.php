@extends('layouts.scaffold')

@section('main')

<h1>Edit Story</h1>
{{ Form::model($story, array('method' => 'PATCH', 'route' => array('stories.update', $story->id))) }}
	<ul>
 
        <li class="pull-right">
            {{ Form::select('public', array('on' => 'Public', 'off' => 'Not Public',), 
                null, 
                array('class'=>'btn btn-sm btn-primary', 'id'=>'public')) }}
            {{ All::getDeleteLink($story) }}
        </li>

        <li>
            {{ Form::label('name', 'Title:') }}
            {{ Form::text('name', null, array('class'=> 'form-control _w100')) }}
        </li>

        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('map', 'Click on the map to pin the exact location...') }}
            <div id="single-map">
                {{ Form::text('map', null, array('id' => 'coords', 'class'=> 'form-control')) }}
            </div>
        </li>

        <li>
            {{ Form::label('location', 'Location Name:') }}
            {{ Form::text('location', null, array('class'=> 'form-control')) }}
        </li>

		<li class="_top10">
			{{ link_to_route('stories.show', 'Cancel', $story->id, array('class' => 'btn btn-default')) }}
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
