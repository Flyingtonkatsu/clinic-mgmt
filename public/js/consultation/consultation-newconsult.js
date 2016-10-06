$(document).ready(function(){
	$(".btn-issue-med").on("click touch", showModalQty);
	$(".btn-issue-med-qty").on("click touch", issueMed);
	$(".btn-qty-reduce").on("click touch", minusMed);
	$(".btn-qty-increase").on("click touch", plusMed);
});

function minusMed(){
	var qty = $("#med-qty").val();
	if(qty == 0)
		return;
	$("#med-qty").val(qty - 1);
}

function plusMed(){
	var qty = parseInt($("#med-qty").val());
	$("#med-qty").val(qty + 1);
}

function showModalQty(event){
	var btn = $(this);
	var med_id = btn.attr('data-med-id');
	var modal_meds = $("#modal-meds");

	$("#med-id").val(med_id);
	$("#med-qty").val(0);
	modal_meds.modal("show");

} 

function issueMed(event){
	var med_id = $("#med-id").val();
	var med_qty = $("#med-qty").val();
	var btn_table = $("#btn-issue-med-" + med_id);
	var consult_id = $("#consult-id").val();
	var data = {'med_id' : med_id, 'qty' : med_qty, 'consult_id' : consult_id};
	var btn_submit = $(this);

	if(isNaN(med_qty) || med_qty <= 0){
		alert('Enter a valid quantity!');
		return;
	}

	btn_submit.attr('disabled', 'true');
	btn_submit.html('<i class="fa fa-spinner fa-pulse"></i>');

	$.post('consultation/issueMed', data, function(data){
		$("#modal-meds").modal("hide");
		btn_table.attr('readonly', 'true');
		btn_table.html('Issued');
		btn_table.attr('class', 'btn btn-sm btn-success');
		btn_submit.attr('disabled', 'false');
		btn_submit.html('Issue');
	});

}