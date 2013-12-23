@extends('layouts.scaffold')

@section('main')

<h1>Edit Mydatatype</h1>
{{ Form::model($mydatatype, array('method' => 'PATCH', 'route' => array('mydatatypes.update', $mydatatype->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('mydatatypes.show', 'Cancel', $mydatatype->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
