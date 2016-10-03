{{$patient_count = 0}}
@foreach($registrations as $registration)
	<tr>
		{{ $client = $clients->find($registration->client_id) }}
		{{ $patient = $patients->find($registration->patient_id)}}

		<td class="col-sm-2"> <button class="btn btn-primary btn-consult" data-patient-id="{{$patient->id}}" data-client-id="{{$client->id}}"> <i class="fa fa-edit"></i> Consult</button> </td>
		<td class="col-sm-3"> {{ $client->lastname }},  {{$client->firstname}} </td>
		<td class="col-sm-3"> {{ $patient->name }} </td>
		<td class="col-sm-2"> {{ $registration->purpose }} </td>
		@if($registration->created_at != null)
		<td class="col-sm-2"> {{ $registration->created_at->format('H:i') }} </td>
		@endif
	</tr>
	{{$patient_count++}}
@endforeach

@if($patient_count < 1)
	<tr>
		<td colspan="5" style="text-align: center; color: #808080"> <i class="fa fa-user fa-4x"></i> <br> No patients are currently queued. </td>
	</tr>
@endif

