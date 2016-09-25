function newClient(event){
	var reg_id = $(this).attr('data-reg-id');
	var data = {'reg_id' : reg_id};

	loadButton($('.btn-new-client'), 'New Client');

	$.post(
		"/reception/newclient",
		data,
		function(){
			$('#modal-verify-client').modal("hide");
			alertMessage('success', "Client is ready to be created!");
			unloadButton($('.btn-new-client'), "<i class='fa fa-plus'></i> New Client");
		}
	);
}


var showClientDetails = function(id){
	return function showClientDetails(event){
		var element = $(this);
		var client_id = element.attr('data-reg-id');
		var data = {'client_id' : client_id, 'reg_id' : id};
		loadButton($('.btn-verify-selected-client'), ' Verify');

		$.post(
			"reception/verifyClientDetails",
			data,
			function(view){
				$('#modal-verify-client').modal("hide");
				$('#modal-content-verify-client-details').html(view);
				$('#modal-verify-client-details').modal('show');
				$('#btn-update-client').on('click touch', verifyClient);
			}
		);
	};
};

function verifyClient(event){
	var element = $(this);
	var client_id = $('#client-id').val();
	var reg_id = $('#reg-id').val();
	var email = $('#input-email').val();
	var address = $('#input-address').val();
	var mobile = $('#input-mobile').val();
	var landline = $('#input-landline').val();
	var city = $('#select-city').val();
	var data = {
		'client_id' : client_id, 'reg_id' : reg_id,
		'email' : email, 'address' : address,
		'mobile' : mobile, 'landline' : landline,
		'city' : city
		};

	loadButton($('#btn-update-client'), ' Confirm' );
	
	$.post(
		"/reception/verifyclient",
		data,

		function(){
			alertMessage('success', "Successfully verified client!");
			$('#modal-verify-client-details').modal("hide");
			refreshRegistrationTable();
		}
	);
};

function searchClients(event){
	var element = $(this);
	var id = element.attr('data-reg-id');
	var lastname = element.attr('data-client-lname');
	var firstname = element.attr('data-client-fname');
	var clientinfo = {'id' : id, 'lastname' : lastname, 'firstname' : firstname};
	$('.btn-verify-client').attr('disabled', true);
	loadButton(element);

	$.post(
		"/reception/getclients",
		clientinfo,
		function(data) {
			$('#table-verify-client').html(data.view);
			$('.btn-verify-selected-client').on("touch click", showClientDetails(id));
			$('#modal-verify-client').modal("show");
			$('.btn-verify-client').attr('disabled', false);
			$('.btn-new-client').on("click touch", newClient);
			unloadButton(element, "<i class='fa fa-question'></i>");
		}
	);
}