@extends('layouts.master')



@section('taskbar-head')
Reception
@endsection

@section('taskbar')
	<li class="sidebar-nav-active"> 
	   <span class="fa fa-list-alt"></span> Patient List
	</li>
	<li>
		<a> <i class="fa fa-shopping-cart"></i> Shop</a>
	</li>
@endsection

@section('content')
	
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">

			<div class="panel-heading">
				<h3 class="panel-title">Patient List</h3>
			</div>

			<div class="panel-body">
				<div class="row" style="margin-bottom: 10px">
					<div class="col-sm-3">
						<button class="btn btn-success btn-refresh" id="btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
					</div>
				</div>
				<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
					<table id="patient-list" class="table table-sm table-bordered table-hover text-center table-responsive" >
			            <thead>
			              <tr>
			                <th class="text-center">Client Name</th>
			                <th class="text-center">Verify Client</th>
			                <th class="text-center">Patient Name</th>
			                <th class="text-center">Verify Patient</th>
			                <th class="text-center">Purpose</th>
			                <th class="text-center">Weight(kg)</th>
			                <th class="text-center">Attending Vet</th>
			                <th class="text-center">Consult Room</th>
			                <th class="text-center">Status</th>
			                <th class="text-center">Time In</th>
			              </tr>
			            </thead>

			            <tbody id="table-registration">
			        <!-- Table will be loaded here from server. -->
			            </tbody>
		          	</table>
		          </div>
				</div>
				</div>
			</div>
		</div>
	</div>

	@include('reception.modalVerifyPatient')

	@include('reception.modalVerifyClient')

</div>

@endsection

@section('scripts')
	
	<script src="/js/Reception.js"></script>
	
@endsection
