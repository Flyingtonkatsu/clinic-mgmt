<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Breeds and Species</h3>
	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12">
						<b>Species:</b>
					</div>
				</div>
				<div class="row">
					<div id="div-species" class="col-sm-12">
						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-9">
						<input disabled class="form-control" id="input-specie" style="width: 100%">
					</div>
					<div class="col-sm-3">
						<button disabled class="btn btn-success btn-add-specie" style="width: 100%"><i class="fa fa-plus"></i> Add Specie</button>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-12">
						<b>Breeds:</b>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-sm table-bordered table-condensed table-hover text-center table-responsive" >
					            <tbody id="table-breeds" style="height: 120px; overflow-y: auto;" >
					            	
					            </tbody>
				          	</table>
				        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-9">
						<input disabled class="form-control" id="input-breed" style="width: 100%">
					</div>
					<div class="col-sm-3">
						<button disabled class="btn btn-success btn-add-breed" style="width: 100%"><i class="fa fa-plus"></i> Add Breed</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/admin/admin-breeds-species.js"></script>