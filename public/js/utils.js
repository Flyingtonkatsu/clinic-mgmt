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


function getView(url, container, callback){
	container.html('<i class="fa fa-spinner fa-pulse fa-3x"></i>');

	$.get(url, 
		function(view){
			container.html(view);
			if(callback != null)
				callback();
	});
}

function getPostView(url, container, data, callback){
	container.html('<i class="fa fa-spinner fa-pulse fa-3x"></i>');
	$.post(url,
		data,
		function(view){
			container.html(view);
			if(callback != null)
				callback();
	});
}

function getMainView(navitem, url){
	$('.sidebar-nav-item').attr('class', 'sidebar-nav-item');
	navitem.attr('class', 'sidebar-nav-item sidebar-nav-active')
	getView(url, $('#page-content'));
}