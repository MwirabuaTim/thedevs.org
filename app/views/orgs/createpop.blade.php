
<h2>Creating an Organisation</h2>

{{ Form::open(array('route' => 'orgs.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class'=>'form-control')) }}
        </li>

<!--         <li>
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
            {{ Form::label('type', 'Type of Organization:') }}
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

