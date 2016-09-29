@extends('layouts.master')

@section('taskbar-head')
	Consultation
@endsection

@section('taskbar')
	<li class="sidebar-nav-item"> 
	   <a id='nav-patient-list' href='#'><span class="fa fa-clipboard"></span> Patient List</a>
	</li>
	<li class="sidebar-nav-item"> 
	   <a id='nav-consultations' href='#'><span class="fa fa-stethoscope"></span> Consultations</a>
	</li>
@endsection

@section('scripts')
	<script src='/js/consultation/consultation-main.js'></script>
@endsection