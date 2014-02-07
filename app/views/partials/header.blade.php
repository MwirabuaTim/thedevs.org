<div class="_header">
    <a href="{{ URL::to('/') }}" class="_top-left _in-block">
        <span class="_logo _aqua-hover-text">
            T<span class="_small">HE</span>D<span class="small">EVS</span>
        </span>
        <span class="_tagline">Where Developers Connect</span>
    </a>
   <div class="_layer _bottom5">
    	<ul class="_nav _brick _top-right">
            @if (Sentry::check())
                <?php $id = Sentry::getUser()->id; ?>
                <li {{ ( Request::is('devs/'.$id) ? 'class="active"' : '') }}>
                	<a class="_blade _aqua-hover" href="{{ URL::to('devs/'.$id.'') }}">
                	My Profile</a>
                </li>
            @else
                <li class="" {{ (Request::is('auth/signin') ? 'class="active"' : '') }}>
                	<a class="_blade _aqua2pink _demo" href="{{ URL::to('howitworks') }}" type="button">
                	Demo</a>
                </li>
                <li {{ (Request::is('auth/signup') ? 'class="active"' : '') }}>
                	<a class="_blade _aqua-hover _get-sign-up" href="{{ URL::to('auth/signup') }}">Join</a>
                </li>
                <li><a class="_blade _aqua-hover _get-sign-in" href="{{ URL::to('auth/signin') }}">
                	Log In</a>
                </li>
                
            @endif
        </ul>
    
        <input class="_search form-control ui-autocomplete-input" name="term" type="text" autocomplete="off">
	  	<div class="_search-icon"></div>

    </div>

    
</div>