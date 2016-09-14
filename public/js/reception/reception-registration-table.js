
$(document).ready(function(){
	$('#btn-refresh').on("click touch", refreshRegistrationTable);
	refreshRegistrationTable();
	//setInterval(refreshRegistrationTable, 60000);
});


function updatePurpose(event){
	updateField('purpose', $(this));
}

function updateVet(event){
	updateField('vet', $(this));
}

function updateRoom(event){
	updateField('room', $(this));
}

function updateWeight(event){
	var object = $(this);
	var weight = object.val();

	if(isNaN(weight)){
		alertMessage('danger', 'Please enter a valid weight.');
		object.parent().attr('class', 'has-error');
	}
	else
		updateField('weight', $(this));
}

function updateField(field, object){
	var value = object.val();
	var id = object.attr('data-reg-id');
	var data = { 'id' : id, 'field' : field, 'value' : value};
	var cell = object.parent();

	$.ajax({
		type: "POST",
		url: "reception/update",
		data: data,

		beforeSend: function() {
			$('input').attr('disabled', true);
			$('.select-vet').attr('disabled', true);
			$('.select-purpose').attr('disabled', true);
			cell.html('<i class="fa fa-spinner fa-pulse"></i>');
		},

		success: function(response) {
			refreshRegistrationTable();
			if(response.status == 'ok'){
				alertMessage('success', response.message);
			}
			else
				alertMessage('danger', response.message);
		},

		complete: function() {
			object.attr('disabled', false);
		}
	});
}

function refreshRegistrationTable(){
	clearInterval();
	var registrationTable = $('#table-registration');

	$.ajax({
		type: "GET",
		url: "/reception/getregistration",

		beforeSend: function(){
			registrationTable.html(
				"<tr><td class='text-center' colspan='10'>" +
				"<i class='fa fa-spinner fa-pulse fa-3x'></i>" +
				"</td></tr>"
				);
			loadButton($('.btn-refresh'), "Refresh");
		},

		success: function(data){
			registrationTable.html(data);
			$('.btn-verify-client').attr("disabled", false);
			$('.btn-verify-client').on("click touch", searchClients);
			$('.btn-verify-patient').on("click touch", getPatientsOwnedByClient);
			$('.select-purpose').on("change", updatePurpose);
			$('.select-vet').on("change", updateVet);
			$('.select-room').on("change", updateRoom);
			$('.input-weight').focusout(updateWeight);
		},

		complete: function(){
			unloadButton($('.btn-refresh'), "<i class='fa fa-refresh'></i> Refresh");
		}
	});
}


