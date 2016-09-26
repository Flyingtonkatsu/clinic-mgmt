
$(document).ready(function(){
	$('#btn-submit').on('click touch', checkInputRegEmployee);
});

function checkInputRegEmployee(event){
	var button = $(this);
	var firstname = $('#input-firstname').val();
	var lastname = $('#input-lastname').val();
	var initials = $('#input-initials').val();
	var position_id = $('#select-position').val();
	var username = $('#input-username').val();
	var password = $('#input-password').val();
	var passwordconfirm = $('#input-password-confirm').val();
	var username_count = $('#hidden-username-count').val();
	var missingfields = false;
	var data = {'firstname' : firstname, 'lastname' : lastname,
				'initials' : initials, 'position_id' : position_id,
				'username' : username, 'password' : password
				};

	$('.form-group').attr('class', 'form-group');

	if(!firstname.trim() || !lastname.trim()){
		$('#form-feedback-name').attr('class', 'form-group has-error');
		missingfields = true;
	}

	if(!initials.trim()){
		$('#form-feedback-initials').attr('class', 'form-group has-error');
		missingfields = true;
	}

	if(position_id == null){
		$('#form-feedback-position').attr('class', 'form-group has-error');
		missingfields = true;
	}

	if(!username.trim()){
		$('#form-feedback-username').attr('class', 'form-group has-error');
		missingfields = true;
	}

	if(!password.trim()){
		$('#form-feedback-password').attr('class', 'form-group has-error');
		missingfields = true;
	}

	if(!passwordconfirm.trim()){
		$('#form-feedback-password-confirm').attr('class', 'form-group has-error');
		missingfields = true;
	}

	if(missingfields){
		alertMessage('danger', 'Please fill out all missing fields!');
		return;
	}

	if(password != passwordconfirm){
		$('#form-feedback-password-confirm').attr('class', 'form-group has-error');
		alertMessage('danger', 'Password does not match!');
		return;
	}

	for(var i=0; i<username_count; i++){
		var existing_username = $('#hidden-username-' + i).val();
		if(existing_username == username){
			$('#form-feedback-username').attr('class', 'form-group has-error');
			alertMessage('danger', 'Username already exists!');
			return;
		}
	}

	registerEmployee(button, data);
}

function registerEmployee(button, data){
	loadButton(button, ' Submit');

	$.post(
		'admin/registerNewEmployee',
		data,
		function(data){
			if(data.response=="ok"){
				getMainView($("#nav-link-employee-reg"), 'admin/viewEmployeeReg');
				alertMessage('success', 'Employee successfully registered.');
			}
			unloadButton(button, ' Submit');
		}	
	);
}