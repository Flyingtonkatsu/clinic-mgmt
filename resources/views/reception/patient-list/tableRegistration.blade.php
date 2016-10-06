@foreach($registrations as $reg)
	<tr>
		<td class="text-nowrap col-sm-2">
			{{$reg->client_lname}}, {{$reg->client_fname}} 
		</td>

		@if($reg->client_verified)

			<td class="text-nowrap col-sm-1"> <span class="glyphicon glyphicon-ok" style="color: green"></span> </td>

			<td class="text-nowrap col-sm-1"> {{$reg->patient_name}} </td>

			@if($reg->patient_verified)
				<td class="text-nowrap col-sm-1">
					<span class="glyphicon glyphicon-ok" style="color: green"></span>
				</td>
				<td class="text-nowrap col-sm-2">
		    		@if($reg->purpose == '')
		    			<select class="form-control select-purpose" data-reg-id="{{$reg->id}}" style="width:150px">
		        			<option value="" disabled selected>Purpose</option>
	    					<option value="Consultation">Consultation</option>
	    					<option value="Follow-up">Follow-up</option>
	    					<option value="Vaccination">Vaccination</option>
	    					<option value="Surgery">Surgery</option>
		        		</select>
		    		@else 
		    			{{$reg->purpose}}
		    		@endif
		    	</td>


		    	<td class="text-nowrap col-sm-1">
		    		@if($reg->weight == '')
		    			<input class="form-control input-weight" placeholder="Enter weight" data-reg-id="{{$reg->id}}" maxlength="10" align="center" style="width: 110px">
		    		@else
		    			{{$reg->weight}}
					@endif
				</td>


		    	<td class="text-nowrap col-sm-1">
		    		@if($reg->vet_id == '')

		    			<select class="form-control select-vet" data-reg-id="{{$reg->id}}" style="width:120px">
		        			<option value="" disabled selected> Assign Vet</option>

	    					@foreach($vets as $vet)
		    					<option value="{{$vet->id}}">{{$vet->initials}}</option>
		    				@endforeach
		        		</select>

		    		@else
		    			{{$vets->find($reg->vet_id)->initials}}
		    		@endif
				</td>

		    	<td class="text-nowrap col-sm-1">
		    		@if($reg->weight != '' && $reg->purpose != '' && $reg->vet_id != '')
		    			@if($reg->room == '')
			    			<select class="form-control select-room" data-reg-id="{{$reg->id}}">
			        			<option value="" disabled selected> Assign Room</option>
		    					@for($room = 1; $room <= 6; $room++)
			    					<option value="0{{$room}}">0{{$room}}</option>
			    				@endfor
			        		</select>
		    			@else
		    				{{$reg->room}}
		    			@endif
		    		@else
		    			<select class="form-control select-room" data-reg-id="{{$reg->id}}" style="width:150px" disabled="true">
		        			<option value="" disabled selected></option>
	        			</select>
					@endif
		    	</td>
		    @else
		    	<td class="text-nowrap col-sm-1"> 
					<button type="button" class="btn btn-danger btn-verify-patient" data-dismiss="modal" data-client-id="{{$reg->client_id}}" data-reg-id="{{$reg->id}}"  data-patient-name="{{$reg->patient_name}}"> <i class="fa fa-question"></i> </button>
				</td>
		    	<td class="text-nowrap" colspan="4">
		    		Please verify patient.
		    	</td>
		    @endif
		    
		@else
			<td class="text-nowrap col-sm-1">
				<button type="button" class="btn btn-danger btn-verify-client" data-dismiss="modal" data-client-lname="{{$reg->client_lname}}" data-reg-id="{{$reg->id}}"  data-client-fname="{{$reg->client_fname}}" disabled="true"> <i class="fa fa-question"></i> </button>
			</td>

			<td class="text-nowrap col-sm-1"> {{$reg->patient_name}}</td>

			<td colspan="5">
				Please verify client.
			</td>
		@endif

		<td class="text-nowrap col-sm-1"> {{ $reg->status }}  </td>

		@if($reg->created_at != null)
			<td class="text-nowrap col-sm-1"> {{ $reg->created_at->format('H:i') }} </td>
		@endif
	</tr>
@endforeach