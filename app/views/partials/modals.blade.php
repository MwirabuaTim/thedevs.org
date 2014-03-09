<!-- Modal -->
<div class="modal fade _cats" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Select the Category...</h4>
      </div>
      <div class="modal-body">
       
        <!-- /input-group -->
        <div class="btn-group panel-group" data-toggle="buttons-radio">
        <!-- <label class="cats btn _aqua-hover">
                <input type="radio" name="cats" id="devs" value="devs">
            DEVELOPERS </label> -->
            <label class="cats btn panel _aqua-hover">
                <input type="radio" name="cats" id="stories" value="stories">
            STORY </label>
            <label class="cats btn panel _aqua-hover">
                <input type="radio" name="cats" id="projects" value="projects">
            PROJECT </label>
            <label class="cats btn panel _aqua-hover">
                <input type="radio" name="cats" id="eventts" value="eventts">
            EVENT </label>
            <label class="cats btn panel _aqua-hover">
                <input type="radio" name="cats" id="orgs" value="orgs">
            ORGANISATION </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success _aqua-hover pull-left" data-dismiss="modal">Back</button>
        <button type="button" class="btn btn-success _step2 _aqua-hover" data-dismiss="modal" disabled>Next</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Modal -->
<div class="modal fade _pin-map" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Click on the map to pin your post to a location...</h4>
      </div>
      <div class="modal-body">
       <div id="pinmap"></div>
      </div>
      <div class="modal-footer">
        <p class="_left">
          You can Zoom and Drag the Map to be accurate. 
          <a href="#" class="_hide-markers btn btn-link">Hide Markers</a>
        </p>
        <button type="button" class="btn btn-success _aqua-hover pull-left" data-dismiss="modal">Back</button>
        <button type="button" class="btn btn-success _step3 _aqua-hover" data-dismiss="modal" disabled>Next</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- <a role="menuitem" tabindex="-1" href="#">Action</a> -->
<!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li> -->

<!-- <li>
<label for="name">Name:</label>
<input name="name" type="text" id="name">
</li> -->


<!-- cc OAuth helper -->

<div class="modal fade _sign-in-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Welcome Back :)</h4>
      </div>
      <div class="modal-body">

        <div class="cell social-signin">
          <a href="/auth/facebook" class="_oauth facebook sign-up"><span class="icon-social-facebook"></span>Sign in with Facebook</a>
          <a href="/auth/google" class="_oauth google sign-up"><span class="icon-social-google"></span>Sign in with Google</a>
          <a href="/auth/github" class="_oauth github sign-up"><span class="icon-social-github"></span>Sign in with Github</a>

        </div>

        <div class="cell neutral email-signin">

          <h4>Sign in with Email:
            <span class="pull-right" >
              <a href="/auth/signup" class="_get-sign-up">Register</a>
            </span>
          </h4>
          <!-- <span class="or module">or</span> -->
          <form accept-charset="UTF-8" action="/auth/signin" class="new_user" id="new-session" method="post">
            <input name="utf8" type="hidden" value="✓">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="status" tabindex="2" value="signin" class="_hide">

            <input class="form-control" autocapitalize="off" autocorrect="off" autofocus="on" id="email" name="email" placeholder="Email" size="30" type="text" class="_text">
            <input class="form-control" id="password" name="password" placeholder="Password" size="30" tabindex="2" type="password" class="_text">

            <div class="remember-me _inline">
              <input name="remember-me" type="hidden" value="0"><input checked="checked" id="remember-me" name="remember-me" type="checkbox" value="1">
              <label for="remember-me">Remember me</label>
              <a href="/auth/forgot-password" class="secondary">Forgot your password?</a>
            </div>

            <input class="btn btn-success pull-right _m0" name="commit" type="submit" value="Login">
          </div>
          </form>

        </div>

      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade _sign-up-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Welcome :)</h4>
      </div>
      <div class="modal-body">

        <div class="cell social-signin">
          <a href="/auth/facebook" class="_oauth facebook sign-up"><span class="icon-social-facebook"></span>Sign up with Facebook</a>
          <a href="/auth/google" class="_oauth google sign-up"><span class="icon-social-google"></span>Sign up with Google</a>
          <a href="/auth/github" class="_oauth github sign-up"><span class="icon-social-github"></span>Sign up with Github</a>

        </div>

        <div class="cell neutral email-signup">

          <h4>Sign up with Email:
            <span class="pull-right" >
              <a href="/auth/signin" class="_get-sign-in">Sign In</a>
            </span>
          </h4>
          <!-- <span class="or module">or</span> -->
          <form accept-charset="UTF-8" action="/auth/signup" class="new_user" id="new-session" method="post">
            <input name="utf8" type="hidden" value="✓">

            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="status" tabindex="2" value="signup" class="_hide">

            <input class="form-control" autofocus="on" autocapitalize="off" autocorrect="off" id="first_name" name="first_name" placeholder="First Name" size="30" type="text" class="_text">
            <input class="form-control" autocapitalize="off" autocorrect="off" id="last_name" name="last_name" placeholder="Last Name" size="30" type="text" class="_text">
            <input class="form-control" autocapitalize="off" autocorrect="off" id="email" name="email" placeholder="Email" size="30" type="text" class="_text">
            <input class="form-control" id="password" name="password" placeholder="Password" size="30" tabindex="2" type="password" class="_text">
            <input class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" size="30" tabindex="2" type="password" class="_text">

            <span class="note">By signing up, you agree to our 
              <a href="{{ URL::to('tos') }}">Terms of Service</a>
            </span>

            <input class="btn btn-success pull-right _m0" name="commit" type="submit" value="Sign Up">
            
          </form>

        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade _creates" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Complete Creating...</h4>
      </div>
      <div class="modal-body createTemplate">
       
        <!-- Import the right create form  -->
          <script id="createTemplate" type="text/template">
            
          </script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success _aqua-hover pull-left" data-dismiss="modal">Back</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
