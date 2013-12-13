@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
@parent
:: Home
@stop

@section('css')
  <link type="text/css" charset="utf-8" rel="stylesheet" media="screen" href="{{ asset('css/home.css')}}" />
  <!-- leaflet CSS file -->
  <link type="text/css" rel="stylesheet" href="{{ asset('leaflet/leaflet.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('leaflet_label/leaflet.label.css')}}" />
@stop

@section('main')
<!-- replace the content below to suit your page content -->

<div class="bladenav brick">
  <div class="">
    <a href="/devs"><div class="_strip">DEVELOPERS</div><!-- <div class="_tail"></div> --></a>
  </div>
  <div class="">
    <a href="/orgs"><div class="_strip">ORGANISATIONS</div><!-- <div class="_tail"></div> --></a>
  </div>
   <div class="">
    <a href="/projects"><div class="_strip">PROJECTS</div><!-- <div class="_tail"></div> --></a>
  </div>
   <div class="">
    <a href="/eventts"><div class="_strip">EVENTS</div><!-- <div class="_tail"></div> --></a>
  </div>
   <div class="">
    <a href="/stories"><div class="_strip">STORIES</div><!-- <div class="_tail"></div> --></a>
  </div>
</div>


<div id="map"></div>

<div class="_addbtn _charm _step1">+Add</div>

<div class="_alert _bg"></div>
<div class="_alert _pink _hide"></div>
<div class="_alert _data">Click on the map to add an organisation, project, event or story...</div>


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
        <!-- <label class="cats btn _charm">
                <input type="radio" name="cats" id="devs" value="devs">
            DEVELOPERS </label> -->
            <label class="cats btn panel _charm">
                <input type="radio" name="cats" id="stories" value="stories">
            STORY </label>
            <label class="cats btn panel _charm">
                <input type="radio" name="cats" id="projects" value="projects">
            PROJECT </label>
            <label class="cats btn panel _charm">
                <input type="radio" name="cats" id="eventts" value="eventts">
            EVENT </label>
            <label class="cats btn panel _charm">
                <input type="radio" name="cats" id="orgs" value="orgs">
            ORGANISATION </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn _aqua-hover pull-left" data-dismiss="modal">Back</button>
        <button type="button" class="btn btn-info _step3" data-dismiss="modal" disabled>Next</button>
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

<div class="modal fade _sign-in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Welcome Back :)</h4>
      </div>
      <div class="modal-body">

        <div class="cell social-signin">
          <a href="/auth/facebook" class="_step4 bttn social-signup facebook sign-up"><span class="icon-social-facebook"></span>Sign in with Facebook</a>
          <a href="/auth/google_oauth2" class="_step4 bttn social-signup google sign-up"><span class="icon-social-google"></span>Sign in with Google</a>
          <a href="/auth/twitter" class="_step4 bttn social-signup twitter sign-up"><span class="icon-social-twitter"></span>Sign in with Twitter</a>

        </div>

        <div class="cell neutral email-signin">

          <h4>Or sign in with email:</h4>
          <!-- <span class="or module">or</span> -->
          <form accept-charset="UTF-8" action="/auth/signin" class="new_user" id="new-session" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" class="ui-inited">

            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input autocapitalize="off" autocorrect="off" id="email" name="email" placeholder="Email" size="30" tabindex="1" type="text" class="ui-inited _text">
            <input id="password" name="password" placeholder="Password" size="30" tabindex="2" type="password" class="ui-inited _text">
            <div class="remember-me">
              <input name="remember-me" type="hidden" value="0" class="ui-inited"><input checked="checked" id="remember-me" name="remember-me" type="checkbox" value="1" class="ui-inited">
              <label for="remember-me">Remember me</label>

              <a href="/secret/new" class="_step4 secondary">Forgot your password?</a>
            </div>

            <div>
              <input class="sign-in-button bttn blue ui-inited" name="commit" type="submit" value="Login">
              <a href="/register/sign_up" class="_step4 create-account secondary">Create Account</a>
            </div>
          </form>

        </div>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn _aqua-hover pull-left" data-dismiss="modal">Back</button>
        <button type="button" class="btn btn-info _aqua-hover">Next</button>
      </div> -->

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@stop


@section('js')
  <!-- leaflet Javascript file -->
  <script src="leaflet/leaflet.js"></script>
  <script src="leaflet_label/leaflet.label.js"></script>


@stop

