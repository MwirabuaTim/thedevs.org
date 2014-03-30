@extends('emails/layouts/default')

@section('content')
<p>{{ $msg }}</p><br/>
<p>From {{ $name }} , {{ $email }}</p>
@stop
