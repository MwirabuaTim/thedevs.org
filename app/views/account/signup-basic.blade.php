	<!-- <form method="post" action="{{ route('signup') }}" class="form-horizontal" autocomplete="off"> -->
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- popup indicator -->
		<input type="hidden" name="status" id="password" value="signup" />

		<!-- First Name -->
		<div class="control-group{{ $errors->first('first_name', ' error') }}">
		<label class="control-label" for="first_name">First Name</label>
			<input class="form-control" type="text" name="first_name" id="first_name" value="{{ Input::old('first_name') }}" />
			{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Last Name -->
		<div class="control-group{{ $errors->first('last_name', ' error') }}">
			<label class="control-label" for="last_name">Last Name</label>
			<input class="form-control" type="text" name="last_name" id="last_name" value="{{ Input::old('last_name') }}" />
			{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Email -->
		<div class="control-group{{ $errors->first('email', ' error') }}">
			<label class="control-label" for="email">Email</label>
			<input class="form-control" type="text" name="email" id="email" value="{{ Input::old('email') }}" />
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		</div>


		<!-- Password -->
		<div class="control-group{{ $errors->first('password', ' error') }}">
			<label class="control-label" for="password">Password</label>
			<input class="form-control" type="password" name="password" id="password" value="" />
			{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Password Confirm -->
		<div class="control-group{{ $errors->first('password_confirm', ' error') }}">
			<label class="control-label" for="password_confirm">Confirm Password</label>
			<input class="form-control" type="password" name="password_confirm" id="password_confirm" value="" />
			{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Form actions -->
		<div class="control-group">
			<a class="btn btn-warning" href="{{ route('home') }}">Cancel</a>
			<button type="submit" class="btn btn-info pull-right">Sign up</button>
		</div>
	<!-- </form> -->