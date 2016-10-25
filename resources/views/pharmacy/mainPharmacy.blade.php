@extends('layouts.master')

@section('taskbar-head')
	Pharmacy
@endsection

@section('taskbar')
	<li class="sidebar-nav-item"> 
	   <a id="nav-med-requests" href="#"><i class="fa fa-list-ul"></i> Med Requests</a>
	</li>
	<li class="sidebar-nav-item"> 
	   <a id="nav-inventory-status" href="#"><i class="fa fa-list-ul"></i> Inventory Status</a>
	</li>
@endsection

@section('scripts')
	<script src="/js/pharmacy/pharmacy-main.js"></script>
@endsection
