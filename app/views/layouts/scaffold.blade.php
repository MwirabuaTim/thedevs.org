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
<!--     <link rel="stylesheet" href="{{ asset('css/main.css')}} "> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{ asset('css/general.css')}} ">
    <!-- <link rel="stylesheet" href="{{ asset('css/jquery.ui.css') }}"> -->

    <!-- page-specific css-->
    @yield('css')

    <!-- modernizr JS -->
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>

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
      <img class="preload" alt="Loading..."  src="{{ asset('images/loadingbar.gif') }}">
      <!-- <img class="saveloader" alt="Loading..."  src="{{ asset('images/loading-bar.gif') }}"> -->

        <div class="middles header">
            <a href="{{ URL::to('/') }}" class="head _charmtext">
            T<span class="small">HE</span>D<span class="small">EVS</span>
            </a>
            <br/>
            <span class="head motto">Where Developers Connect</span>
           <!-- <div class="pull-right"> -->
            	<ul class="_nav layer brick col-sm-5">
	                @if (Auth::check())
	                    <?php $id = Auth::user()->id; ?>
	                    <li {{ (Request::is('user/'.$id .'/books') ? 'class="active"' : '') }}>
	                    	<a class="_charm" href="{{ URL::to('user/'.$id.'/books') }}">
	                    	My Account</a>
	                    </li>
	                    <li {{ (Request::is('user/'.$id .'/books') ? 'class="active"' : '') }}>
	                    	<a class="_charm _caller" href="{{ URL::to('user/'.$id.'/books') }}">
	                    	+Create</a>
	                    </li>
	                @else
	                    <li class="" {{ (Request::is('auth/signin') ? 'class="active"' : '') }}>
	                    	<a class="_charm _caller" href="{{ URL::to('auth/signin') }}">
	                    	Demo</a>
	                    </li>
	                    <li {{ (Request::is('auth/signup') ? 'class="active"' : '') }}>
	                    	<a class="_charm"  style="padding: 10px 20px;" href="{{ URL::to('auth/signup') }}">Join</a>
	                    </li>
	                    <li><a class="_charm _step3" href="{{ URL::to('auth/signin') }}">
	                    	Log In</a>
	                    </li>
	                    
	                @endif
	            </ul>
            <!-- </div> -->
		
			<!-- <div class="layer2"> -->
	            <!-- <form class="form-search">
            		<input type="text" class="span2 search-query">
            		<button type="submit" class="btn"><i class="icon-search"></i></button>
	            </form> -->
			<div class="mapsearch pull-left">
				<form class="navbar-form navbar-left col-sm-5" role="search">
				  <!-- <div class="form-group"> -->
				    <input type="text" class="form-control" placeholder="Search">
				  	<button type="submit" class="btn btn-default _aqua-hover _charm-btn">Submit</button>
				  <!-- </div> -->
				</form>
			</div>
            
  
            
	        <!-- </div> -->



        </div>

        <!-- Add your site or application content here -->
        <!-- Container -->
        <div class="middles _trunk">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

            <!-- Notifications -->
            @include('partials.notifications')
            <!-- ./ notifications -->

            <!-- Content -->
            <div class="content">
                @yield('main')
                <!-- ./ content -->
            </div>

            <div class="fb-like" id="fblike" data-href="http://thedevs.org" data-send="false" 
            data-width="450" data-show-faces="false"></div>

        </div>
        <!-- ./ container -->

        <div class="footer">
            <div class="middles footerstuff">
                <div class="bottom_left">

                    <ul class="_nav">
                        <a href="{{ URL::to('howitworks') }}"><li class="link">How it Works</li></a> | 
                        <a href="{{ URL::to('termsofuse') }}"><li class="link">Terms of Use</li></a> | 
                        <a href="{{ URL::to('privacypolicy') }}"><li class="link">Privacy Policy</li></a> | 
                        <a href="{{ URL::to('contactus') }}"><li class="link">Contact Us</li></a>
                    </ul>
                    <br/>

                </div>
                        
                <div class="bottom_right">
                    <span class="social_text">Get in Touch...</span><br />

                    <ul class="social_buttons">
                        <!--  
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_googleplus_large' displayText='Tweet'></span>
                        <span class='st_sharethis_large' displayText='ShareThis'></span>
                        <span class='st_linkedin_large' displayText='LinkedIn'></span>
                        <span class='st_pinterest_large' displayText='Pinterest'></span>
                        <span class='st_email_large' displayText='Email'></span>
                        -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </body>


    <!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="{{ asset('js/jquery-ui-1.10.3.custom.min.js') }}"></script>

	<script src="{{ asset('js/plugins.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/underscore.js') }}"></script>
	<script src="{{ asset('js/backbone.js') }}"></script>

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
