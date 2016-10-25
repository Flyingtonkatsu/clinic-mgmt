
$(document).ready(function(){
	$("#btn-cancel-reg").on("click touch", cancelReg);
	$("#btn-submit-reg").on("click touch", submitReg);
	$(".btn").attr("disabled", true);
	$("input").attr("disabled", true);
	$("textarea").attr("disabled", true);
	$("select").attr("disabled", true);
	$(".select-names").attr("disabled", false);

	getEditedReg();
});

function getEditedReg(){
	var select_names = $(".select-names");
	getView("registration/getEditedReg", select_names, function(){
		$('.select-names').on('change', setNameFields);
	});

	/*
	$.get("registration/editedreg",
		function(data) {
			if(Object.keys(data).length > 0){
				$(".btn").attr("disabled", false);
				$("input").attr("disabled", false);
				$("textarea").attr("disabled", false);
				$("select").attr("disabled", false);

				$("#input-firstname").val(data.client_fname);
				$("#input-lastname").val(data.client_lname);
				$("#input-email").focus();
			}
		}
	);*/
}

function setNameFields(){
	var firstname = $(this).find(":selected").attr("data-firstname");
	var lastname = $(this).find(":selected").attr("data-lastname");

	$(".btn").attr("disabled", false);
	$("input").attr("disabled", false);
	$("textarea").attr("disabled", false);
	$("select").attr("disabled", false);
	$("#input-firstname").val(firstname);
	$("#input-lastname").val(lastname);
}

function submitReg(){
	var reg_id = $(".select-names").val();
	var firstname = $("#input-firstname").val();
	var lastname = $("#input-lastname").val();
	var email = $("#input-email").val();
	var birthday = $("#input-birthday").val();
	var landline = $("#input-landline").val();
	var mobile = $("#input-mobile").val();
	var address = $("#input-address").val();
	var city = $("#select-city").val();

	var landline2 = $("#input-landline2").val();
	var mobile2 = $("#input-mobile2").val();
	var address2 = $("#input-address2").val();
	var city2 = $("#select-city2").val();

	var data = {
		"reg_id" : reg_id,
		'firstname' : firstname,
		'lastname' : lastname,
		'email' : email,
		'birthday' : birthday,
		'landline' : landline,
		'mobile' : mobile,
		'address' : address,
		'city' : city,

		'landline2' : landline2,
		'mobile2' : mobile2,
		'address2' : address2,
		'city2' : city2
	};

	$('#btn-submit-reg').attr('disabled', true);
	$('#btn-cancel-reg').attr('disabled', true);
	$(".btn").attr("disabled", true);
	$("input").attr("disabled", true);
	$("textarea").attr("disabled", true);
	$("select").attr("disabled", true);
	$('#btn-submit-reg').html('<i class="fa fa-spinner fa-pulse"></i> Submit ');

	$.post(
		"registration/newclient",
		data,
		function() {
			cancelReg();
			$("#input-firstname").attr("value", "");
			$("#input-lastname").attr("value", "");
			$(".btn").attr("disabled", true);
			$("input").attr("disabled", true);
			$("textarea").attr("disabled", true);
			$("select").attr("disabled", true);

			alertMessage('success', 'New client successfully registered! Client can now be verified.');
			/*setTimeout(function(){
				location.assign('registration');
			}, 2500);*/

		}
	);
}

function cancelReg(){
	$('#form-new-client')[0].reset();
	$('#btn-submit-reg').html('Submit');

	$(".btn").attr("disabled", false);
	$("input").attr("disabled", false);
	$("textarea").attr("disabled", false);
	$("select").attr("disabled", false);
}