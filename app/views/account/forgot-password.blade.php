@extends('layouts.scaffold')

{{-- Page title --}}
@section('title')
Forgot Password ::
@parent
@stop

{{-- Page content --}}
@section('main')
<div class="page-header">
	<h3>Forgot Password</h3>
</div>
<form method="post" action="" class="form-horizontal">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	<!-- Email -->
	<div class="control-group{{ $errors->first('email', ' error') }}">
		<label class="control-label" for="email">Email</label>
		<input type="text" class="form-control" name="email" id="email" value="{{ Input::old('email') }}" />
		{{ $errors->first('email', '<span class="help-block">:message</span>') }}
	</div>

	<!-- Form actions -->
	<div class="control-group">
		<a class="btn btn-warning" href="{{ route('home') }}">Cancel</a>
		<button type="submit" class="btn btn-info">Submit</button>
	</div>
</form>
@stop
