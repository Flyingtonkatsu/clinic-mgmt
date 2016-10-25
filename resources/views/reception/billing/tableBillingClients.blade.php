@foreach($clients as $client)
	<tr>
		<td>{{$client->client_lname}}, {{$client->client_fname}}</td>
		<td>{{$client->patient_name}}</td>
		<td> <button class="btn btn-success btn-checkout" data-consult-id="{{$consults->where('reg_id', $client->id)->first()->id}}">Checkout</td>
	</tr>
@endforeach