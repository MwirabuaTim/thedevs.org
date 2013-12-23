
<h2>Create Your Org</h2>

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

        <li>
            {{ Form::label('elevator', 'Tagline:') }}
            {{ Form::text('elevator') }}
        </li>
 -->
        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('contacts', 'Contacts:') }}
            {{ Form::textarea('contacts', null, array('class'=>'form-control rich')) }}
        </li>

        <li>
            {{ Form::label('location', 'Location:') }}
            {{ Form::text('location', null, array('class'=>'form-control')) }}
        </li>
<!-- 
        <li>
            {{ Form::label('public', 'Public:') }}
            {{ Form::text('public') }}
        </li> -->

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

