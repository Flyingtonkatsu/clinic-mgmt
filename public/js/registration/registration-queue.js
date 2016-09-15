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
		"<input class='form-control' style='padding-bottom: 5px' placeholder='Enter patient name' id='patient" + 
		patient_count + "'>"
	);
	
	if(patient_count == patient_limit){
		$('#btn-add-patient').attr('disabled', true);
	}

	$("#div-input-firstname").attr("class", "col-sm-4");
	$("#div-input-lastname").attr("class", "col-sm-4");
	$("#div-patients-list").attr("class", "col-sm-4");
}

function cancelReg(){
	$('#form-reg')[0].reset();
	$('#div-patients-list').html('<input class="form-control" placeholder="Enter patient name" id="patient1">');
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

	$.ajax({
		type: "POST",
		url: "registration/registerinqueue",
		data: data,

		beforeSend: function(request){
			$("#div-input-firstname").attr("class", "col-sm-4");
			$("#div-input-lastname").attr("class", "col-sm-4");
			$("#div-patients-list").attr("class", "col-sm-4");

			//validation goes here:
			if( $("#input-firstname").val() === ''){
				hasError = true;
				request.abort();
				$("#div-input-firstname").attr("class", "col-sm-4 has-error has-feedback");
			}

			if( $("#input-lastname").val() === ''){
				hasError = true;
				request.abort();
				$("#div-input-lastname").attr("class", "col-sm-4 form-group has-error");
			}

			if(hasError){
				alertMessage('danger', "Please fill out the missing fields!");
				return;
			}

			$(".btn").attr("disabled", true);
			$("input").attr("disabled", true);
			$("#btn-submit-reg").html("<i class='fa fa-spinner fa-pulse'></i> Submit");
		},

		success: function(response){
			if(response.state == "success"){
				alertMessage('success', response.message);
				cancelReg();
			}
			else {
				alertMessage('danger', response.message);
				$("#div-patients-list").attr("class", "col-sm-4 has-error");
			}
		},

		complete: function(){
			$(".btn").attr("disabled", false);
			$("input").attr("disabled", false);
			$("#btn-submit-reg").html("Ok");
		}
	});
}
