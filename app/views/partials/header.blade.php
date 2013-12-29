<div class="_header">
    <a href="{{ URL::to('/') }}" class="_top-left _in-block">
        <span class="_logo _aqua-hover-text">
            T<span class="_small">HE</span>D<span class="small">EVS</span>
        </span>
        <span class="_tagline">Where Developers Connect</span>
    </a>
   <!-- <div class="pull-right"> -->
    	<ul class="_nav _brick _top-right">
            @if (Sentry::check())
                <?php $id = Sentry::getUser()->id; ?>
                <li {{ (Request::is('devs/'.$id .'/books') ? 'class="active"' : '') }}>
                	<a class="_blade _aqua-hover" href="{{ URL::to('devs/'.$id.'') }}">
                	My Account</a>
                </li>
                <li {{ (Request::is('user/'.$id .'/books') ? 'class="active"' : '') }}>
                	<a class="_blade _aqua2pink _step1" href="{{ URL::to('/') }}">
                	+Create</a>
                </li>
            @else
                <li class="" {{ (Request::is('auth/signin') ? 'class="active"' : '') }}>
                	<a class="_blade _aqua2pink" href="{{ URL::to('howitworks') }}">
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
    <!-- </div> -->

	<form class="mapsearch navbar-form navbar-left col-sm-5" role="search">
	  <!-- <div class="form-group"> -->
	    <input type="text" class="form-control" 
        placeholder='Search "JavaScript Developer", "Tech Hub", "TEDx", "Workout App" etc near you...'>
	  	<button type="submit" class="btn _aqua-hover _search-btn">Search</button>
	  <!-- </div> -->
	</form>
    
</div>