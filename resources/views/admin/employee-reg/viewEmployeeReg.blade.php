<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">New Employee Registration</h3>
	</div>

	<div class="panel-body">
		<form class="form-horizontal">
		<div class="panel panel-primary">
			<div class="panel-body">

				@for($i=0; $i<count($users); $i++)
					<input type="hidden" id="hidden-username-{{$i}}" value="{{$users[$i]->username}}">
				@endfor
				<input type="hidden" id="hidden-username-count" value="{{count($users)}}">

		    	<div class="form-group" id="form-feedback-name">
		    		<label class="control-label col-sm-2">First Name:</label>
		    		<div class="col-sm-4">
		    			<input class="form-control" placeholder="Enter first name" id="input-firstname">
		    		</div>
		    		<label class="control-label col-sm-2" for="last-name">Last Name:</label>
		    		<div class="col-sm-4">
		    			<input class="form-control" placeholder="Enter last name" id="input-lastname">
		    		</div>
		    	</div>

		    	<div class="form-group" id="form-feedback-initials">
		    		<label class="control-label col-sm-2">Initials:</label>
		    		<div class="col-sm-2">
		    			<input class="form-control input-name" placeholder="Enter initials" id="input-initials" maxlength="3">
		    		</div>
		    	</div>

<!--
		    	<div class="form-group" id="form-feedback-address">
		    		<label class="control-label col-sm-2">Address:</label>
		    		<div class="col-sm-4">
		    			<textarea id="input-address" rows="3" style="resize: none; width: 100%"></textarea>
		    		</div>
		    	</div>
-->

		    	<div class="form-group" id="form-feedback-position">
		    		<label class="control-label col-sm-2" for="last-name">Position:</label>
		    		<div class="col-sm-4">
		    			<select class="form-control" id="select-position">
		    				<option disabled selected></option>
		    				@foreach($positions as $position)
		    					<option value={{$position->id}}> {{$position->name}}</option>
		    				@endforeach
		    			</select>
		    		</div>
		    	</div>

			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-body">

		    	<div class="form-group" id="form-feedback-username">
		    		<label class="control-label col-sm-2">Username:</label>
		    		<div class="col-sm-5">
		    			<input class="form-control input-name" placeholder="Enter username" id="input-username">
		    		</div>			    		
		    	</div>

		    	<div class="form-group" id="form-feedback-password">
		    		<label class="control-label col-sm-2">Password:</label>
		    		<div class="col-sm-5">
		    			<input type="password" class="form-control input-name" placeholder="Enter password" id="input-password">
		    		</div>			    		
		    	</div>

		    	<div class="form-group" id="form-feedback-password-confirm">
		    		<label class="control-label col-sm-2">Confirm Password:</label>
		    		<div class="col-sm-5">
		    			<input type="password" class="form-control input-name" placeholder="Re-enter password" id="input-password-confirm">
		    		</div>	    		
		    	</div>
			</div>
		</div>
		</form>

		<div class="col-sm-12" style="text-align: center">
			 <button type="button" class="btn btn-primary" id="btn-submit">Submit </button>
		</div>			
	</div>
</div>

<script src='js/admin/admin-employee-reg.js?ver=2'></script>
