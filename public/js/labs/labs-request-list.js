$(document).ready(function(){
	$(".btn-refresh").on("click touch", refreshRequestTable);
	$(".btn-lab-results-confirm").on("click touch", updateLabResults);
	$(".btn-lab-results-cancel").on("click touch", function(){
		$("#modal-input-lab-results").modal("hide");
	});
	refreshRequestTable();
});

function refreshRequestTable(){
	var container = $("#table-lab-requests");
	getView('labs/getTableLabRequests', container, function(){
		$('.btn-results').on("click touch", showModalInputResults);
	});
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