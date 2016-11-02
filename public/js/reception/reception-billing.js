$(document).ready(function(){
	getTableBillingClients();
	$(".btn-modal-checkout").on("click touch", checkoutClient);
	$(".btn-refresh").on("click touch", getTableBillingClients);
});

function getTableBillingClients(){
	getView('billing/getTableBillingClients', $('#table-billing'), function(){
		$(".btn-checkout").on("click touch", showCheckoutModal);
	});
	
}

function showCheckoutModal(){
	var consult_id = $(this).attr('data-consult-id');
	var data = {'consult_id' : consult_id};
	var button = $(this);
	loadButton(button);
	getPostView('billing/getClientPayments', $("#table-client-checkout"), data, function(){
		$("#div-client-name").html( "Client: <b>" + $("#client-name").val() + "</b>");
		$("#div-patient-name").html("Patient: <b>" + $("#patient-name").val() + "</b>");
		$("#div-consult-id").html("Transaction No: <b>" + $("#consult-id").val() + "</b>");
		$('#modal-client-checkout').modal('show');
		$(".chk-item").on("change", checkboxPayment);
		unloadButton(button, 'Checkout');
	});
}

function checkboxPayment(){
	var subtotal = $(this).parent().siblings(".payment-subtotal").html();
	var total = $("#table-cell-total").html();
	if($(this).is(":checked"))
		total = parseFloat(total) + parseFloat(subtotal);
	else
		total = parseFloat(total) - parseFloat(subtotal);

	$("#table-cell-total").html(total);
}

function checkoutClient(){
	var reg_id = $('#reg-id').val();
	var data = {};
	var button = $(this);
	loadButton(button, "Sending...");

	$(".chk-item").each(function(index){
		var id = $(this).attr('data-payment-id');
		if( $(this).is(":checked"))
			var paid = 0;
		else
			var paid = 1;
		var payment_data = {'id' : id, 'paid' : paid, 'reg_id' : reg_id};
		data[index] = payment_data;
	});

	$.post('billing/checkoutClient', data, function(){
		$('#modal-client-checkout').modal('hide');
		getTableBillingClients();
		unloadButton(button, "Checkout");
		alertMessage("success", "Successful client checkout!");
	});
}