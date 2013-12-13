@extends('layouts.scaffold')

@section('main')

<h1>Create Tag</h1>

{{ Form::open(array('route' => 'tags.store')) }}
	<ul>
        <li>
            {{ Form::label('owner_type', 'Owner_type:') }}
            {{ Form::text('owner_type') }}
        </li>

        <li>
            {{ Form::label('owner_id', 'Owner_id:') }}
            {{ Form::text('owner_id') }}
        </li>

        <li>
            {{ Form::label('tagged_type', 'Tagged_type:') }}
            {{ Form::text('tagged_type') }}
        </li>

        <li>
            {{ Form::label('tagged_id', 'Tagged_id:') }}
            {{ Form::text('tagged_id') }}
        </li>

        <li>
            {{ Form::label('status1', 'Status1:') }}
            {{ Form::text('status1') }}
        </li>

        <li>
            {{ Form::label('status2', 'Status2:') }}
            {{ Form::text('status2') }}
        </li>

        <li>
            {{ Form::label('status3', 'Status3:') }}
            {{ Form::text('status3') }}
        </li>

        <li>
            {{ Form::label('status4', 'Status4:') }}
            {{ Form::text('status4') }}
        </li>

        <li>
            {{ Form::label('status5', 'Status5:') }}
            {{ Form::text('status5') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


