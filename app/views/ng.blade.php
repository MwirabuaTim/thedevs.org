<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" ng-app="myapp"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" ng-app="myapp"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" ng-app="myapp"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" ng-app="myapp"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @section('title')
            TheDevs.org
        @show
    </title>
    <meta name="description" content="TheDevs.Org maps and connects Developers, Organizations, Events, Projects & Stories in Tech Worldwide.">
    <meta name="viewport" content="width=device-width">
    <meta property="og:image" 
    content="{{ isset($og_image) ? $og_image : asset('images/devs/favicon-7.png') }}" />

    <!-- CSS -->
    {{ HTML::style('css/bootstrap.min.css')}}
    {{ HTML::style('font-awesome/css/font-awesome.css') }}

    <!-- Leaflet CSS -->
    {{ HTML::style('leaflet/leaflet.css') }}
    {{ HTML::style('leaflet_label/leaflet.label.css') }}
    {{ HTML::style('leaflet_mc/default.css') }}
    {{ HTML::style('leaflet_mc/mc.css') }}
    {{ HTML::style('leaflet_lc/locate.css') }}
    {{ HTML::style('leaflet_lc/locate.0.5.css') }}
    {{ HTML::style('leaflet_lc/locate.ie.css') }}

    <!-- Joyride JS CSS-->
    {{ HTML::style('joyridejs/joyride-2.1.css') }}

    <!-- Custom CSS for all pages -->
    {{ HTML::style('css/general.css')}}
    {{ HTML::style('css/ng.css')}}

    <!-- Custom CSS for specific pages-->
    @yield('css')

    <!-- modernizr JS -->
    {{ HTML::script('js/modernizr-2.6.2.min.js') }}

    <!-- Images -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/apple-touch-icon-57-precomposed.png') }}">

    <!-- ICO -->
    <link rel="shortcut icon" href="{{ asset('images/devs/favicon-7.png') }}">

    @include('partials.matrix')

</head>
<body>
    <!--[if IE]>
         <h4>Please download <a href="http://www.google.com/chrome/‎">Chrome</a>, <a href="http://www.mozilla.org/firefox/">Firefox</a> or <a href="http://www.apple.com/safari/‎">Safari</a> browser to get the best of this site. </h4>
    <![endif]-->
    
    <img class="social-logo hidden" 
    src="{{ isset($og_image) ? $og_image : asset('images/devs/devs.png') }}">
    
    <!-- Wrapper -->
    <div class="_wrapper">
        
		
        <div class="_middle">

            @include('partials.header')

			<legend class="_welcome">
				<span>Welcome to The Developers' Organization<a href="/about"></a></span>
			</legend>

			<hr>
                
            <div ng-view=""></div>
            <!-- <ng-view></ng-view> -->         

        </div>
        <!-- ./ middle stuff -->
    </div>

</body>


    <!-- jQuery -->
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('jqueryui/js/jquery-ui-1.10.3.custom.min.js') }}
    {{ HTML::script('js/jquery-ui-timepicker-addon.js') }}
    {{ HTML::script('js/jquery-ui-sliderAccess.js') }}
    {{ HTML::script('js/jquery.pulse.min.js') }}
    {{ HTML::script('js/jquery.nicescroll.js') }}

    <!-- Libs -->
    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/angular.min.js') }}
    {{ HTML::script('js/angular-route.min.js') }}
    {{ HTML::script('js/ng.js') }}
    {{--! HTML::script('js/underscore.js') --}}
    {{--! HTML::script('js/backbone.js') --}}

    <!-- Joyride JS-->
    {{ HTML::script('joyridejs/jquery.joyride-2.1.js') }}

    <!-- Masonry JS-->
    {{ HTML::script('js/masonry.pkgd.min.js') }}
    {{ HTML::script('js/imagesloaded.pkgd.js') }}

    <!-- Leaflet JS -->
    {{ HTML::script('leaflet/leaflet.js') }}
    {{ HTML::script('leaflet_label/leaflet.label.js') }}
    {{ HTML::script('leaflet_mc/mc.js') }}
    {{ HTML::script('leaflet_mc/mc-src.js') }}
    {{ HTML::script('leaflet_lc/locate.js') }}

    <!-- tinymce rich editor -->
    {{ HTML::script('tinymce/tinymce.min.js') }}

    <!-- Sidebar JS-->
    {{ HTML::script('js/jquery.tabSlideOut.v1.3.js') }}

    <!-- AddThis Smart Layers -->
    {{ HTML::script('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508c2c5f4cc3850d') }}

    <!-- Inlining JS for all pages -->
    <script type="text/javascript">
        <?php if(Sentry::check()): ?>
        var user_id = "{{ Sentry::getUser()->id }}"
        <?php endif; ?>
        
        @include('partials.alljs') 
    </script>
    <!-- Inlining page-specific JS -->
    @yield('js') 
    @include('partials.ga')
        
</html>

