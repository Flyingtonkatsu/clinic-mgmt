@extends('layouts.master')


@section('taskbar-head')
	Admin
@endsection


@section('taskbar')
	<li class="sidebar-nav-head">
		Employees
	</li>

	<li class="nav-item">
		<a class="nav-link" href="employee#registration"><i class="fa fa-user-plus"></i> Employee Registration </a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="employee#view"><i class="fa fa-users"></i> View Employees </a>
	</li>
@endsection
