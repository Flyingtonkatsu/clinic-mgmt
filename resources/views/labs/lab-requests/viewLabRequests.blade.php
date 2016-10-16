<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Lab Requests</h3>
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
			<table class="table table-sm table-bordered table-hover table-responsive" >
	            <thead>
	              <tr>
	              	<th class="text-center col-sm-2"> Lab Test </th>
	                <th class="text-center col-sm-3"> Requesting Vet </th>
	                <th class="text-center col-sm-2"> Patient </th>
	                <th class="text-center col-sm-2"> Status</th>
	                <th class="text-center col-sm-2"> Actions </th>
	              </tr>
	            </thead>

	            <tbody id="table-lab-requests">
	            	
	            </tbody>
          	</table>
          </div>
		</div>
		</div>
	</div>
</div>

<!-- Modals -->
@include('labs.lab-requests.modalLabInputResults')
@include('labs.lab-requests.modalLabConfirmDecline')

<script src="/js/labs/labs-request-list.js?"></script>