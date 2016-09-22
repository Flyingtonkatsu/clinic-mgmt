
$(document).ready(function(){
	$("#btn-cancel-reg").on("click touch", cancelReg);
	$("#btn-submit-reg").on("click touch", submitReg);
	$("#input-firstname").attr('readonly', true);
	$("#input-lastname").attr('readonly', true);
	$(".btn").attr("disabled", true);
	$("input").attr("disabled", true);
	$("textarea").attr("disabled", true);
	$("select").attr("disabled", true);

	getEditedClient();
});

function getEditedClient(){
	$.get(
		"registration/editedreg",
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
	);
}

function submitReg(){
	
	var firstname = $("#input-firstname").val();
	var lastname = $("#input-lastname").val();
	var email = $("#input-email").val();
	var landline = $("#input-landline").val();
	var mobile = $("#input-mobile").val();
	var address = $("#input-address").val();
	var birthday = $("#input-birthday").val();
	var city = $("#select-city").val();
	var data = {'firstname' : firstname,
				'lastname' : lastname,
				'email' : email,
				'landline' : landline,
				'mobile' : mobile,
				'address' : address,
				'birthday' : birthday,
				'city' : city
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
			setTimeout(function(){
				location.assign('registration');
			}, 2500);

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