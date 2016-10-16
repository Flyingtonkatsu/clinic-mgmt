@extends('layouts.master')

@section('taskbar-head')
	Registration
@endsection

@section('taskbar')
	<li class="sidebar-nav-item"> 
	   <a id="nav-queue-reg" href="#"><span class="glyphicon glyphicon-list"></span> Registration Queue</a>
	</li>
	<li class="sidebar-nav-item"> 
	    <a id="nav-new-client" href="#"><span class="glyphicon glyphicon-user"></span> Client Verification</a>
	</li>
@endsection

@section('scripts')
	<script src="/js/registration/registration-main.js"></script>
@endsection