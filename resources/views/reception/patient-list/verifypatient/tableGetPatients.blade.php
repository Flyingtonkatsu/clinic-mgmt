@if($count > 0)
	@foreach($patients as $patient)
	<tr>
		<td>
			<button type="button" class="btn btn-primary btn-verify-selected-patient" data-dismiss="modal" data-patient-id="{{$patient->id}}" data-reg-id="{{$reg_id}}"> Verify </button>
		</td>

		<td>
			{{$patient->name}}
		</td>

		<td>
			{{$patient->gender}}
		</td>

		<td>
			{{$patient->species}}
		</td>

		<td>
			{{$patient->breed}}
		</td>

		<td>
			{{$patient->color}}
		</td>

		<td>
			{{$patient->birthdate}}
		</td>
	</tr>
	@endforeach
@else
	<tr>
		<td colspan="7">
			No patient record found for '{{$patient_name}}'.
		</td>
	</tr>
	<tr>
		<td colspan="7">
			<button class="btn btn-success btn-new-patient" data-client-id="{{$client_id}}" data-patient-name="{{$patient_name}}" data-reg-id="{{$reg_id}}"> <i class="fa fa-plus"></i> New Patient</button>
		</td>
	</tr>
@endif