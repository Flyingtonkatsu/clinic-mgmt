function alertMessage(type, message){
	$('#alert-message').html(
		"<div class='alert alert-" + type + "' role='alert'>" +
		"<strong>" + message + "</strong>" +
		"</div>"
	);
	$('#alert-message').fadeIn('slow').delay(4000).fadeOut('slow');
}

$('.pull-down').each(function() {
  var $this = $(this);
  $this.css('margin-top', $this.height())
});

function loadButton(button, label){
	if(label == null)
		var label = "";
	button.html('<i class="fa fa-spinner fa-pulse"></i> ' + label);
	button.attr('disabled', true);
}

function unloadButton(button, label){
	if(label == null)
		var label = "";
	button.html(label);
	button.attr('disabled', false);
}