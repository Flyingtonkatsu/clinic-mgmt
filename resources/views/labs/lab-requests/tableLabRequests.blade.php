{{$request_count = 0}}
@foreach($requests as $request)
	{{$lab_id = $request->lab_id}}
	{{$consult_id = $request->consult_id}}
	{{$consult = $consults->find($consult_id)}}
	{{$vet_id = $consult->vet_id}}
	{{$patient_id = $consult->patient_id}}
	{{$patient = $patients->find($patient_id)}}

	<tr>
	    <td class="text-center col-sm-2"> {{$labs->find($lab_id)->name}} </td>
	    <td class="text-center col-sm-3"> {{$vets->find($vet_id)->lastname}}, {{$vets->find($vet_id)->firstname}} </td>
	    <td class="text-center col-sm-2"> {{$patient->name}} </td>
	    <td class="text-center col-sm-2"> {{$request->status}}</td>
	    @if($request->status == "Requested")
	    <td class="text-center col-sm-2"> 
	    	<button class="btn btn-primary btn-results" data-req-id="{{$request->id}}" data-test-name="{{$labs->find($lab_id)->name}}" data-patient-name="{{$patient->name}}"> Enter Results</button>
	    	<button class="btn btn-danger btn-decline-request" data-req-id="{{$request->id}}" data-test-name="{{$labs->find($lab_id)->name}}" data-patient-name="{{$patient->name}}"> Decline </button> 
	    </td>
	    @endif
	</tr>
	{{$request_count++}}
@endforeach

@if($request_count == 0)
	<tr>
		<td colspan="5" style="text-align: center; color: #808080"> <i class="fa fa-eyedropper fa-4x"></i> <br> No pending requests. </td>
	</tr>
@endif