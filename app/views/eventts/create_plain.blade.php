
<h2>Create Your Event</h2>

{{ Form::open(array('route' => 'eventts.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class'=>'form-control')) }}
        </li>
<!-- 
        <li>
            {{ Form::label('pic', 'Pic:') }}
            {{ Form::text('pic') }}
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
            {{ Form::label('location', 'Location:') }}
            {{ Form::text('location', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('start_time', 'Start_time:') }}
            {{ Form::text('start_time', null, array('class'=>'form-control')) }}
        </li>

        <li>
            {{ Form::label('end_time', 'End_time:') }}
            {{ Form::text('end_time', null, array('class'=>'form-control')) }}
        </li>
        
<!--         <li>
            {{ Form::label('time_zone', 'Time_zone:') }}
            {{ Form::text('time_zone') }}
        </li>

        <li>
            {{ Form::label('recurrence_period', 'Recurrence_period:') }}
            {{ Form::text('recurrence_period') }}
        </li>

        <li>
            {{ Form::label('recurrence_count', 'Recurrence_count:') }}
            {{ Form::input('number', 'recurrence_count') }}
        </li>
 -->
 
<!--         <li>
            {{ Form::label('public', 'Public:') }}
            {{ Form::text('public') }}
        </li>
 -->
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


