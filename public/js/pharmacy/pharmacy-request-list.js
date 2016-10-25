$(document).ready(function(){
	$(".btn-refresh").on("click touch", refreshTableMedRequests);
	refreshTableMedRequests();
});

function refreshTableMedRequests(){
	var table = $("#table-med-requests");
	getView('pharmacy/getTableMedRequests', table, function(){
		$('.btn-med-prepare').on('click touch', prepareMed);
	});
}

function getTableMedRequests(){
	var table = $("#table-med-requests");
	getViewNoLoad('pharmacy/getTableMedRequests', table, function(){
		$('.btn-med-prepare').on('click touch', prepareMed);
	});
}

function prepareMed(event){
	var e = $(this);
	var request_id = e.attr("data-request-id");
	var data = {"request_id" : request_id};
	$(this).html("<i class='fa fa-pulse fa-spinner'></i>");
	$.post("pharmacy/prepareMed", data, function(data){
		getTableMedRequests();
	});
}