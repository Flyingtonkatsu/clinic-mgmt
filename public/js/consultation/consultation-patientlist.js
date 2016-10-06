$(document).ready(function(){
	$(".btn-refresh").on("click touch", refreshPatientList);
	refreshPatientList();
});

function refreshPatientList(){
	var container = $("#table-registration");
	getView('consultation/getPatientList', container, function(){
		$(".btn-consult").on("click touch", showNewConsultionForm);
	});
}

function showNewConsultionForm(event){
	var button = $(this);
	var patient_id = button.attr("data-patient-id");
	var client_id = button.attr("data-client-id");
	var reg_id = button.attr("data-reg-id");
	var data = {'patient_id' : patient_id, 'client_id' : client_id, "reg_id" : reg_id};

	loadButton(button, "Consult");
	getPostView('consultation/viewNewConsultation', $('#page-content'), data);
}