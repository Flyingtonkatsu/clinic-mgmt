<!-- Needed data: $client_name, $client_id, $reg_id, $patient_name,
	$species, $breeds -->

<!-- elements with data: -->

<form class="form-horizontal" id="form-new-patient">

	<input type="hidden" id="client-id" value="{{$client_id}}">
	<input type="hidden" id="reg-id" value="{{$reg_id}}">
	<input type="hidden" id="patient-name" value="{{$patient_name}}">

	<div class="form-group has-feedback">
		<label class="control-label col-sm-2"><b>Client:</b></label>
		<label class="control-label col-sm-3" style="text-align: left">{{$client_name}}</label>
	</div>

	<div class="form-group has-feedback">
		<label class="control-label col-sm-2"><b>Patient:</b></label>
		<label class="control-label col-sm-3" style="text-align: left">{{$patient_name}}</label>
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
				@foreach($species as $specie)
					<option> {{$specie->name}} </option>
				@endforeach
			</select>
		</div>

		<label class="control-label col-sm-2" id="spinner-select-breed"> Breed:</label>
		<div class="col-sm-4">
			<select class="form-control" id="select-breed">
				<option disabled selected>Select breed</option>
			</select>
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
			<button type="button" class="btn btn-primary" id="btn-submit-new-patient">Submit </button>
		</div>
	</div>
</form>