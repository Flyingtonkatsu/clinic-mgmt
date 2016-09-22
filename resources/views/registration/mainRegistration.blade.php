@extends('layouts.master')

@section('taskbar-head')
	Registration
@endsection

@section('taskbar')
	<li class="sidebar-nav-item"> 
	   <a id="nav-queue-reg" href="#"><span class="glyphicon glyphicon-list"></span> Queue Registration</a>
	</li>
	<li class="sidebar-nav-item"> 
	    <a id="nav-new-client" href="#"><span class="glyphicon glyphicon-user"></span> New Client</a>
	</li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12" id="page-content">	

	</div>
</div>
@endsection


@section('scripts')
	<script src="/js/registration/registration-main.js"></script>
@endsection