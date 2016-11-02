@extends('layouts.master')


@section('taskbar-head')
	Admin
@endsection


@section('taskbar')
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Add Records <i class="fa fa-caret-down"></i> </a>

		<ul class="dropdown-menu">
		    <li><a class="nav-item" id="nav-employee-reg" href="#employees">Employees</a></li>
		    <li><a class="nav-item" id="nav-breeds-species" href="#species">Breeds and Species</a></li>
		  </ul>
	</li>
@endsection

@section('scripts')
	<script src="/js/admin/admin-main.js"></script>
@endsection
