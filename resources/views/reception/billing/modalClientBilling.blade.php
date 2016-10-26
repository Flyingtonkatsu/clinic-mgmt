<!-- Modal for client checkout --> 
<div id="modal-client-checkout" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
	      	<div class="modal-header">
	      		<h2> Client Checkout </h2>
      		</div>

	      	<div class="modal-body">

	      		<div class="row text">
	      			<div id="div-client-name" class="col-sm-4 text-left">
	      			</div>
	      			<div id="div-patient-name" class="col-sm-4 text-left">
	      			</div>
	      			<div id="div-consult-id" class="col-sm-4 text-right">
	      			</div>
	      		</div>

	        	<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-sm table-bordered table-hover text-center table-responsive" >
					            <thead>
					              <tr>
					              	<th class="text-center col-sm-1"> </th>
					              	<th class="text-center col-sm-6"> Item/Service </th>
					              	<th class="text-center col-sm-1"> Price </th>
					              	<th class="text-center col-sm-1"> Qty </th>
					              	<th class="text-center col-sm-2"> Total </th>
					              </tr>
					            </thead>

					            <tbody id="table-client-checkout">
					        <!-- Table will be loaded here from server. -->
					        		
					            </tbody>
				          	</table>
				          </div>
					</div>
				</div>

				<div class="row">
					<div class="text-center col-sm-12">
						<button class="btn btn-success btn-modal-checkout">Checkout</button>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>