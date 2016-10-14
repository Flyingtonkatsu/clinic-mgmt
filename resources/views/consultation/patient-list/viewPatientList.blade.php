<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Patient List</h3>
	</div>

	<div class="panel-body">
		<div class="row" style="margin-bottom: 10px">
			<div class="col-sm-3">
				<button class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
			</div>
		</div>
		<div class="row">
		<div class="col-sm-12">
			<div class="table-responsive">
			<table id="patient-list" class="table table-sm table-bordered table-hover text-center table-responsive" >
	            <thead>
	              <tr>
	              	<th class="text-center col-sm-2"></th>
	                <th class="text-center col-sm-3">Client Name</th>
	                <th class="text-center col-sm-3">Patient Name</th>
	                <th class="text-center col-sm-2">Purpose</th>
	                <th class="text-center col-sm-2">Time In</th>
	              </tr>
	            </thead>

	            <tbody id="table-registration" style="text-align: center">
	        
	            </tbody>
          	</table>
          </div>
		</div>
		</div>
	</div>
</div>

<script src="/js/consultation/consultation-patientlist.js?"></script>