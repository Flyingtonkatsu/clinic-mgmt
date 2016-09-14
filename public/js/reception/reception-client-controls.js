function newClient(event){
	var reg_id = $(this).attr('data-reg-id');
	var data = {'reg_id' : reg_id};

	$.ajax({
		type: "POST",
		url: "/reception/newclient",
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


var verifyClientWithID = function(id){
	return function verifyClient(event){
		var element = $(this);
		var client_id = element.attr('data-reg-id');
		var data = {'client_id' : client_id, 'reg_id' : id};

		loadButton($('.btn-verify-selected-client'), ' Verify' );
		
		$.ajax({
			type: "POST",
			url: "/reception/verifyclient",
			data: data,

			success: function(){
				alertMessage('success', "Successfully verified client!");
				$('#modal-verify-client').modal("hide");
				refreshRegistrationTable();
			},
		});
	};

};

function searchClients(event){
	var element = $(this);
	var id = element.attr('data-reg-id');
	var lastname = element.attr('data-client-lname');
	var firstname = element.attr('data-client-fname');
	var clientinfo = {'id' : id, 'lastname' : lastname, 'firstname' : firstname};

	$.ajax({
		type: "POST",
		url: "/reception/getclients",
		data: clientinfo,
		dataType: "json",

		beforeSend: function(){
			loadButton(element);
		},

		success: function(data) {
			$('#table-verify-client').html(data.view);
			$('.btn-verify-selected-client').on("touch click", verifyClientWithID(id));
		},

		complete: function(){
			$('#modal-verify-client').modal("show");
			$('.btn-verify-client').attr('disabled', false);
			$('.btn-new-client').on("click touch", newClient);
			unloadButton(element, "<i class='fa fa-question'></i>");
		}
	});
}