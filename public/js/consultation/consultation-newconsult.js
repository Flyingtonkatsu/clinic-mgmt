var labRequestsTimeout = null;

$(document).ready(function(){
	$(".btn-issue-med").on("click touch", showModalQty);
	$(".btn-issue-med-qty").on("click touch", issueMed);
	$(".btn-qty-reduce").on("click touch", minusMed);
	$(".btn-qty-increase").on("click touch", plusMed);
	$(".btn-lab-cancel").on("click touch", hideModalLab);
	$(".btn-lab-confirm").on("click touch", sendLabRequest);
	$(".btn-save-consult").on("click touch", saveConsult);
	$(".sidebar-nav-item").on("click touch", function(){
		clearTimeout(labRequestsTimeout);
	});
	getLabRequestsTable();
});

function getLabRequestsTable(){
	var consult_id = $("#consult-id").val();
	var data = {'consult_id' : consult_id};

	$.post('consultation/getLabRequestsTable', data, function(table){
		$("#table-labs").html(table);
		$('.btn-request-lab').on('click touch', requestOrResult);
		if(labRequestsTimeout != null)
			clearTimeout(labRequestsTimeout);
		labRequestsTimeout = setTimeout(getLabRequestsTable, 10000);
	});
}

function saveConsult(event){
	var txt_examination = $("#txt-exam").val();
	var txt_diff_diag = $("#txt-diff-diag").val();
	var txt_consult_diag = $("#txt-consult-diag").val();
	var txt_notes = $("#txt-notes").val();
	var txt_regime_script = $("#txt-reg-script").val();
	var consult_id = $("#consult-id").val();
	var data = {"consult_id" : consult_id,
				"txt_examination" : txt_examination, "txt_diff_diag" : txt_diff_diag,
				"txt_consult_diag" : txt_consult_diag, "txt_notes" : txt_notes,
				"txt_regime_script" : txt_regime_script
				};
				
	loadButton($(this));
	$.post('consultation/saveConsult', data, function(){
		getView('consultation/viewPatientList', $('#page-content'), function(){
			alertMessage('success', 'Successfully saved consult!');
		});
		clearTimeout(labRequestsTimeout);
	});

}

function requestOrResult(event){
	if ($(this).hasClass('btn-primary'))
		showModalLab($(this));
	else if($(this).hasClass('btn-success'))
		getLabRequest($(this));
}

function sendLabRequest(event){
	var lab_id = $("#lab-id").val();
	var consult_id = $("#consult-id").val();
	var data = {"lab_id" : lab_id, "consult_id" : consult_id};
	var btn = $(this);
	var btn_table = $("#btn-request-lab-"+lab_id);

	loadButton(btn);

	$.post('consultation/sendLabRequest', data, function(data){
		getLabRequestsTable();
		hideModalLab();
		unloadButton(btn, 'Confirm');
	});
}

function getLabRequest(btn){
	var lab_id = btn.attr('data-lab-id');
	var consult_id = $("#consult-id").val();
	var data = {"lab_id" : lab_id, "consult_id" : consult_id};
	loadButton(btn);
	$.post('consultation/getLabRequest', data, function(data){
		$("#txt-results").html(data.request.results);
		$("#modal-labs-results").modal("show");
		unloadButton(btn, 'View Results');
	});
}


function hideModalLab(){
	$("#modal-labs-request").modal("hide");
}

function showModalLab(btn){
	var lab_id = btn.attr('data-lab-id');
	$("#lab-id").val(lab_id);
	$("#modal-lab-header").html("<h4>Confirm request for " + btn.attr('data-lab-name') + "?</h4>");
	$("#modal-labs-request").modal("show");
}

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
	var qty = $("#med-qty").val();
	var btn_table = $("#btn-issue-med-" + med_id);
	var consult_id = $("#consult-id").val();
	var data = {'med_id' : med_id, 'qty' : qty, 'consult_id' : consult_id};
	var btn_submit = $(this);

	if(isNaN(qty) || qty <= 0){
		alert('Enter a valid quantity!');
		return;
	}

	loadButton(btn_submit);

	$.post('consultation/issueMed', data, function(data){
		btn_table.html('Issued ' + qty);
		btn_table.attr('class', 'btn btn-success');
		btn_table.attr('disabled', true);

		unloadButton(btn_submit, 'Request');
		$("#modal-meds").modal("hide");
	});
}