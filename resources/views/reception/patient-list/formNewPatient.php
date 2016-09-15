<form class="form-horizontal" id="form-new-patient">
	<input type="hidden" id="reg_id">
	<input type="hidden" id="client_id">

<!-- Should be filled with client name from Registration table -->
	<div class="form-group">
		<label class="control-label col-sm-2"><b>Client:</b></label>
		<label class="control-label col-sm-3" id="label-client-name" style="text-align: left">Doe, John</label>
	</div>


	<div class="form-group has-feedback">
		<label class="control-label col-sm-2"><b>Patient:</b></label>

<!-- Should be filled with patient name from Registration table -->
		<div class="col-sm-4">
			<input class="form-control col-sm-3" id="input-patient-name" readonly value="Patient Name">
		</div>

	</div>

	<div class="form-group has-feedback">
		<label type="date" class="control-label col-sm-2">Birthdate:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter birthdate" id="input-birthdate">
		</div>

		<label type="date" class="control-label col-sm-2">Gender:</label>
		<div class="col-sm-3">
			<select class="form-control" id="select-gender">
				<option value="" disabled selected>Select gender...</option>
				<option value="M">M</option>
				<option value="F">F</option>
			</select>
		</div>
	</div>

	<div class="form-group has-feedback">
		<label class="control-label col-sm-2"> Species:</label>
		<div class="col-sm-4">
			<select class="form-control" id="select-species">
				<option value="" disabled selected>Select species...</option>
				<option value="Canine">Canine</option>
				<option value="Feline">Feline</option>
			</select>
		</div>
		<label class="control-label col-sm-2"> Breed:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter breed" id="input-breed">
		</div>
	</div>

	<div class="form-group has-feedback">
		<label class="control-label col-sm-2"> Color:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter color" id="input-color">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			 <button type="button" class="btn btn-primary" id="btn-submit-reg">Submit </button>
		</div>
	</div>
</form>