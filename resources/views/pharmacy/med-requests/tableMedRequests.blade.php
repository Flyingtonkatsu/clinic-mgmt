@foreach($med_requests as $med_request)
	{{$vet_id = $med_request->vet_id}}
	{{$med_id = $med_request->med_id}}
	<tr>
		<td class="text-center col-sm-3"> {{$meds->find($med_id)->description}} </td>
		<td class="text-center col-sm-2">  </td>
		<td class="text-center col-sm-2">  </td>
		<td class="text-center col-sm-3"> {{$vets->find($vet_id)->lastname}}, {{$vets->find($vet_id)->firstname}} </td>
		<td class="text-center col-sm-1"> <button class="btn btn-primary"><i class="fa fa-check"></i></button></td>
	</tr>
@endforeach