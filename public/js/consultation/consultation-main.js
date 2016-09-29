
$(document).ready(function(){
	$('#nav-patient-list').on('click touch', getViewPatientList);
});

function getViewPatientList(event){
	getMainView($(this), 'consultation/viewPatientList');
}