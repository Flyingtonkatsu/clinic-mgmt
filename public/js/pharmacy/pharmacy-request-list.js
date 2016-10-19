$(document).ready(function(){
	$(".btn-refresh").on("click touch", getTableMedRequests);
	getTableMedRequests();
});

function getTableMedRequests(){
	var table = $("#table-med-requests");
	getView('pharmacy/getTableMedRequests', table);
}