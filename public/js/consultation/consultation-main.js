
$(document).ready(function(){
	$('#nav-patient-list').on('click touch', getViewPatientList);
	getMainView($('#nav-patient-list'), 'consultation/viewPatientList');
});

function getViewPatientList(event){
	getMainView($(this), 'consultation/viewPatientList');
}