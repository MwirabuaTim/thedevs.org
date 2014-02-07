@extends('layouts.scaffold')

{{-- Web site Title --}}
@section('title')
Admin DashBoard
@stop

{{-- Content --}}
@section('main')

<a href="{{ URL::to('admin/users') }}"><i class="icon-user"></i> Users</a>
<a href="{{ URL::to('admin/groups') }}"><i class="icon-user"></i> Groups</a>
<a href="{{ URL::to('admin/blogs') }}"><i class="icon-list-alt icon-white"></i> Blogs</a>
<a href="{{ route('logout') }}">Logout</a>

@stop