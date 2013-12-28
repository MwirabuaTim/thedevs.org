
<h2>Create Your Story</h2>

{{ Form::open(array('route' => 'stories.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Title:') }}
            {{ Form::text('name', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('location', 'Location Name:') }}
            {{ Form::text('location', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::checkbox('public', null, null, array('class'=>'_inline')) }}
            {{ Form::label('public', 'Public:') }}
        </li>
        
		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info form-control')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif


