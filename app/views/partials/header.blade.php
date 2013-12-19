<div class="middles header">
    <a href="{{ URL::to('/') }}" class="head _aqua-hover-text">
    T<span class="small">HE</span>D<span class="small">EVS</span>
    </a>
    <br/>
    <span class="head tagline">Where Developers Connect</span>
   <!-- <div class="pull-right"> -->
    	<ul class="_nav layer brick col-sm-5">
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

	<!-- <div class="layer2"> -->
        <!-- <form class="form-search">
    		<input type="text" class="span2 search-query">
    		<button type="submit" class="btn"><i class="icon-search"></i></button>
        </form> -->
	<div class="mapsearch">
		<form class="navbar-form navbar-left col-sm-5" role="search">
		  <!-- <div class="form-group"> -->
		    <input type="text" class="form-control" placeholder="Search">
		  	<button type="submit" class="btn btn-default _aqua-hover _search-btn">Submit</button>
		  <!-- </div> -->
		</form>
	</div>
    

    
    <!-- </div> -->

</div>