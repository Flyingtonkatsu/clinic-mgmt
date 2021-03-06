<form class="form-horizontal" id="form-verify-client-details">
	<input type="hidden" id="reg-id" value={{$reg_id}}>
	<input type="hidden" id="client-id" value={{$client->id}}>
	<div class="form-group">
		<label class="control-label col-sm-2">First Name:</label>
		<label class="control-label col-sm-4"  style="text-align: left">{{$client->firstname}}</label>
		<label class="control-label col-sm-2">Last Name:</label>
		<label class="control-label col-sm-4"  style="text-align: left">{{$client->lastname}}</label>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="address"> E-mail:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter email" id="input-email" value={{$client->email}}>
		</div>
		<label class="control-label col-sm-2"> Birthday:</label>
		<label class="control-label col-sm-4"  style="text-align: left">{{$client->birthday}}</label>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" >Mobile Number 1:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter mobile number" id="input-mobile" value={{$client->mobile}}>
		</div>
		<label class="control-label col-sm-2" >Mobile Number 2:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter mobile number" id="input-mobile2" value={{$client->mobile2}}>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-sm-2">Landline 1:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter landline number" id="input-landline" value={{$client->landline}}>
		</div>
		<label class="control-label col-sm-2">Landline 2:</label>
		<div class="col-sm-4">
			<input class="form-control" placeholder="Enter landline number" id="input-landline2" value={{$client->landline2}}>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="address"> Home Address:</label>
		<div class="col-sm-4">
			<textarea class="form-control" rows="2" placeholder="Enter Address" id="input-address" style="resize: none">{{$client->address}}</textarea>
		</div>
		<label class="control-label col-sm-2"> Home City:</label>
		<div class="col-sm-4">
    		<select class="form-control" id="select-city">
    			<option value=0 selected disabled>Select city</option>
				@foreach($cities as $city)
					@if($city->id == $client->city)
						<option value="{{$city->id}}" selected>{{$city->name}}</option>
					@else
						<option value="{{$city->id}}">{{$city->name}}</option>
					@endif
				@endforeach
    		</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2"> Work Address:</label>
		<div class="col-sm-4">
			<textarea class="form-control" rows="2" placeholder="Enter Address" id="input-address2" style="resize: none">{{$client->address2}}</textarea>
		</div>
		<label class="control-label col-sm-2"> Work City:</label>
		<div class="col-sm-4">
    		<select class="form-control" id="select-city2">
    			<option value=0 selected disabled>Select city</option>
				@foreach($cities as $city)
					@if($city->id == $client->city)
						<option value="{{$city->id}}" selected>{{$city->name}}</option>
					@else
						<option value="{{$city->id}}">{{$city->name}}</option>
					@endif
				@endforeach
    		</select>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-6">
			 <button type="button" class="btn btn-primary" id="btn-update-client">Confirm </button>
		</div>
	</div>
</form>
