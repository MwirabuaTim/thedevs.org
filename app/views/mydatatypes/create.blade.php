@extends('layouts.scaffold')

@section('main')

<h1>Create Mydatatype</h1>

{{ Form::open(array('route' => 'mydatatypes.store')) }}
	<ul>
        <li>
            {{ Form::label('mycheckbox', 'Mycheckbox:') }}
            {{ Form::checkbox('mycheckbox') }}
        </li>

        <li>
            {{ Form::label('myints', 'Myints:') }}
            {{ Form::input('number', 'myints') }}
        </li>

        <li>
            {{ Form::label('mydates', 'Mydates:') }}
            {{ Form::text('mydates') }}
        </li>

        <li>
            {{ Form::label('mystring', 'Mystring:') }}
            {{ Form::textarea('mystring') }}
        </li>

        <li>
            {{ Form::label('myfloat', 'Myfloat:') }}
            {{ Form::text('myfloat') }}
        </li>

        <li>
            {{ Form::label('mybigint', 'Mybigint:') }}
            {{ Form::text('mybigint') }}
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


