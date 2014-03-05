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
    <meta name="description" content="TheDevs.Org maps and connects Developers, Organizations, Events, Projects & Stories in Tech Worldwide.">
    <meta name="viewport" content="width=device-width">
    <meta property="og:image" 
    content="{{ isset($og_image) ? $og_image : asset('images/devs.png') }}" />

    <!-- CSS -->
    {{ HTML::style('css/bootstrap.min.css')}}
    {{ HTML::style('jqueryui/css/jquery-ui-1.10.3.custom.min.css') }}
    {{ HTML::style('css/jquery-ui-timepicker-addon.css') }}

    <!-- Leaflet JS CSS -->
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
    <link rel="shortcut icon" href="{{ asset('images/favicon5.png') }}">

</head>
<body>

    <!--[if IE]>
         <h4>Please download <a href="http://www.google.com/chrome/‎">Chrome</a>, <a href="http://www.mozilla.org/firefox/">Firefox</a> or <a href="http://www.apple.com/safari/‎">Safari</a> browser to get the best of this site. </h4>
    <![endif]-->

    <img class="social-logo hidden" 
    src="{{ isset($og_image) ? $og_image : asset('images/devs.png') }}">
    
    <!-- Wrapper -->
    <div class="_wrapper">
        
        <div class="_middle">

            @include('partials.header')

            @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            <!-- Notifications -->
            @include('partials.notifications')
            <!-- ./ notifications -->
            
            <!-- Content -->
            @yield('content')
            <!-- ./ content -->


            <div class="fb-like" id="fblike" data-href="http://thedevs.org" data-send="false" 
            data-width="450" data-show-faces="false"></div>

        </div>
        <!-- ./ middle stuff -->

        @include('partials.footer')

        @include('partials.modals')
        <img class="preload hidden" alt="Loading..."  src="{{ asset('images/loadingbar.gif') }}">
        <!-- <img class="saveloader" alt="Loading..."  src="{{ asset('images/loading-bar.gif') }}"> -->
    </div>
     <!-- Joyride js Demo Order -->
    <ol id="demo" style="display:none" data-joyride> 
    
      <!-- This tip will be display as a modal -->
      <li><h3>Welcome to TheDevs.Org</h3></li>
      <li data-class="devs" data-options="tipLocation:right"><h3>
        Awesome and Proffessional Dev Profiles from all over the world...</h3></li>
      <li data-class="projects" data-options="tipLocation:right"><h3>
        List your Projects beautifully under your Profile...</h3></li>
      <li data-class="stories" data-options="tipLocation:right"><h3>
        Tell us Interesting Stories about your Journey in Tech...</h3></li>
      <li data-class="orgs" data-options="tipLocation:right"><h3>
        Do you know a Tech Organisation that is not in the map? Pin It!</h3></li>
      <li data-class="eventts" data-options="tipLocation:right" data-button="OK"><h3>
        Give us 411 about some interesting Tech Events around you!</h3></li>
        
      <li data-button="X"><h3>Join and Create with us Today :)</h3></li>

    </ol>
    
    <!-- Contact Us Sidebar -->
    <div class="slide-out-div">
        <a class="handle" href="http://link-for-non-js-users.html">Content</a>
        <h3>Contact me</h3>
        <p><a href="https://twitter.com/intent/tweet?&screen_name=techytimo&hashtags=thedevsorg" target="_blank">
        @techytimo</a></p>
        <p>tim@thedevs.org</p>
        <p>+254711451409</p>
    </div>

</body>


    <!-- jQuery -->
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('jqueryui/js/jquery-ui-1.10.3.custom.min.js') }}
    {{ HTML::script('js/jquery-ui-timepicker-addon.js') }}
    {{ HTML::script('js/jquery-ui-sliderAccess.js') }}

    <!-- Libs -->
    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/bootstrap-confirmation.js') }}
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

    <!-- Inlining JS for all pages -->
    @include('partials.alljs') 
    <!-- Inlining page-specific JS -->
    @yield('js') 


    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-47203427-1', 'thedevs.org');
      ga('send', 'pageview');
    </script>

    <!-- AddThis Smart Layers BEGIN -->
    <!-- Go to http://www.addthis.com/get/smart-layers to customize -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-508c2c5f4cc3850d"></script>
    <script type="text/javascript">
      addthis.layers({
        'theme' : 'transparent',
        'share' : {
          'position' : 'left',
          'services' : 'facebook,twitter,google_plusone_share,linkedin,email,more',

        }, 
        // 'follow' : {
        //   'services' : [
        //     {'service': 'facebook', 'id': 'thedevsorg'},
        //     {'service': 'twitter', 'id': 'thedevsorg'},
        //     {'service': 'google_follow', 'id': '113061438023381974773'}
        //   ]
        // },  
        // 'whatsnext' : {},  
        // 'recommended' : {},
        'responsive' : {
          maxWidth: '550px',
          minWidth: '0px'
        }
        });
    </script>
    <!-- AddThis Smart Layers END -->

    <!-- Sidebar JS-->
    {{ HTML::script('js/jquery.tabSlideOut.v1.3.js') }}

    <script type="text/javascript">
    $(function(){
        $('.slide-out-div').tabSlideOut({
            tabHandle: '.handle',                     //class of the element that will become your tab
            pathToTabImage: '/images/contact.png', //path to the image for the tab //Optionally can be set using css
            imageHeight: '130px',                     //height of tab image           //Optionally can be set using css
            imageWidth: '40px',                       //width of tab image            //Optionally can be set using css
            tabLocation: 'right',                     //side of screen where tab lives, top, right, bottom, or left
            speed: 300,                               //speed of animation
            action: 'click',                          //options: 'click' or 'hover', action to trigger animation
            topPos: '200px',                          //position from the top/ use if tabLocation is left or right
            leftPos: '20px',                          //position from left/ use if tabLocation is bottom or top
            fixedPosition: true                      //options: true makes it stick(fixed position) on scroll
        });

    });

    </script>

</html>
