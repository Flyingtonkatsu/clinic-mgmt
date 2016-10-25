<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">New Client Registration</h3>
	</div>

	<div class="panel-body">

		<form class="form-horizontal" id="form-new-client">
	    	<input type="hidden" id="reg_id" name="reg_id">
	    	<div class="form-group" id="form-group-names">
	    		<label class="control-label col-sm-2">Name:</label>
	    		<div class="col-sm-4">
	    			<select class="form-control select-names">

	    			</select>
	    		</div>

	    		<input type='hidden' id='input-lastname'>
	    		<input type='hidden' id='input-firstname'>
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
	    		<label class="control-label col-sm-2">Mobile Number 1:</label>
	    		<div class="col-sm-4">
	    			<input class="form-control" placeholder="Enter mobile number" id="input-mobile">
	    		</div>
	    		<label class="control-label col-sm-2">Mobile Number 2:</label>
	    		<div class="col-sm-4">
	    			<input class="form-control" placeholder="Enter mobile number" id="input-mobile2">
	    		</div>
	    	</div>

    		<div class="form-group">
	    		<label class="control-label col-sm-2" for="contact-number">Landline 1:</label>
	    		<div class="col-sm-4">
	    			<input class="form-control" placeholder="Enter landline number" id="input-landline">
	    		</div>
	    		<label class="control-label col-sm-2" for="contact-number">Landline 2:</label>
	    		<div class="col-sm-4">
	    			<input class="form-control" placeholder="Enter landline number" id="input-landline2">
	    		</div>
	    	</div>

	    	<div class="form-group">
	    		<label class="control-label col-sm-2"> Home Address:</label>
	    		<div class="col-sm-4">
	    			<textarea class="form-control" rows="2" placeholder="Enter Address" id="input-address" style="resize: none"></textarea>
	    		</div>
	    		<label class="control-label col-sm-2"> Home City:</label>
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
	    		<label class="control-label col-sm-2"> Work Address:</label>
	    		<div class="col-sm-4">
	    			<textarea class="form-control" rows="2" placeholder="Enter Address" id="input-address2" style="resize: none"></textarea>
	    		</div>
	    		<label class="control-label col-sm-2"> Work City:</label>
	    		<div class="col-sm-4">
	        		<select class="form-control" id="select-city2">
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


<script src="/js/registration/registration-new-client.js"></script>