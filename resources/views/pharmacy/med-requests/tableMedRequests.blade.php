@foreach($med_requests as $med_request)
	{{$vet_id = $med_request->vet_id}}
	{{$med_id = $med_request->med_id}}
	{{$med = $meds->find($med_id)}}
	{{$consult_id = $med_request->consult_id}}
	{{$med_supply = $med_supplies->where('med_id', $med_id)->last()}}
	<tr>
		<td class="text-center col-sm-3"> {{$med->description}} </td>
		<td class="text-center col-sm-1"> {{$med_request->qty}} </td>
		<td class="text-center col-sm-1"> {{$med_supply->qty_onhand}} </td>
		<td class="text-center col-sm-1"> {{$med_supply->qty_safe}} </td>
		<td class="text-center col-sm-3"> {{$vets->find($vet_id)->lastname}}, {{$vets->find($vet_id)->firstname}} </td>
		<td class="text-center col-sm-2"> {{$med_request->status}} </td>
		<td class="text-center col-sm-1"> 
			@if($med_request->status == "Requested")
			<button class="btn btn-success btn-med-prepare" data-request-id="{{$med_request->id}}">Prepare</button>

			@elseif($med_request->status == "Issue")
			<button class="btn btn-success btn-med-prepare" data-consult-id="{{$consult_id}}" data-med-id="{{$med_id}}" data-request-id="{{$med_request->id}}"><i class="fa fa-check"></i></button>
			@endif
		</td>
	</tr>
@endforeach