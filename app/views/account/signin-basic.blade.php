	<!-- <form method="post" action="{{ URL::to('auth/signin') }}" class="form-horizontal"> -->
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- popup indicator -->
		<input type="hidden" name="status" id="password" value="signin" />
		
		<!-- Email -->
		<div class="control-group{{ $errors->first('email', ' error') }}">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<input type="text" name="email" id="email" value="{{ Input::old('email') }}" />
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
			</div>
		</div>

		<!-- Password -->
		<div class="control-group{{ $errors->first('password', ' error') }}">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input type="password" name="password" id="password" value="" />
				{{ $errors->first('password', '<span class="help-block">:message</span>') }}
			</div>
		</div>


		<!-- Remember me -->
		<div class="control-group">
			<div class="controls">
			<label class="checkbox">
				<input type="checkbox" name="remember-me" id="remember-me" value="1" /> Remember me
			</label>
			</div>
		</div>

		<hr>

		<!-- Form actions -->
		<div class="control-group">
			<div class="controls">
				<a class="btn btn-warning" href="{{ route('home') }}">Cancel</a>

				<button type="submit" class="btn _sign-in">Sign in</button>

				<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
			</div>
		</div>
	<!-- </form> -->
