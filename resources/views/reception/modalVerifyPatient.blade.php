
<!-- Modal for patient verification --> 
<div id="modal-verify-patient" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
	      	<div class="modal-header">
	      		<h4> Please verify the patient</h4>
      		</div>

	      	<div class="modal-body">
	      		<div class="row">
	      			<div id="modal-verify-patient-client-name" class="col-sm-4">
	      			</div>
	      		</div>
	        	<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-sm table-bordered table-hover text-center table-responsive" >
					            <thead>
					              <tr>
					              	<th class="col-sm-1"></th>
					                <th class="text-center col-sm-2">Patient Name</th>
					                <th class="text-center col-sm-1">Gender</th>
					                <th class="text-center col-sm-2">Species</th>
					                <th class="text-center col-sm-2">Breed</th>
					                <th class="text-center col-sm-2">Color</th>
					                <th class="text-center col-sm-2">Birthdate</th>
					              </tr>
					            </thead>

					            <tbody id="table-verify-patient">
					        <!-- Table will be loaded here from server. -->
					            </tbody>
				          	</table>
				          </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>