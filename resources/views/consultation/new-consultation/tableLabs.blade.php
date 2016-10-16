@foreach($labs as $lab)
	<tr>
	    <td class="text-center col-sm-8">{{$lab->name}}</td>

	@if($lab_requests != null)
		<p hidden>{{$lab_results_found = false}}</p>
		@foreach($lab_requests as $request)
			@if($request->lab_id == $lab->id)
				<td class="text-center col-sm-4">
				@if($request->status == "Completed")
					<button class="btn btn-success btn-request-lab" data-lab-id='{{$lab->id}}' data-lab-name="{{$lab->name}}" id="btn-request-lab-{{$lab->id}}">View Results</button>
				@elseif($request->status == "Requested")
					<button class="btn btn-primary btn-request-lab" data-lab-id='{{$lab->id}}' data-lab-name="{{$lab->name}}" id="btn-request-lab-{{$lab->id}}" disabled>Request Sent</button>
				@elseif($request->status == "Declined")
					<button class="btn btn-default" disabled>Declined</button>
				@endif
				</td>
				<p hidden>{{$lab_results_found = true}}</p>
			@endif
		@endforeach
		@if(!$lab_results_found)
			<td class="text-center col-sm-4"><button class="btn btn-primary btn-request-lab" data-lab-id='{{$lab->id}}' data-lab-name="{{$lab->name}}" id="btn-request-lab-{{$lab->id}}">Request</button></td>
		@endif
	@else
	    <td class="text-center col-sm-4"><button class="btn btn-primary btn-request-lab" data-lab-id='{{$lab->id}}' data-lab-name="{{$lab->name}}" id="btn-request-lab-{{$lab->id}}">Request</button></td>
	@endif

	</tr>
@endforeach