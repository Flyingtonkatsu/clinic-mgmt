<option value=0 selected disabled>
	Select name...
</option>
@foreach($clients as $reg)
	<option value='{{$reg->id}}' data-lastname='{{$reg->client_lname}}' data-firstname='{{$reg->client_fname}}'>
		{{$reg->client_lname}}, {{$reg->client_fname}}
	</option>
@endforeach