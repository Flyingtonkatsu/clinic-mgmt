<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Welcome! Please enter your information below.</h3>
	</div>

	<div class="panel-body">

		<form id="form-reg">
			{{ csrf_field() }}
	    	<div class="form-group" id="div-input-firstname">
	    		<label>Owner's First Name:</label>
	    		<input class="form-control" placeholder="Enter first name" name="firstname" required disabled="true" id="input-firstname">
    		</div>

    		<div class="form-group" id="div-input-lastname">
	    		<label>Owner's Last Name:</label>
    			<input class="form-control" placeholder="Enter last name" name="lastname" required disabled="true" id="input-lastname">
	    	</div>

	    	<div class="form-group" id="div-patients-list">
	    		<label>Patient Name(s):</label>
	    		<label><small>(For multiple patients, please enter one patient per line.)</small></label>
				<input class="form-control" placeholder="Enter patient name" id="patient1" disabled="true">
	    	</div>
	    </form>

    	<div class="row">
    		<div class="col-sm-12">
				<button class="btn btn-primary" type="button" id="btn-add-patient" disabled="true">
    			<span class="glyphicon glyphicon-plus"></span> Add another patient</button>
    		</div>
    	</div>

	    <div class="col-sm-12" style="text-align: center">
			<button type="button" class="btn btn-primary" id="btn-submit-reg" disabled="true">Submit</button>
			<button type="button" class="btn btn-danger" id="btn-cancel-reg" disabled="true">Cancel</button>
		</div>
	</div>
</div>

<script src="/js/registration/registration-queue.js?ver=1"></script>