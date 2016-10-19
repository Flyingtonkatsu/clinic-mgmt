@foreach($meds as $med)

<tr>
    <td class="text-center col-xs-8">{{$med->description}}</td>

    @if($med_requests != null)
		<p hidden>{{$med_request_found = false}}</p>
		@foreach($med_requests as $request)
			@if($request->med_id == $med->id)
				<td class="text-center col-sm-4">
					<button class="btn btn-success btn-issue-med" id="btn-issue-med-{{$med->id}}" data-med-id="{{$med->id}}" disabled>Prescribed {{$request->qty}}</button>
				</td>
				<p hidden>{{$med_request_found = true}}</p>
			@endif
		@endforeach
		@if(!$med_request_found)
			<td class="text-center col-sm-4">
				<button class="btn btn-primary btn-issue-med" id="btn-issue-med-{{$med->id}}" data-med-id="{{$med->id}}">Prescribe</button>
			</td>
		@endif
	@else
	    <td class="text-center col-sm-4">
	    	<button class="btn btn-primary btn-issue-med" id="btn-issue-med-{{$med->id}}" data-med-id="{{$med->id}}">Prescribe</button>
	    </td>
	@endif
</tr>

@endforeach