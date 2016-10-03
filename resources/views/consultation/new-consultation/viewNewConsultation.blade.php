		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Patient Details</h3>
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						Client: <b> {{$client->lastname}}, {{$client->firstname}} </b>
					</div>
					<div class="col-sm-6">
						<div class="pull-right">
							Transaction No: <b> <!-- PH: For Transaction Number --> </b> 
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						Patient: <b>{{$patient->name}}</b>
					</div>
					<div class="col-sm-3">
						Species: <b>{{$patient->species}}</b>
					</div>
					<div class="col-sm-3">
						Breed: <b>{{$patient->breed}}</b>
					</div>
					<div class="col-sm-3">
						Gender: <b>{{$patient->gender}}</b>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						Weight: <b> <!-- PH --> </b>	 
					</div>
					<div class="col-sm-3">
						Birthdate: <b> {{$patient->birthdate}} </b>
					</div>
					<div class="col-sm-3">
						Neutered: <b> <!-- PH: For patient name --> </b>		
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						Purpose: <b> <!-- PH: For patient name --> </b>	
					</div>
					<div class="col-sm-6">
						Assigned Vet: <b> <!-- PH: For patient name --> </b>		
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						<button class="btn btn-warning" id="btn-history" data-toggle="modal" data-target="#modal-history"><i class="fa fa-clock-o"></i> View History</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Examination</h3>
			</div>

			<div class="panel-body">

				<div class="row" style="padding-top: 10px">
					<div class="col-sm-2">
						Examination:
					</div>
					<div class="col-sm-10">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter findings here..." id="txt-exam"></textarea>
					</div>
				</div>

				<div class="row" style="padding-top: 10px">
					<div class="col-sm-2">
						Differential Diagnosis:
					</div>
					<div class="col-sm-10">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter diagnosis here..." id="txt-diag"></textarea>
					</div>
				</div>

				<div class="row" style="padding-top: 10px">
					<div class="col-sm-2">
						Consult Diagnosis:
					</div>
					<div class="col-sm-10">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter diagnosis here..." id="txt-diag"></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2">
						Notes:
					</div>
					<div class="col-sm-4">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter notes here..." id="txt-diag"></textarea>
					</div>

					<div class="col-sm-offset-1 col-sm-1">
						Regime Script:
					</div>
					<div class="col-sm-4">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter notes here..." id="txt-diag"></textarea>
					</div>
				</div>

				<div class="row" style="padding-top: 10px">
					<div class="col-sm-offset-1 col-sm-1">
						Meds:
					</div>
					<div class="col-sm-4">
						 <div class="form-group">
							<select multiple class="form-control">
						        <option>Med 1</option>
						        <option>Med 2</option>
						        <option>Med 3</option>
						    </select>
						</div>
					</div>

					<div class="col-sm-2">
						Lab Tests:
					</div>
					<div class="col-sm-4">
						 <div class="form-group">
							<select multiple class="form-control" id="sel2">
						        <option>Stool</option>
						        <option>Urinalysis</option>
						        <option>Blood</option>
						    </select>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-sm-6 col-sm-offset-2">
							<button class="btn btn-primary"><i class="fa fa-check"></i>Save Consult</button>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div id="modal-history" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Patient History</h4>
			</div>
	      	<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>