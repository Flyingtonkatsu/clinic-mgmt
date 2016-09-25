@extends('layouts.master')


@section('taskbar-head')
	Admin
@endsection


@section('taskbar')
	<li class="sidebar-nav-head">
		Employees
	</li>

	<li class="nav-item">
		<a class="nav-link" href="#" id="nav-link-employee-reg"><i class="fa fa-user-plus"></i> Employee Registration </a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#" id="nav-link-employee-list"><i class="fa fa-users"></i> View Employees </a>
	</li>
@endsection

@section('scripts')
	<script src="/js/admin/admin-main.js"></script>
@endsection
