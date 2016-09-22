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


var verifyClientWithID = function(id){
	return function verifyClient(event){
		var element = $(this);
		var client_id = element.attr('data-reg-id');
		var data = {'client_id' : client_id, 'reg_id' : id};

		loadButton($('.btn-verify-selected-client'), ' Verify' );
		
		$.post(
			"/reception/verifyclient",
			data,

			function(){
				alertMessage('success', "Successfully verified client!");
				$('#modal-verify-client').modal("hide");
				refreshRegistrationTable();
			}
		);
	};

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
			$('.btn-verify-selected-client').on("touch click", verifyClientWithID(id));
			$('#modal-verify-client').modal("show");
			$('.btn-verify-client').attr('disabled', false);
			$('.btn-new-client').on("click touch", newClient);
			unloadButton(element, "<i class='fa fa-question'></i>");
		}
	);
}