@extends('layouts.scaffold')

{{-- Page title --}}
@section('title')
Edit Profile
@stop

{{-- Account page content --}}
@section('main')
<div class="_in-block _w100 _top10">
	<h4 class="pull-left">Edit Your Profile</h4>
</div>

{{ Form::open(array('route' => array('devs.update', $dev->id), 'method' => 'PUT',
 'files' => true, 'enctype' => 'multipart/form-data')) }}
<span class="pull-right">
	{{--! Request::path() --}}
	@if(All::hasEditRight($dev))
		@if(Sentry::getUser()->hasAccess('admin'))
			{{ All::getDeleteLink($dev) }}
		@endif

		{{ Form::select('public', array('on' => 'Public', 'off' => 'Not Public',), 
			Input::old('public', $dev->public), 
			array('class'=>'btn btn-sm btn-primary', 'id'=>'public')) }}
		{{ link_to_route('change-email', 'Change Email', null, array('class' => 'btn btn-sm btn-primary')) }}
		{{ link_to_route('change-password', 'Change Password', null, array('class' => 'btn btn-sm btn-primary')) }}
	@endif
</span>



{{--! Form::model($dev, array('method' => 'PATCH', 'route' => array('devs.update', $dev->id))) --}}
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
	
	<!-- First Name -->
	<div class="control-group{{ $errors->first('first_name', ' error') }}">
		<label class="control-label" for="first_name">First Name</label>
		<div class="controls">
			<input class="form-control" type="text" name="first_name" id="first_name" 
				value="{{ Input::old('first_name', $dev->first_name) }}" />
			{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Last Name -->
	<div class="control-group{{ $errors->first('last_name', ' error') }}">
		<label class="control-label" for="last_name">Last Name</label>
		<div class="controls">
			<input class="form-control" type="text" name="last_name" id="last_name" value="{{ Input::old('last_name', $dev->last_name) }}" />
			{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	
	<!-- phone -->
	<div class="control-group{{ $errors->first('phone', ' error') }}">
		<label class="control-label" for="phone">Phone</label>
		<div class="controls">
			<input class="form-control" type="text" name="phone" id="phone" value="{{ Input::old('phone', $dev->phone) }}" />
			{{ $errors->first('phone', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- pic -->
	<div class="control-group{{ $errors->first('pic', ' error') }}">
        <label class="control-label"> Profile Picture (400x400): </label>
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail">
                <img src="{{ Input::old('pic', All::getImage($dev)) }}" alt=""/>
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail"></div>
            <div>
             <span class="btn btn-white btn-file">
             <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Picture</span>
             <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
             {{ Form::file('pic', null, array('id' => 'pic', 'rows' => '10', 'class' => 'form-control', 'placeholder' => 'Image')) }}
             </span>
            </div>
        </div>
		{{ $errors->first('pic', '<span class="help-block">:message</span>') }}
    </div>

	<!-- video -->
	<div class="control-group{{ $errors->first('video', ' error') }}">
		<label class="control-label" for="video">Youtube Video Link</label>
		<div class="controls">
			<input class="form-control" type="text" placeholder="http://..." name="video" id="video" value="{{ Input::old('video', $dev->video) }}" />
			{{ $errors->first('video', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<!-- elevator -->
	<div class="control-group{{ $errors->first('elevator', ' error') }}">
		<label class="control-label" for="elevator">Tagline</label>
		<div class="controls">
			<input class="form-control _w100" type="text" name="elevator" id="elevator" value="{{ Input::old('elevator', $dev->elevator) }}" />
			{{ $errors->first('elevator', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<!-- about -->
	<div class="control-group{{ $errors->first('about', ' error') }}">
		{{ Form::label('about', 'About:', array('class'=>'control-label')) }}
		<div class="controls">
            {{ Form::textarea('about', Input::old('about', $dev->about), array('class'=>'form-control rich')) }}
			{{ $errors->first('about', '<span class="help-block">:message</span>') }}
		</div>
	</div>
	<!-- Mapping -->
	<div class="control-group{{ $errors->first('map', ' error') }}">
		<label class="control-label _top10" for="map">Click on the map to pin the exact location...</label>
		<div class="controls">
			<div id="single-map">
				<input class="hidden" type="text" name="map" value="{{ Input::old('map', $dev->map) }}" />
				{{ $errors->first('map', '<span class="help-block">:message</span>') }}
			</div>
		</div>
	</div>
	<!-- location -->
	<div class="control-group{{ $errors->first('location', ' error') }}">
		<label class="control-label" for="location">Name of Location</label>
		<div class="controls">
			<input class="form-control" type="text" name="location" id="location" value="{{ Input::old('location', $dev->location) }}" />
			{{ $errors->first('location', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- Contacts -->
	<div class="control-group{{ $errors->first('contacts', ' error') }}">
		{{ Form::label('contacts', 'Contacts:', array('class'=>'control-label')) }}
		<div class="controls">
            {{ Form::textarea('contacts', All::getContacts($dev), array('class'=>'form-control rich')) }}
			{{ $errors->first('contacts', '<span class="help-block">:message</span>') }}
		</div>
	</div>

	<!-- notes -->
	<div class="hidden control-group{{ $errors->first('notes', ' error') }}">
		{{ Form::label('notes', 'Notes:', array('class'=>'control-label')) }}
		<div class="controls">
            {{ Form::textarea('notes', Input::old('notes', $dev->notes), array('class'=>'form-control rich')) }}
			{{ $errors->first('notes', '<span class="help-block">:message</span>') }}
		</div>
	</div>


	<!-- Form actions -->
	<div class="control-group">
		<div class="controls _in-block _w100 _top10">
			{{ link_to_route('devs.show', 'Back', $dev->id, array('class' => 'btn btn-default')) }}
			<button type="submit" class="btn btn-primary _left10">Update</button>
		</div>
	</div>

	<hr>

</form>
@stop
