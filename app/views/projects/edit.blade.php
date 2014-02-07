@extends('layouts.scaffold')

@section('main')

<h1>Edit Project</h1>
{{ Form::model($project, array('method' => 'PATCH', 'route' => array('projects.update', $project->id))) }}
	<ul>
    
        <li class="pull-right">
            {{ Form::select('public', array('on' => 'Public', 'off' => 'Not Public',), 
                null, 
                array('class'=>'btn btn-sm btn-primary', 'id'=>'public')) }}
            {{ All::getDeleteLink($project) }}
        </li>
            
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class'=> 'form-control')) }}
        </li>

        <li>
            {{ Form::label('logo', 'Logo Link:') }}
            {{ Form::text('logo', null, array('class'=> 'form-control', 'placeholder' => 'http://...')) }}
        </li>

        <li>
            {{ Form::label('video', 'Youtube Video Link:') }}
            {{ Form::text('video', null, array('class'=> 'form-control', 'placeholder' => 'http://...')) }}
        </li>

        <li>
            {{ Form::label('elevator', 'Tagline:') }}
            {{ Form::text('elevator', null, array('class'=> 'form-control _w100')) }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type', null, array('class'=> 'form-control')) }}
        </li>

        <li>
            {{ Form::label('contacts', 'Contacts:') }}
            {{ Form::textarea('contacts', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('map', 'Click on the map to pin a new location...') }}
            <div id="single-map">
                {{ Form::text('map', null, array('id' => 'coords', 'class'=> 'form-control')) }}
            </div>
        </li>

        <li>
            {{ Form::label('location', 'Location Name:') }}
            {{ Form::text('location', null, array('class'=> 'form-control')) }}
        </li>
           
		<li class="_top10">
			{{ link_to_route('projects.show', 'Cancel', $project->id, array('class' => 'btn btn-default')) }}
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
