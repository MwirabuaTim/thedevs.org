@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
@parent
:: Terms of Use
@stop

@section('main')
<div class="clearfix">

	<h3>THEDEVS.ORG TERMS AND CONDITIONS OF USAGE</h3>
	<p>Coming soon...</p>

</div>
@stop


@section('css')
	{{ HTML::style('css/tos.css')}} 
@stop
