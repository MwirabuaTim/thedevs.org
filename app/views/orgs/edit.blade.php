@extends('layouts.scaffold')

@section('main')

<h1>Edit Org</h1>
{{ Form::model($org, array('method' => 'PATCH', 'route' => array('orgs.update', $org->id))) }}
	<ul>
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
            {{ Form::label('public', 'Public:') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('orgs.show', 'Cancel', $org->id, array('class' => 'btn')) }}
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
