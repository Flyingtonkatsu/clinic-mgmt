@extends('layouts.master')

@section('taskbar-head')
	Reception
@endsection

@section('taskbar')
	<li class="sidebar-nav-item"> 
	   <a id="nav-reg-table" href="#"><i class="fa fa-list-alt"></i> Patient List</a>
	</li>
	<li class="sidebar-nav-item">
		<a id="nav-shop" href="#"> <i class="fa fa-shopping-cart"></i> Shop</a>
	</li>
@endsection

@section('scripts')
	<script src="/js/reception/reception-main.js"></script>
@endsection
