@extends('layouts.master')

@section('taskbar-head')
	Pharmacy
@endsection

@section('taskbar')
	<li class="sidebar-nav-item"> 
	   <a id="nav-lab-requests" href="#"><i class="fa fa-list-ul"></i> Lab Requests</a>
	</li>
@endsection

@section('scripts')
	<script src="/js/labs/labs-main.js"></script>
@endsection
