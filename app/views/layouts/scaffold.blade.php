<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @section('title')
        TheDevs.org
        @show
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- CSS -->
<!--     {{ HTML::style('css/main.css')}} -->
    {{ HTML::style('css/bootstrap.min.css')}}
    {{ HTML::style('css/general.css')}}
    <!-- {{ HTML::style('css/jquery.ui.css') }} -->

    <!-- page-specific css-->
    @yield('css')

    <!-- modernizr JS -->
    {{ HTML::script('js/modernizr-2.6.2.min.js') }}

    <div id="fb-root"></div>
    <script type="text/javascript">
        // (function(d, s, id) {
        //   var js, fjs = d.getElementsByTagName(s)[0];
        //   if (d.getElementById(id)) return;
        //   js = d.createElement(s); js.id = id;
        //   js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=320691077999812";
        //   fjs.parentNode.insertBefore(js, fjs);
        // }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Images -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/apple-touch-icon-57-precomposed.png') }}">
    {{ HTML::style('css/jquery-ui-timepicker-addon.css') }}
    {{ HTML::style('jqueryui/css/jquery-ui-1.10.3.custom.min.css') }}

    <!-- ICO -->
    <link rel="shortcut icon" href="favicon.ico">

    <script>
    	// (function(){
        // var uv=document.createElement('script');
        // uv.type='text/javascript';
        // uv.async=true;
        // uv.src='//widget.uservoice.com/DaBJd20KGXiNvgpEJT8A.js';
        // var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})()
    </script>

</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    
    <div class="wrapper">
    
        @include('partials.header')
        <!-- Add your site or application content here -->
        <!-- Container -->
        <div class="middles _trunk">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif



            <!-- Content -->
            <div class="content">
                @yield('main')
                <!-- ./ content -->
            </div>

            <!-- Notifications -->
            @include('partials.notifications')
            <!-- ./ notifications -->

            <div class="fb-like" id="fblike" data-href="http://thedevs.org" data-send="false" 
            data-width="450" data-show-faces="false"></div>

        </div>
        <!-- ./ container -->

    </div>

    @include('partials.footer')

    @include('partials.modals')
    <img class="preload" alt="Loading..."  src="{{ asset('images/loadingbar.gif') }}">
    <!-- <img class="saveloader" alt="Loading..."  src="{{ asset('images/loading-bar.gif') }}"> -->
  </body>


    <!-- jQuery -->
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('jqueryui/js/jquery-ui-1.10.3.custom.min.js') }}
    {{ HTML::script('js/jquery-ui-timepicker-addon.js') }}
    {{ HTML::script('js/jquery-ui-sliderAccess.js') }}


	{{ HTML::script('js/plugins.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/underscore.js') }}
	{{ HTML::script('js/backbone.js') }}

	<!-- leaflet Javascript file -->
	{{ HTML::script('leaflet/leaflet.js') }}
	{{ HTML::script('leaflet_label/leaflet.label.js') }}
    {{ HTML::script('tinymce/tinymce.min.js') }}

	@include('javascript') <!-- inline js -->
	@yield('js') <!-- page-specific javascript-->



	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
	  // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	  // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	  // g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	  // s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>

</html>
