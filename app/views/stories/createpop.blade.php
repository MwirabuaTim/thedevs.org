
<h2>Creating a Story</h2>

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
            {{ Form::select('public', array('on' => 'Public', 'off' => 'Not Public'), 'on', 
                array('class'=>'btn btn-sm btn-primary', 'id'=>'public')) }}
            {{ Form::label('public', 'Visibility to the world') }}
            {{ Form::submit('Submit', array('class' => 'btn btn-info pull-right')) }}
        </li>
        
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif


