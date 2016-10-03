
@if($clients->count() > 0)

	@foreach($clients as $client)
	<tr>
		<td>
			<button class="btn btn-primary btn-verify-selected-client" data-client-id="{{$client->id}}" data-reg-id="{{$reg_id}}"> Verify </button>
		</td>
		<td>
			{{$client->lastname}}, {{$client->firstname}}
		</td>
		<td>
			{{$client->email}}
		</td>
		<td>
			{{$client->birthday}}
		</td>
		<td>
			{{$client->mobile}}
		</td>
	</tr>
	@endforeach

@else
	
<tr>
	<td colspan="5"> No existing client found. </td>
</tr>
@endif

<tr>
	<td colspan="5">
		<button class="btn btn-success btn-new-client" data-reg-id="{{$reg_id}}"> <i class="fa fa-plus"></i> New Client </button>
	</td>
</tr>