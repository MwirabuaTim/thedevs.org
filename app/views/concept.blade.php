<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        {{ $document->title }} :: TheDevs.org
    </title>
    <meta name="description" content="TheDevs.Org maps and connects Developers, Organizations, Events, Projects & Stories in Tech Worldwide.">
    <meta name="viewport" content="width=device-width">
    <meta property="og:image" 
    content="{{ isset($og_image) ? $og_image : asset('images/devs/favicon-7.png') }}" />

    <!-- CSS -->
    {{ HTML::style('css/bootstrap.min.css')}}
    {{ HTML::style('css/bootstrap-fileupload.css')}}
    {{ HTML::style('jqueryui/css/jquery-ui-1.10.3.custom.min.css') }}
    {{ HTML::style('css/jquery-ui-timepicker-addon.css') }}

    <!-- Custom CSS for all pages -->
    {{ HTML::style('css/general.css')}}

    <!-- Custom CSS for specific pages-->
    <style>
		._logo {
			font-size: 70px;
			line-height: 45px;
		}
		._top-left{
			margin:20px 0px;
		}
        legend{
            text-transform: uppercase;
        }

    </style>

    <!-- modernizr JS -->
    {{ HTML::script('js/modernizr-2.6.2.min.js') }}

    <!-- ICO -->
    <link rel="shortcut icon" href="{{ asset('images/devs/favicon-7.png') }}">

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

            <div class="_header _center">
			    <div class="_top-left _in-block">
			        <span class="_logo">
			            <a href="{{ URL::to('/') }}" class="_aqua-hover-text">T<span class="small">HE</span>D<span class="small">EVS.</span>O<span class="small">RG</span></a>
			        </span>
			        <!-- <span class="_tagline">Where Developers Connect</span> -->
			        
			    </div>
			</div>	

            <!-- Content -->
            <div class="_bg-transparent">

                <fieldset class="_sweet-tooth">
                    <legend class="_welcome _center">
                        <span>{{{ $document->title }}}</span>
                    </legend>
                </fieldset>

                @if(All::hasEditRight($document))
                    <span class="pull-right">
                    {{ All::getPublicity($document) }} 
                    {{ link_to_route('document.edit', 'Edit', array($document->id), 
                    array('class' => 'btn btn-info btn-sm')) }}
                    </span>
                @endif

                <div class="concept">
                    <!-- @ include('concept-doc') -->
                    {{ $document->body }}
                    <!-- http://4html.net/Online-text-to-HTML-converter-831.html -->
                </div>
                    
                <fieldset class="_sweet-tooth _bottom10">
                    <legend class="_welcome _center">
                        <span>Where Developers Connect</span>
                    </legend>
                </fieldset>

            </div>
            <!-- ./ content -->



        </div>
        <!-- ./ middle stuff -->

        <!-- @ include('partials.footer') -->

    </div>

</body>


    <!-- jQuery -->
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('jqueryui/js/jquery-ui-1.10.3.custom.min.js') }}
    {{ HTML::script('js/jquery-ui-timepicker-addon.js') }}
    {{ HTML::script('js/jquery-ui-sliderAccess.js') }}
    {{ HTML::script('js/jquery.pulse.min.js') }}

    <!-- Libs -->
    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/bootstrap-confirmation.js') }}
    {{ HTML::script('js/bootstrap-fileupload.js') }}

    <!-- tinymce rich editor -->
    {{ HTML::script('tinymce/tinymce.min.js') }}


    <!-- Inlining JS for all pages -->
    <script type="text/javascript">
        <?php if(Sentry::check()): ?>
        var user_id = "{{ Sentry::getUser()->id }}"
        <?php endif; ?>
    </script>
 
</html>

