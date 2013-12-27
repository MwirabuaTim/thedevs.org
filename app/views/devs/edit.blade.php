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
{{ Form::model($dev, array('method' => 'PATCH', 'route' => array('devs.update', $dev->id))) }}
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

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
	<!-- Email - @tim implement activation of changed emails -->
<!-- 	<div class="control-group{{ $errors->first('email', ' error') }}">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<input class="form-control" type="text" name="email" id="email" value="{{ Input::old('email', $dev->email) }}" />
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>
	</div> -->
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
		<label class="control-label" for="pic">Picture Link:</label>
		<div class="controls">
			<input class="form-control" type="text" placeholder="http://..." name="pic" id="pic" value="{{ Input::old('pic', $dev->pic) }}" />
			{{ $errors->first('pic', '<span class="help-block">:message</span>') }}
		</div>
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
		<label class="control-label" for="map">Pin Your Location:</label>
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
	<!-- public -->
	<div class="control-group{{ $errors->first('public', ' error') }} _checkbox">
        {{ Form::checkbox('public', null, Input::old('public', $dev->public), array('class'=> '_inline')) }}
		{{ Form::label('public', 'Public') }}
        {{ $errors->first('public', '<span class="help-block">:message</span>') }}
	</div>
	<!-- notes -->
	<div class="hidden control-group{{ $errors->first('notes', ' error') }}">
		{{ Form::label('notes', 'Notes:', array('class'=>'control-label')) }}
		<div class="controls">
            {{ Form::textarea('notes', Input::old('notes', $dev->notes), array('class'=>'form-control')) }}
			{{ $errors->first('notes', '<span class="help-block">:message</span>') }}
		</div>
	</div>


	<!-- Form actions -->
	<div class="control-group">
		<div class="controls _in-block _w100 _top10">
			{{ link_to_route('devs.show', 'Back', $dev->id, array('class' => 'btn btn-default')) }}
			<button type="submit" class="btn btn-primary pull-right">Update</button>
		</div>
	</div>

	<hr>

</form>
@stop
