@extends('layouts.scaffold')

@section('main')

<h1>Edit Project</h1>
{{ Form::model($project, array('method' => 'PATCH', 'route' => array('projects.update', $project->id),
 'files' => true, 'enctype' => 'multipart/form-data')) }}
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

        <!-- logo -->
        <li class="control-group{{ $errors->first('logo', ' error') }}">
            <label class="control-label"> Logo (400x400): </label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail">
                    <img src="{{ Input::old('logo', $project->logo) }}" alt=""/>
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail"></div>
                <div>
                 <span class="btn btn-white btn-file">
                 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Image</span>
                 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                 {{ Form::file('logo', null, array('id' => 'logo', 'rows' => '10', 'class' => 'form-control', 'placeholder' => 'Image')) }}
                 </span>
                </div>
            </div>
            {{ $errors->first('logo', '<span class="help-block">:message</span>') }}
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
