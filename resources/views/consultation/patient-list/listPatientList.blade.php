{{$patient_count = 0}}
@foreach($patients as $patient)
	<tr>
		{{ $client = $clients->find($patient->client_id) }}
		<td class="text-nowrap"> {{ $client->lastname }},  {{$client->firstname}} </td>
		<td class="text-nowrap"> {{ $patient->patient_name }} </td>
		<td class="text-nowrap"> {{ $patient->purpose }} </td>
		@if($reg->created_at != null)
			<td class="text-nowrap"> {{ $reg->created_at->format('H:i') }} </td>
		@endif
	</tr>
	{{$patient_count++}}
@endforeach

@if($patient_count < 1)
	<tr>
		<td colspan="4" style="text-align: center; font-color: grey"> <i class="fa fa-remove fa-4x"></i> <br> No patients are currently queued. </td>
	</tr>
@endif

