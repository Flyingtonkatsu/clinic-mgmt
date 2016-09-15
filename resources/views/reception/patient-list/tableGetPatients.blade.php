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
			No patient record found.
		</td>
	</tr>
@endif