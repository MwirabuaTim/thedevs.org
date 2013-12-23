@extends('layouts.scaffold')

@section('main')

@if(Sentry::check())
<div class="_in-blocks">
	<h1 style="float: left;">{{{ $dev->first_name }}}&nbsp; {{{ $dev->last_name }}}</h1>
	<span class="_right">
		{{ link_to_route('devs.edit', 'Edit', array($dev->id), array('class' => 'btn btn-info')) }}
		@if(Sentry::getUser()->hasAccess('admin'))
			{{ link_to_route('admin', 'Admin', null, array('class' => 'btn btn-primary')) }}
		@endif
	</span>
	
</div>

<div class="_in-blocks dev">
	<img class="_block" src="{{{ Sentry::getUser()->pic }}}" />
	<table class="_block _bio table table-striped table-bordered">

		<tbody>
			<tr><td>Location</td><td>{{{ Sentry::getUser()->location }}}</td></tr>
			<tr><td>Email</td><td>{{{ Sentry::getUser()->email }}}</td></tr>
			<tr><td>Phone</td><td>{{{ Sentry::getUser()->phone }}}</td></tr>
			<tr><td>Views</td><td>{{{ Sentry::getUser()->votes }}}</td></tr>
			<tr><td>Votes</td><td>{{{ Sentry::getUser()->views }}}</td></tr>
		</tbody>
	</table>
	
</div>
<div id="showmap"></div>
<p class="_center _f30">"<span class="_f30">{{{ $dev->elevator }}}</span>"</p>



<h4>About {{{ $dev->first_name }}}:</h4>
<div class="_about">
	@if(filter_var($dev->video, FILTER_VALIDATE_URL))

	<iframe width="560" height="315" class="_left _right10" 
		src="//www.youtube.com/embed/{{{ substr($dev->video, stripos($dev->video, 'v=')+2, strlen($dev->video)) }}}" 
		frameborder="0" allowfullscreen></iframe>

	@endif

	{{ $dev->about }}

</div>

<div class="item " style="top: 2637px; left: 500px; visibility: visible;">
	<div data-component-type="0" class="PinBase Pin Module summary">
		<div class="pinWrapper">
			<div class="pinImageActionButtonWrapper">
				<div class="repinSendButtonWrapper">
					<button data-element-type="0" type="button" class="rounded ShowModalButton Button primary Module ButtonBase primaryOnHover btn repinSmall">
						<em></em>
						<span class="accessibilityText">Pin it</span></button>
						<div class="sendPinGrid DropdownButton Module">
							<button type="button" class="rounded Button Module ButtonBase hasText sendSmall btn">
								<em></em>
								<span class="buttonText">Send</span>
							</button></div>
						</div>
						<div class="likeEditButtonWrapper">
							<button data-text-unlike="Unlike" data-element-type="1" data-text-like="Like" type="button" class="rounded PinLikeButton Button PinLikeButtonBase likeSmall ButtonBase Module btn">



								<em></em>
								<span class="accessibilityText">Like</span>
							</button>
						</div>

						<div class="pinHolder">
							<a href="/pin/12033123978207352/" class="pinImageWrapper " data-element-type="35" style="background: #594432;">
								<h4 class="pinDomain">losenone.tumblr.com</h4>
								<div class="fadeContainer">
									<div class="hoverMask"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="pinMeta ">
						<p class="pinDescription">.</p>
						<div class="pinSocialMeta">                    <a class="socialItem" href="/pin/12033123978207352/repins/">
							<em class="repinIconSmall"></em>
							<em class="socialMetaCount repinCountSmall">
								11
							</em>
						</a>
						<a class="socialItem likes" href="/pin/12033123978207352/likes/">
							<em class="likeIconSmall"></em>
							<em class="socialMetaCount likeCountSmall">
								3
							</em>
						</a>
					</div>
				</div>


				<div class="pinCredits">
					<a href="/printablesblog/t-e-e-o-l-o-g-y/" class="creditItem">
						<img src="http://media-cache-ec0.pinimg.com/avatars/printablesblog-1373252131_30.jpg" class="creditImg" style="">

						<span class="creditName">Justin Mckibben</span>
						<span class="creditTitle">T E E O L O G Y </span>
					</a>
				</div>
			</div>
		</div>
</div>

<a class="pull-left btn btn-warning" href="{{ URL::to('devs') }}">All Devs</a>
<span class="_right">
	@if(Request::path() == 'devs/'.Sentry::getUser()->id)
		{{ link_to_route('change-email', 'Change Email', null, array('class' => 'btn btn-primary')) }}
		{{ link_to_route('change-password', 'Change Password', null, array('class' => 'btn btn-primary')) }}
		{{ link_to_route('logout', 'Logout', null, array('class' => 'btn btn-primary')) }}
	
		
	@endif
</span>

@else
	<h4>You have to be logged in to see this.<h4>
@endif

@stop
