<link type="text/css" rel="stylesheet" href="/css/consultation-newconsult-medstestsTable.css">

<input type="hidden" id="consult-id" value="{{$consult->id}}">

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Patient Details</h3>
	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-sm-6">
				Client: <b> {{$client->lastname}}, {{$client->firstname}} </b>
			</div>
			<div class="col-sm-6 text-right">
				Transaction No: <b> {{$consult->id}} </b>
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
				Weight(kg): <b> {{$consult->weight}}</b>	 
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
				Purpose: <b> {{$consult->purpose}} </b>	
			</div>
			<div class="col-sm-6">
				Assigned Vet: <b> {{$vet->lastname}}, {{$vet->firstname}} </b>		
			</div>
		</div>

		<div class="row">
			<div class="col-sm-3">
				<button class="btn btn-warning" id="btn-history" data-toggle="modal" data-target="#modal-history"><i class="fa fa-clock-o"></i> Patient History</button>
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
					<div class="col-sm-2" style="text-align: right">
						Examination:
					</div>
					<div class="col-sm-8">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter findings here..." id="txt-exam">{{$consult->txt_examination}}</textarea>
					</div>
				</div>

				<div class="row" style="padding-top: 10px">
					<div class="col-sm-2" style="text-align: right">
						Differential Diagnosis:
					</div>
					<div class="col-sm-8">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter diagnosis here..." id="txt-diff-diag">{{$consult->txt_diff_diag}}</textarea>
					</div>
				</div>

				<div class="row" style="padding-top: 10px">
					<div class="col-sm-2" style="text-align: right">
						Consult Diagnosis:
					</div>
					<div class="col-sm-8">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter diagnosis here..." id="txt-consult-diag">{{$consult->txt_consult_diag}}</textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2" style="text-align: right">
						Notes:
					</div>
					<div class="col-sm-8">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter notes here..." id="txt-notes">{{$consult->txt_notes}}</textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-2" style="text-align: right">
						Regime Script:
					</div>
					<div class="col-sm-8">
						<textarea style="width: 100%; resize: none" rows="5" placeholder="Enter regime script here..." id="txt-reg-script">{{$consult->txt_regime_script}}</textarea>
					</div>
				</div>

				<div class="row" style="padding-top: 10px">
					<div class="col-sm-2" style="text-align: right">
						Request Meds:
					</div>
					<div class="col-sm-8">
						<div class="table-responsive">
							<table class="table table-sm table-bordered table-condensed table-hover text-center table-responsive" >
					            <tbody id="table-meds">
					            	@include("consultation.new-consultation.tableMeds")
					            </tbody>
				          	</table>
				        </div>
					</div>
				</div>

				<div class="row" style="padding-top: 10px">
					<div class="col-sm-2" style="text-align: right">
						Request Lab Tests:
					</div>
					<div class="col-sm-8"> 
						<div class="table-responsive">
							<table class="table table-sm table-condensed table-bordered table-hover text-center table-responsive" >
					            <tbody id="table-labs" >
					            </tbody>
				          	</table>
			          	</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
							<button class="btn btn-primary btn-save-consult "><i class="fa fa-check"></i> Save Consult</button>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

@include("consultation.new-consultation.modalMedsQty")
@include("consultation.new-consultation.modalLabRequest")
@include("consultation.new-consultation.modalLabResults")
@include("consultation.new-consultation.modalPatientHistory")

<script src="/js/consultation/consultation-newconsult.js?v"></script>