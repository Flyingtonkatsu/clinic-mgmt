
$(document).ready(function(){
	$('#btn-refresh').on("click touch", refreshRegistrationTable);
	//setInterval(refreshRegistrationTable, 60000);
	refreshRegistrationTable();
});

function newClient(event){
	var reg_id = $(this).attr('data-reg-id');
	var data = {'reg_id' : reg_id};

	$.ajax({
		type: "POST",
		url: "/reception.newclient",
		data: data,

		beforeSend: function(){
			loadButton($('.btn-new-client'), 'New Client');
		},

		success: function(){
			$('#modal-verify-client').modal("hide");
			alertMessage('success', "Client is ready to be created!");
		},

		complete: function() {
			unloadButton($('.btn-new-client'), "<i class='fa fa-plus'></i> New Client");
		}

	});
}

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

// Refreshes registration table displayed with a GET request
function refreshRegistrationTable(){
	clearInterval();
	var registrationTable = $('#table-registration');

	$.ajax({
		type: "GET",
		url: "/reception.getregistration",

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

var verifyClientWithID = function(id){
	return function verifyClient(event){
		var element = $(this);
		var client_id = element.attr('data-reg-id');
		var data = {'client_id' : client_id, 'reg_id' : id};

		loadButton($('.btn-verify-selected-client'), ' Verify' );
		
		$.ajax({
			type: "POST",
			url: "/reception.verifyclient",
			data: data,

			success: function(){
				alertMessage('success', "Successfully verified client!");
				$('#modal-verify-client').modal("hide");
				refreshRegistrationTable();
			},
		});
	};

};

// For verifying client;
//	Send POST request with client info to be searched and placed in verify search table
function searchClients(event){
	// Get info from selected row in the table
	var element = $(this);
	var id = element.attr('data-reg-id');
	var lastname = element.attr('data-client-lname');
	var firstname = element.attr('data-client-fname');
	var clientinfo = {'id' : id, 'lastname' : lastname, 'firstname' : firstname};

	// AJAX POST request for receiving the clients with the same name taken from Clients table
	//	receives json array with key-value pairs of client info taken from Clients table 
	$.ajax({
		type: "POST",
		url: "/reception.getclients",
		data: clientinfo,
		dataType: "json",

		// Before sending request: change icon to spinner, and disable all other verify buttons
		beforeSend: function(){
			loadButton(element);
			$('#table-verify-client').html('');
		},

		// When request is successful, change inner html of table to populate with results by iterating through received array (clients)
		success: function(data) {
			if(data['clients'].length == 0){
				$('#table-verify-client').html(
					'<tr> <td colspan="5"> No existing client found. </td></tr>'
					);
			}
			else {
				for (var i=0; i < data['clients'].length; i++) {
					$('#table-verify-client').append(
						'<tr>' + 
						'<td>' + '<button class="btn btn-primary btn-verify-selected-client"' +
						'data-reg-id = "' + data['clients'][i].id + '" data-reg-id="' + data["reg_id"] +'"> Verify' +  '</button></td>' +
						'<td>' + data['clients'][i].lastname + ', ' + data['clients'][i].firstname + '</td>' +
						'<td>' + data['clients'][i].email + '</td>' +
						'<td>' + data['clients'][i].birthday + '</td>' +
						'<td>' + data['clients'][i].mobile + '</td>' +
						'</tr>'
						);
				}
			}
			$('.btn-verify-selected-client').on("touch click", verifyClientWithID(id));
		},

		// After request completes (whether successful or with error), re-enable buttons, show modal
		complete: function(){
			$('#modal-verify-client').modal("show");
			$('.btn-verify-client').attr('disabled', false);
			$('#table-verify-client').append(
				'<tr>' +
				'<td colspan="5"> <button class="btn btn-success btn-new-client" ' +
				'data-reg-id="' + id + '">' + 
				'<i class="fa fa-plus"></i> New Client </button></td>' +
				'</tr>'
				);
			$('.btn-new-client').on("click touch", newClient);
			unloadButton(element, "<i class='fa fa-question'></i>");
		}
	});
}