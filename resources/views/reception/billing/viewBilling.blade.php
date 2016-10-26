<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Billing</h3>
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
	                <th class="text-center col-sm-3">Client Name</th>
	                <th class="text-center col-sm-3">Patient Name</th>
	                <th class="text-center col-sm-2"></th>
	              </tr>
	            </thead>

	            <tbody id="table-billing">
	        <!-- Table will be loaded here from server. -->
	            </tbody>
          	</table>
          </div>
		</div>
		</div>
	</div>
</div>

@include('reception.billing.modalClientBilling')
<script src="/js/reception/reception-billing.js"></script>