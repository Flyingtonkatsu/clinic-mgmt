
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Patient Details</h3>
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
							<div class=" pull-right">
								Date: <b>10 Sept 2016</b>	<!-- Placeholder: for date today -->
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							Client: <b>Mraz, Jason</b> <!-- PH: For client name -->
						</div>
						<div class="col-sm-6">
							<div class="pull-right">
								Transaction No: <b>87452</b> <!-- PH: For client name -->
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3">
							Patient: <b>Beast</b>	 <!-- PH: For patient name -->
						</div>
						<div class="col-sm-3">
							Species: <b>Canine</b>	 <!-- PH -->
						</div>
						<div class="col-sm-3">
							Breed: <b>Dobermann</b>	<!-- PH -->
						</div>
						<div class="col-sm-3">
							Gender: <b>F</b>	<!-- PH -->
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3">
							Weight: <b>32.15kg</b>	 <!-- PH -->
						</div>
						<div class="col-sm-3">
							Age: <b>1Yr 10Mo</b>	<!-- PH -->
						</div>
						<div class="col-sm-3">
							Neutered: <b>NO</b>	<!-- PH -->
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							Purpose: <b>Follow-up</b>	 <!-- PH: For patient name -->
						</div>
						<div class="col-sm-6">
							Assigned Vet: <b>NN</b>	 <!-- PH: For patient name -->
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3">
							<button class="btn btn-warning" id="btn-history" data-toggle="modal" data-target="#modal-history"><i class="fa fa-clock-o"></i> View History</button>
							<!-- Should view previous consultations from table -->
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
							<textarea style="width: 100%" rows="5" placeholder="Enter findings here..." id="txt-exam"></textarea>
						</div>
					</div>

					<div class="row" style="padding-top: 10px">
						<div class="col-sm-2">
							Tests:
						</div>
						<div class="col-sm-10">
							<textarea style="width: 100%" rows="5" placeholder="Enter tests required here..." id="txt-test"></textarea>
						</div>
					</div>

					<div class="row" style="padding-top: 10px">
						<div class="col-sm-2">
							Diagnosis:
						</div>
						<div class="col-sm-10">
							<textarea style="width: 100%" rows="5" placeholder="Enter diagnosis here..." id="txt-diag"></textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-sm-offset-2">
								<button class="btn btn-primary"><i class="fa fa-check"></i> Save Consult</button>
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
@endsection