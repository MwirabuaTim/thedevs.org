
<h2>Creating a Project</h2>
<a href="/" class="_clearLS pull-right btn btn-link">Delete</a>

{{ Form::open(array('route' => 'projects.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class'=>'form-control')) }}
        </li>
<!-- 
        <li>
            {{ Form::label('logo', 'Logo:') }}
            {{ Form::text('logo') }}
        </li>

        <li>
            {{ Form::label('video', 'Video:') }}
            {{ Form::text('video') }}
        </li>
 -->  
        <li>
            {{ Form::label('elevator', 'Tagline:') }}
            {{ Form::text('elevator', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('type', 'Type of Project:') }}
            {{ Form::text('type', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('contacts', 'Contacts:') }}
            {{ Form::textarea('contacts', null, array('class'=>'form-control rich')) }}
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

