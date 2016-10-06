<input type="hidden" id="med-id">

<div id="modal-meds" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Enter quantity for meds</h4>
			</div>
	      	<div class="modal-body" >
				<div class="row" style="text-align: center">
					<div class="col-sm-offset-4 col-sm-1">
						<button class="btn btn-danger btn-qty-reduce">-</button>
					</div>
					<div class="col-sm-2">
						<input class="form-control" style="width: 100%;" type="number" id="med-qty">
					</div>
					<div class="col-sm-1">
						<button class="btn btn-success btn-qty-increase">+</button>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12" style="text-align: center">
						<button class="btn btn-primary btn-issue-med-qty">Issue</button>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>