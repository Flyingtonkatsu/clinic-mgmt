
function getPatientsOwnedByClient(event){
	var element = $(this);
	var client_id = element.attr('data-client-id');
	var patient_name = element.attr('data-patient-name');
	var reg_id = element.attr('data-reg-id');
	var data = {'client_id' : client_id, 
				'patient_name' : patient_name,
				'reg_id' : reg_id
				};

	$.ajax({
		type: "POST",
		url: "/reception/getpatients",
		data: data,
		beforeSend: function(){
			loadButton(element);
		},
		success: function(data){
			$('#modal-verify-patient-client-name').html(
				'<b>Client: </b>' + data.client_name
				);
			$('#table-verify-patient').html(data.view);
			$('#modal-verify-patient').modal("show");
		},
		complete: function(){
			unloadButton(element, "<i class='fa fa-question'></i>");
		}
	});
}