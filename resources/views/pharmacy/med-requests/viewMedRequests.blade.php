<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Med Requests</h3>
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
	                <th class="text-center col-sm-3"> Med </th>
	                <th class="text-center col-sm-1"> Requested Quantity </th>
	                <th class="text-center col-sm-1"> Quantity On-hand </th>
	                <th class="text-center col-sm-1"> Safe Quantity </th>
	                <th class="text-center col-sm-3"> Vet </th>
	                <th class="text-center col-sm-2"> Status </th>
	                <th class="text-center col-sm-1"> Actions </th>
	              </tr>
	            </thead>

	            <tbody id="table-med-requests">
	            	
	            </tbody>
          	</table>
          </div>
		</div>
		</div>
	</div>
</div>

<!-- Modals -->
<script src="js/pharmacy/pharmacy-request-list.js?v"></script>