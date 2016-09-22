@extends('layouts.master')

@section('taskbar-head')
	Registration
@endsection

@section('taskbar')
	<li class="sidebar-nav-active"> 
	   <span class="glyphicon glyphicon-list"></span> Queue Registration
	</li>
	<li> 
	    <a href="registration#newclient"><span class="glyphicon glyphicon-user"></span> New Client</a>
	</li>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Patient Registration</h3>
				</div>

				<div class="panel-body">

					<form class="form-horizontal" id="form-reg">
						{{ csrf_field() }}
			        	<div class="form-group">
			        		<label class="control-label col-sm-2" for="firstname">First Name:</label>
			        		<div class="col-sm-4" id="div-input-firstname">
			        			<input class="form-control" placeholder="Enter first name" name="firstname" required disabled="true" id="input-firstname">
			        		</div>
			        		<label class="control-label col-sm-2" for="lastname">Last Name:</label>
			        		<div class="col-sm-4" id="div-input-lastname">
			        			<input class="form-control" placeholder="Enter last name" name="lastname" required disabled="true" id="input-lastname">
			        		</div>
			        	</div>

			        	<div class="form-group">
			        		<label class="control-label col-sm-2" for="patientnames">Patient Name(s): </label>
	        				<div class="col-sm-4" id="div-patients-list">
        						<input class="form-control" placeholder="Enter patient name" id="patient1" disabled="true" style="padding-bottom: 5px">
        					</div>
			        	</div>

			        	<div class="form-group">
			        		<div class="col-sm-offset-2 col-sm-4">
			        		<button class="btn btn-primary" type="button" id="btn-add-patient" disabled="true">
			        		<span class="glyphicon glyphicon-plus"></span> Add another patient</button>
			        		</div>
			        	</div>

			        	<div class="form-group">
			        		<div class="col-sm-offset-2 col-sm-4">
			        			<button type="button" class="btn btn-primary" id="btn-submit-reg" disabled="true">OK</button>
			        			<button type="button" class="btn btn-danger" id="btn-cancel-reg" disabled="true">Cancel</button>
			        		</div>
			        	</div>
			        </form>
		        </div>
	        </div>
		</div>
	</div>

@endsection

@section('scripts')
	
	
	<script src="/js/registration/registration-queue.js"></script>

@endsection