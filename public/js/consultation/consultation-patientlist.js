$(document).ready(function(){
	$(".btn-refresh").on("click touch", refreshPatientList);
	refreshPatientList();
});

function refreshPatientList(){
	var container = $("#table-registration");
	getView('consultation/getPatientList', container);
}