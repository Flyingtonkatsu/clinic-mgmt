$(document).ready(function(){
	$(".btn-refresh").on("click touch", refreshRequestTable);
	$(".btn-lab-results-confirm").on("click touch", updateLabResults);
	$(".btn-decline-request-confirm").on("click touch", declineLabRequest);
	$(".btn-lab-results-cancel").on("click touch", function(){
		$("#modal-input-lab-results").modal("hide");
	});
	$(".btn-decline-request-cancel").on("click touch", function(){
		$("#modal-input-lab-results").modal("hide");
	});
	refreshRequestTable();
});

function refreshRequestTable(){
	var container = $("#table-lab-requests");
	getView('labs/getTableLabRequests', container, function(){
		$('.btn-results').on("click touch", showModalInputResults);
		$('.btn-decline-request').on("click touch", showModalDeclineRequest);
	});
}

function declineLabRequest(event){
	var results = $("#txt-lab-results").val();
	var request_id = $("#request-id").val();
	var data = {'request_id' : request_id};

	loadButton($('.btn-decline-request-confirm'), ' Declining Request');
	$.post('labs/declineLabRequest', data, function(response){
		if(response.status == "ok")
			alertMessage('success', 'Lab request has been declined successfully!');
		else
			alertMessage('danger', 'An error occured, please refresh the page.');

		$("#modal-decline-request").modal("hide");
		unloadButton($('.btn-decline-request-confirm'), 'Confirm');
		refreshRequestTable();
	});
}

function showModalDeclineRequest(event){
	var request_id = $(this).attr("data-req-id");
	var patient_name = $(this).attr("data-patient-name");
	var test_name = $(this).attr("data-test-name");
	$("#modal-decline-request-header").html("Confirm that " + test_name + " test for " + patient_name + " is declined?");
	$("#request-id").val(request_id);
	$("#modal-decline-request").modal("show");
}

function showModalInputResults(event){
	var request_id = $(this).attr("data-req-id");
	var patient_name = $(this).attr("data-patient-name");
	var test_name = $(this).attr("data-test-name");
	$("#modal-input-lab-results-header").html("Enter " + test_name + " test results for " + patient_name);
	$("#request-id").val(request_id);
	$("#modal-input-lab-results").modal("show");
}

function updateLabResults(event){
	var results = $("#txt-lab-results").val();
	var request_id = $("#request-id").val();
	var data = {'results' : results, 'request_id' : request_id};

	loadButton($('.btn-lab-results-confirm'), ' Sending Results');
	$.post('labs/updateLabResults', data, function(response){
		if(response.status == "ok")
			alertMessage('success', 'Lab results sent successfully!');
		else
			alertMessage('danger', 'An error occured, please refresh the page.');

		$("#modal-input-lab-results").modal("hide");
		unloadButton($('.btn-lab-results-confirm'), 'Send Results');
		refreshRequestTable();
	});
}