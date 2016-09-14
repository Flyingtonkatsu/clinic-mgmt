@extends('layouts.master')



@section('taskbar-head')
	Registration
@endsection


@section('taskbar')
	<li> 
	    <a href="registration" ><span class="glyphicon glyphicon-list"></span> Queue Registration</a>
	</li>
	<li class="sidebar-nav-active"> 
	   <span class="glyphicon glyphicon-user"></span> New Client
	</li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">New Client Registration</h3>
				</div>

				<div class="panel-body">

					<form class="form-horizontal" id="form-new-client">
			        	<input type="hidden" id="reg_id" name="reg_id">
			        	<div class="form-group has-feedback" id="form-group-names">
			        		<label class="control-label col-sm-2" for="first-name">First Name:</label>
			        		<div class="col-sm-4">
			        			<input class="form-control input-name" placeholder="Enter first name" id="input-firstname">
			        		</div>
			        		<label class="control-label col-sm-2" for="last-name">Last Name:</label>
			        		<div class="col-sm-4">
			        			<input class="form-control input-name" placeholder="Enter last name" id="input-lastname">
			        		</div>
			        	</div>

			        	<div class="form-group">
			        		<label class="control-label col-sm-2" for="address"> E-mail:</label>
			        		<div class="col-sm-4">
			        			<input class="form-control" placeholder="Enter email" id="input-email">
			        		</div>
			        		<label class="control-label col-sm-2"> Birthday:</label>
			        		<div class="col-sm-4">
			        			<input type="date" class="form-control" placeholder="Enter birthday" id="input-birthday">
			        		</div>
			        	</div>

			        	<div class="form-group">
			        		<label class="control-label col-sm-2">Mobile Number:</label>
			        		<div class="col-sm-4">
			        			<input class="form-control" placeholder="Enter mobile number" id="input-mobile">
			        		</div>
			        		<label class="control-label col-sm-2" for="contact-number">Landline:</label>
			        		<div class="col-sm-4">
			        			<input class="form-control" placeholder="Enter landline number" id="input-landline">
			        		</div>
			        	</div>

			        	<div class="form-group">
			        		<label class="control-label col-sm-2" for="address"> Street Address:</label>
			        		<div class="col-sm-4">
			        			<textarea class="form-control" rows="2" placeholder="Enter Address" id="input-address" style="resize: none"></textarea>
			        		</div>
			        		<label class="control-label col-sm-2" for="address"> City:</label>
			        		<div class="col-sm-4">
				        		<select class="form-control" id="select-city">
				        			<option value="" disabled selected>Select city</option>
			        				@foreach($cities as $city)
			        					<option value="{{$city->id}}">{{$city->name}}</option>
			        				@endforeach
				        		</select>
			        		</div>
			        	</div>


			        	<div class="form-group">
			        		<div class="col-sm-offset-2 col-sm-6">
			        			 <button type="button" class="btn btn-primary" id="btn-submit-reg">Submit </button>
			        			 <button type="button" class="btn btn-danger" id="btn-cancel-reg">Clear </button>
			        		</div>
			        	</div>
			        </form>
		        </div>
	        </div>
		</div>
	</div>

@endsection

@section('scripts')
	<script src="/js/Registration-new-client.js"></script
@endsection