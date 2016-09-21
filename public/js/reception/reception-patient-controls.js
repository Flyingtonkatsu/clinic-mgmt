
function getPatientsOwnedByClient(event){
	var element = $(this);
	var client_id = element.attr('data-client-id');
	var patient_name = element.attr('data-patient-name');
	var reg_id = element.attr('data-reg-id');
	var data = {'client_id' : client_id, 
				'patient_name' : patient_name,
				'reg_id' : reg_id
				};
	$('.btn-verify-patient').attr('disabled', true);
	loadButton(element);

	$.ajax({
		type: "POST",
		url: "/reception/getpatients",
		data: data,
		success: function(data){
			$('#modal-verify-patient-client-name').html(
				'<b>Client: </b>' + data.client_name
				);
			$('#table-verify-patient').html(data.view);
			$('#modal-verify-patient').modal("show");
			$('.btn-new-patient').on('click touch', showNewPatientForm);
			$('.btn-verify-selected-patient').on('click touch', verifyExistingPatient);
			unloadButton(element, "<i class='fa fa-question'></i>");
			$('.btn-verify-patient').attr('disabled', false);
		}
	});
}

function verifyExistingPatient(event){
	var element = $(this);
	var reg_id = element.attr('data-reg-id');
	var patient_id = element.attr('data-patient-id');
	var data = {'reg_id' : reg_id, 'patient_id' : patient_id};

	loadButton(element);
	$.post(
		'reception/verifyexistingpatient',
		data,
		function(data){
			$('#modal-verify-patient').modal("hide");
			refreshRegistrationTable();
		});
}

function showNewPatientForm(event){
	var element = $(this);
	var client_id = element.attr('data-client-id');
	var patient_name = element.attr('data-patient-name');
	var reg_id = element.attr('data-reg-id');
	var data = {'client_id' : client_id,
			'patient_name' : patient_name,
			'reg_id' : reg_id
				};

	loadButton(element);

	$.ajax({
		type: "POST",
		url: "/reception/getnewpatientform",
		data: data,
		success: function(data){
			$('#modal-body-new-patient').html(data);
			$('#modal-verify-patient').modal("hide");
			$('#modal-new-patient').modal("show");
			$('#select-species').on("change", getBreeds);
			$('#btn-submit-new-patient').on("click touch", submitNewPatient);
		},
		complete: function(){
			unloadButton(element, '<i class="fa fa-plus"></i> New Patient');
		}
	});	
}

function submitNewPatient(event){
	var client_id = $('#client-id').val();
	var reg_id = $('#reg-id').val();
	var patient_name = $('#patient-name').val();
	var birthdate = $('#input-birthdate').val();
	var gender = $('#select-gender').val();
	var color = $('#input-color').val();
	var species = $('#select-species').val();
	var breed = $('#select-breed').val();
	var data = {
				'client_id' : client_id,
				'reg_id' : reg_id,
				'patient_name' : patient_name,
				'birthdate' : birthdate,
				'gender' : gender,
				'color' : color,
				'species' : species,
				'breed' : breed
	};
	unloadButton($(this));

	$.ajax({
		type: "POST",
		url: "reception/addnewclient",
		data: data,
		success: function(data){
			if(data.response == "ok"){
				$('#modal-new-patient').modal("hide");
				refreshRegistrationTable();
			}
		}
	});
}

function getBreeds(event){
	var species = $(this).val();
	var dropdown = $('#select-breed');
	var data = {'species' : species};

	$('#select-breed').attr('disabled', true);
	$('#spinner-select-breed').html('<i class="fa fa-spinner fa-pulse"></i> Breed:');

	$.ajax({
		type: "POST",
		url: "reception/getbreeds",
		data: data,
		success: function(data){
			dropdown.html("<option disabled selected>Select breed</option>");

			for(var i=0; i<data.breeds.length; i++){
				dropdown.append("<option>" + data.breeds[i].name + "</option>");
			}
			$('#spinner-select-breed').html('Breed:');
			$('#select-breed').attr('disabled', false);
		}
	});
}