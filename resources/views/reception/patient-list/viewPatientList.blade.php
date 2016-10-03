<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Patient List</h3>
	</div>

	<div class="panel-body">
		<div class="row" style="margin-bottom: 10px">
			<div class="col-sm-3">
				<button class="btn btn-success btn-refresh" id="btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
			</div>
		</div>
		<div class="row">
		<div class="col-sm-12">
			<div class="table-responsive">
			<table id="patient-list" class="table table-sm table-bordered table-hover text-center table-responsive" >
	            <thead>
	              <tr>
	                <th class="text-center">Client Name</th>
	                <th class="text-center">Verify Client</th>
	                <th class="text-center">Patient Name</th>
	                <th class="text-center">Verify Patient</th>
	                <th class="text-center">Purpose</th>
	                <th class="text-center">Weight(kg)</th>
	                <th class="text-center">Attending Vet</th>
	                <th class="text-center">Consult Room</th>
	                <th class="text-center">Status</th>
	                <th class="text-center">Time In</th>
	              </tr>
	            </thead>

	            <tbody id="table-registration">
	        <!-- Table will be loaded here from server. -->
	            </tbody>
          	</table>
          </div>
		</div>
		</div>
	</div>
</div>

<!-- Modals -->
@include('reception.patient-list.verifypatient.modalVerifyPatient')
@include('reception.patient-list.verifyclient.modalVerifyClient')
@include('reception.patient-list.newpatient.modalNewPatient')
@include('reception.patient-list.verifyclient.modalVerifyClientDetails')

<script src="/js/reception/reception-registration-table.js?ver=1"></script>
<script src="/js/reception/reception-client-control.js?ver=1"></script>
<script src="/js/reception/reception-patient-controls.js?ver=1"></script>