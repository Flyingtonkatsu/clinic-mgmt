$(document).ready(function(){
	getTableBillingClients();
});

function getTableBillingClients(){
	getView('reception/getTableBillingClients', $('#table-billing'), function(){
		$(".btn-checkout").on("click touch", checkoutClient);
	});
	
}

function checkoutClient(){
	var consult_id = $(this).attr('data-consult-id');
	var data = {'consult_id' : consult_id};
	var button = $(this);
	loadButton(button);
	getPostView('reception/getClientPayments', $("#table-client-checkout"), data, function(){
		$("#div-client-name").html( "Client: <b>" + $("#client-name").val() + "</b>");
		$("#div-patient-name").html("Patient: <b>" + $("#patient-name").val() + "</b>");
		$("#div-consult-id").html("Transaction No: <b>" + $("#consult-id").val() + "</b>");
		$('#modal-client-checkout').modal('show');
		unloadButton(button, 'Checkout');
	});
}