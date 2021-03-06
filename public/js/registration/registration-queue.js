var patient_count = 1;
var patient_limit = 10;

$(document).ready(function(){
	$("input").attr("disabled", false);
	$(".btn").attr("disabled", false);
	$("#btn-add-patient").on("click touch", addPatient);
	$("#btn-cancel-reg").on("click touch", cancelReg);
	$("#btn-submit-reg").on("click touch", submitReg);
});

function addPatient(){

	patient_count++;
	$('#div-patients-list').append(
		"<input class='form-control' placeholder='Enter patient name' id='patient" + 
		patient_count + "'>"
	);
	
	if(patient_count == patient_limit){
		$('#btn-add-patient').attr('disabled', true);
	}
}

function cancelReg(){
	$('#form-reg')[0].reset();
	$('#div-patients-list').html('<label>Patient Name(s):</label>' +
	    		'<label><small>(For multiple patients, please enter one patient per line.)</small></label>' +
				'<input class="form-control" placeholder="Enter patient name" id="patient1">');
	patient_count = 1;
}

function submitReg(){
	var hasError = false;
	var firstname = $("#input-firstname").val();
	var lastname = $("#input-lastname").val();
	var data = {
		"clientname" : {
		"firstname" : firstname, "lastname" : lastname
		},
		"patients" : {}
	};

	for(i=1; i<11; i++){
		var patientname = $("#patient" + i);
		if(patientname.length > 0 && patientname.val() != ''){
			data["patients"]["patient" + i] = patientname.val();
		}
	}

	// Validation:
	$("#div-input-firstname").attr("class", "form-group");
	$("#div-input-lastname").attr("class", "form-group");
	$("#div-patients-list").attr("class", "form-group");

	//validation goes here:
	if( $("#input-firstname").val() === ''){
		hasError = true;
		request.abort();
		$("#div-input-firstname").attr("class", "form-group has-error has-feedback");
	}

	if( $("#input-lastname").val() === ''){
		hasError = true;
		request.abort();
		$("#div-input-lastname").attr("class", "form-group form-group has-error");
	}

	if(hasError){
		alertMessage('danger', "Please fill out the missing fields!");
		return;
	}

	$(".btn").attr("disabled", true);
	$("input").attr("disabled", true);
	$("#btn-submit-reg").html("<i class='fa fa-spinner fa-pulse'></i> Submit");
	// end validation

	$.post(
		"registration/registerinqueue",
		data,
		function(response){
			if(response.state == "success"){
				alertMessage('success', response.message);
				cancelReg();
			}
			else {
				alertMessage('danger', response.message);
				$("#div-patients-list").attr("class", "form-group has-error");
			}
			$(".btn").attr("disabled", false);
			$("input").attr("disabled", false);
			$("#btn-submit-reg").html("Ok");
		}
	);
}
